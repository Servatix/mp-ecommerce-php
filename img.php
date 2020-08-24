<?php
require 'constants.php';
$imgs = array(
	'./assets/samsung-galaxy-s9-xxl.jpg',
	'./assets/l6g6.jpg',
	'./assets/u_10168742.jpg',
	'./assets/motorola-moto-g5-plus-1.jpg',
	'./assets/motorola-moto-g4-3.jpg',
	'./assets/003.jpg'
);

foreach($imgs as $img){
	echo $img.': <img src="'.str_replace(ROOT_PATH, HOST, realpath($img)).'"><br>';
}
?>