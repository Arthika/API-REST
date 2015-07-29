<?php
// Note: 'php5-curl' package is required.

// -----------------------------------------
// STEP 1 : Prepare and send a price request
// -----------------------------------------

$request->getPrice->user = "fedenice";
$request->getPrice->password = "fedenice";
$request->getPrice->customer = 11;
$request->getPrice->security = [ "EUR_USD", "GBP_USD" ];

$body = json_encode($request);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://certification.arthikatrading.com:81/cgi-bin/IHFTRestStreamer/getPrice");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: '.strlen($body)));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_WRITEFUNCTION, 'read_body');

curl_exec($ch);
curl_close($ch);

// --------------------------------------------------------------
// STEP 2 : Wait for continuous responses from server (streaming)
// --------------------------------------------------------------

function read_body($ch, $string)
{
   $length = strlen($string);
   $response = json_decode($string);

   if(isset($response)) {
      if (isset($response->getPriceResponse->timestamp)) {
         echo 'Response timestamp: ' . $response->getPriceResponse->timestamp . "\r\n";
      }
      if (isset($response->getPriceResponse->tick)) {
         foreach ($response->getPriceResponse->tick as $tick) {
            echo 'Security: ' . $tick->security . ' Price: ' . $tick->price . ' Side: ' . $tick->side . ' Liquidity: ' . $tick->liquidity . "\r\n";
         }
      }
      if (isset($response->getPriceResponse->heartbeat)) {
         echo 'Heartbeat!' . "\r\n";
      }
      if (isset($response->getPriceResponse->message)) {
         echo 'Message from server: ' . $response->getPriceResponse->message . "\r\n";
      }
   }

   return $length;
}
?>
