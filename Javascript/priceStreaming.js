<!DOCTYPE html>
<html>
<head>
    <title>priceStreaming AJAX/JQUERY sample</title>
    <meta charset="utf-8">
</head>
<body>

<div id="response">
    <pre></pre>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script type="text/javascript"src="http://certification.arthikatrading.com:81/jquery-ajaxreadystate.js"></script>
<script type="text/javascript">

getPrice = function()
{
    $.ajaxreadystate({
        type: "POST",
        url: "http://certification.arthikatrading.com:81/cgi-bin/IHFTRestStreamer/getPrice",
        data: JSON.stringify( { getPrice: {
                                  user: "fedenice",
                                  password: "fedenice",
                                  customer: 11,
                                  security: ["EUR_USD","GBP_USD"] } } ),
        contentType: "application/json",
        dataType: "json",
        traditional: true,
        readystate: function(jqXHR, readystate) {
            if (readystate === 3) {
                console.log(jqXHR.responseText);
            }
        },
        success: function (result) {
            console.log(result);
        },
        error: function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR.status);
            console.log(thrownError);
        }
    });
};

getPrice();

</script>

</body>
</html>
