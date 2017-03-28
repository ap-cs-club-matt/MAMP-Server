<?php
	
	$param1 = $_GET['param1'];
	$param2 = $_GET['param2'];

	
	$link = "https://api.lifx.com/v1/lights/all/state";
    $authToken = "ca9dc5544104e8ac5d56444926865ae5e6f890daa58d3bc2ce5a79e7381ab069";

    $headers = array('Authorization: Bearer ' . $authToken);

	$powerData = "power=on";
	$colorData = "color=009688";
	$brightnessData = "brightness=.8";
	$colorData = $param1;
	
	
	
	

    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $powerData);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $colorData);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $brightnessData);
	
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    $response = curl_exec($ch);   
?>