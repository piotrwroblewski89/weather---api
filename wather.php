<?php 

$apiKey ="3555707a815a25d3e38d669b3bd2464d";
$cityName = $_POST["name"];
$apiUse = "api.openweathermap.org/data/2.5/weather?q={$cityName}&appid={$apiKey}&units=metric";

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $apiUse);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$respone = curl_exec($ch);
curl_close($ch);
$data = json_decode($respone);

$currentTime = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="global.css">  
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <div id="welcome">
        <h1>Here is your weather forcast</h1>

    </div>
    <div class="forcast">
<p> Your city is: <b><?php echo $data->name;?></b><br>
 Your sky is:<b> <?php echo ucwords($data->weather[0]->description);?></b><br>
 The current temperature is: <b><?php echo $data->main->temp;?>&deg;C</b><br>
 The current pressure is: <b><?php echo $data->main->pressure;?> HPA </b><br>
 The humidity is: <b><?php echo $data->main->humidity;?>%</b></p>
    </div><br>
    <button  onClick="window.location = 'index.php'";>BACK</button>
</body>
</html>

