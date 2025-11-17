<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$api_key = "69MOSFI0YN5LPTaWbZXeBJ2EQDCR3cd1VAK8U7GfH45286v9jb8efL0Ja5ECkBDbGAF";

$phone = $_POST['phone'];
$plan_id = $_POST['plan_id'];

$pin = "2008";
$reference = uniqid("REF_");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://sabuss.com/vtu/api/buy/$api_key");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

$post = [
    "pin" => $pin,
    "plan_id" => $plan_id,
    "phone" => $phone,
    "reference" => $reference
];

curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["status" => "error", "message" => curl_error($ch)]);
    exit;
}

curl_close($ch);

echo $response;

    
    </body>
</html>        