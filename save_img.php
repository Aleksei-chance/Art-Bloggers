<?php

$uploaddir = 'bloggers/';

$uploadfile = $uploaddir . basename($_FILES['file']['name']);
$arr = array();

$allowedExts = array('png', 'jpeg', 'jpg', 'gif', 'RAW', 'TIFF', 'PSD', 'BMP', 'BMP', 'HEIF', 'MOV', 'WMV', 'MP4', 'AVI', 'AVCHD', 'FLV', 'F4V', 'SWF', 'MKV');
$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		$arr['status'] = 'success';
		$arr['path_max'] = "https://artbloggers.io/".$uploadfile;
		$arr['path_min'] = $uploadfile;
		$arr['file_max'] = $_FILES['file']['name'];
	} else {
	   $arr['status'] = 'fail';
	};

function str_random($length) {
    return substr(md5(microtime()),0,$length);
}

header('Content-type: application/json');
echo json_encode($arr);
exit(); 
