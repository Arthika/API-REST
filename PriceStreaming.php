$body = '{"getPrice":
            {"user":"login_name",
             "password":"2c70e12b7a0646f92279f427c7b38e7334d8e5389cff167a1dc30e73f826b683",
             "customer":1,
             "security":["EUR_USD","GBP_USD"],
             "interface":["TI1","TI2"],
             "granularity":"FBA",
             "levels":2}}';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.arthikatrading.com/stream/getPrice");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: '.strlen($body)));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_WRITEFUNCTION, 'read_body');

curl_exec($ch);
curl_close($ch);

// Callback function for body
function read_body($ch, $string)
{
   $length = strlen($string);
   $result = json_decode($string, true);

   // Process JSON response

   return $length;
}
