<?php
//include_once('./lib/config.php');
include_once('./lib/class_datapack.php');

$DP = new DataPack();
$DP->init('./testdata/wattlog.csv');
// var_dump($DP->select(1612183000, 1612189999));
$DP->select(1613435413, 1613435655);

