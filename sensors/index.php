<?php

$r = array();

$uuid  = "1234-5678-9012-3456";
$devid = "0169b3690b5a00000000000100100054";

if(isset($_GET["uuid"]))  $uuid   = htmlspecialchars($_GET["uuid"]);
if(isset($_GET["devid"])) $devid  = htmlspecialchars($_GET["devid"]);

function getX($i)
{
    switch($i) {
    case 0 : return (6);
    case 1 : return (6+2.5);
    case 2 : return (6+2.5+2.5);
    case 3 : return (6+2.5+2.5+2.5);
    case 4 : return (6+2.5+2.5+2.5+2.5);
    case 5 : return (2.5);
    case 6 : return (2.5+2.5);
    case 7 : return (2.5+2.5+2.5);
    case 8 : return (2.5+2.5+2.5+2.5);
    case 9 : return (2.5+2.5+2.5+2.5+2.5);
    case 10: return (7);
    case 11: return (2.5+2.5+2.5+2.5+2.5+2.5);
    case 12: return (7+4.5);
    case 13: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 14: return (7+4.5+4.5);
    case 15: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 16: return (7+4.5+4.5+8);
    case 17: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 18: return (7+4.5+4.5+8+4.5);
    case 19: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 20: return (7+4.5+4.5+8+4.5+4.5);
    case 21: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 22: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 23: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 24: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 25: return (2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5+2.5);
    case 26: return (6+2.5+2.5+2.5+2.5+8);
    case 27: return (6+2.5+2.5+2.5+2.5+8+2.5);
    case 28: return (6+2.5+2.5+2.5+2.5+8+2.5+2.5);
    case 29: return (6+2.5+2.5+2.5+2.5+8+2.5+2.5+2.5);
    case 30: return (6+2.5+2.5+2.5+2.5+8+2.5+2.5+2.5+2.5);
    }
    return 0;
}


function getY($i)
{
    switch($i) {
    case 0 : 
    case 1 : 
    case 2 : 
    case 3 : 
    case 4 : 
    case 26: 
    case 27: 
    case 28: 
    case 29: 
    case 30: return (6+14.5+12);

    case 5 : 
    case 6 : 
    case 7 : 
    case 8 : 
    case 9 : 
    case 11: 
    case 13: 
    case 15: 
    case 17: 
    case 19: 
    case 21: 
    case 22: 
    case 23: 
    case 24: 
    case 25: return (6+14.5);

    case 10: 
    case 12: 
    case 14: 
    case 16:
    case 18: 
    case 20: return (6);
    }
    return 0;
}


$r["max"]   = 0;
$r["data"]  = array();

for ($i =0; $i <31; $i++) {
    $point = array();
    $point["x"] = getX($i)*10;
    $point["y"] = getY($i)*10;
    $point["value"] = rand(0, 800)/10;
    $o["max"]  = max($r["max"] , $point["value"]);
    array_push($r["data"], $point);
}
echo json_encode($r, JSON_PRETTY_PRINT);

?>

