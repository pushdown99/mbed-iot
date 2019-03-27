<?php

$conn = pg_connect(getenv("DATABASE_URL"));

$id = "HAEYEON";
$ts = date("Y-m-d H:M:S");
$ch0 = 0;
$ch1 = 0;
$ch2 = 0;
$ch3 = 0;
$ch4 = 0;
$ch5 = 0;
$ch6 = 0;
$ch7 = 0;
$ch8 = 0;
$ch9 = 0;
$ch10 = 0;
$ch11 = 0;
$ch12 = 0;
$ch13 = 0;
$ch14 = 0;
$ch15 = 0;
$ch16 = 0;
$ch17 = 0;
$ch18 = 0;
$ch19 = 0;
$ch20 = 0;
$ch21 = 0;
$ch22 = 0;
$ch23 = 0;
$ch24 = 0;
$ch25 = 0;
$ch26 = 0;
$ch27 = 0;
$ch28 = 0;
$ch29 = 0;
$ch30 = 0;

$sql  = "INSERT INTO cushion VALUES ('".$id."','".$ts."'::timestamp,".$ch0.",".$ch1.",".$ch2.",".$ch3.",".$ch4.",".$ch5.",".$ch6.",".$ch7.",".$ch8.",".$ch9.",".$ch10.",".$ch11.",".$ch12.",".$ch13.",".$ch14.",".$ch15.",".$ch16.",".$ch17.",".$ch18.",".$ch19.",".$ch20.",".$ch21.",".$ch22.",".$ch23.",".$ch24.",".$ch25.",".$ch26.",".$ch27.",".$ch28.",".$ch29.",".$ch30.")";

print_r($sql);
$result = pg_query($conn, $sql);

?>
