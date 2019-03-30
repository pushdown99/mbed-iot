<?php

date_default_timezone_set('Asia/Seoul');

$w = 380;
$h = 380;
$t = 0;

if(isset($_GET["width"]))   $w = (int)htmlspecialchars($_GET["width"]);
if(isset($_GET["height"]))  $h = (int)htmlspecialchars($_GET["height"]);
if(isset($_GET["type"]))    $t = htmlspecialchars($_GET["type"]);

$r = array();
$v = array();

function getX($w, $i)
{
    switch($i) {
    case 0 : return (int)($w*(60)/400);
    case 1 : return (int)($w*(60+25)/400);
    case 2 : return (int)($w*(60+25+25)/400);
    case 3 : return (int)($w*(60+25+25+25)/400);
    case 4 : return (int)($w*(60+25+25+25+25)/400);
    case 5 : return (int)($w*(25)/400);
    case 6 : return (int)($w*(25+25)/400);
    case 7 : return (int)($w*(25+25+25)/400);
    case 8 : return (int)($w*(25+25+25+25)/400);
    case 9 : return (int)($w*(25+25+25+25+25)/400);
    case 10: return (int)($w*(70)/400);
    case 11: return (int)($w*(25+25+25+25+25+25)/400);
    case 12: return (int)($w*(70+45)/400);
    case 13: return (int)($w*(25+25+25+25+25+25+25)/400);
    case 14: return (int)($w*(70+45+45)/400);
    case 15: return (int)($w*(25+25+25+25+25+25+25+25)/400);
    case 16: return (int)($w*(70+45+45+80)/400);
    case 17: return (int)($w*(25+25+25+25+25+25+25+25+25)/400);
    case 18: return (int)($w*(70+45+45+80+45)/400);
    case 19: return (int)($w*(25+25+25+25+25+25+25+25+25+25)/400);
    case 20: return (int)($w*(70+45+45+80+45+45)/400);
    case 21: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25)/400);
    case 22: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25+25)/400);
    case 23: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25+25+25)/400);
    case 24: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25+25+25)/400);
    case 25: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25+25+25+25)/400);
    case 26: return (int)($w*(60+25+25+25+25+80)/400);
    case 27: return (int)($w*(60+25+25+25+25+80+25)/400);
    case 28: return (int)($w*(60+25+25+25+25+80+25+25)/400);
    case 29: return (int)($w*(60+25+25+25+25+80+25+25+25)/400);
    case 30: return (int)($w*(60+25+25+25+25+80+25+25+25+25)/400);
    }
    return 0;
}


function getY($h, $i)
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
    case 30: return (int)($h*(60+145+120)/400);

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
    case 25: return (int)($h*(60+145)/400);

    case 10: 
    case 12: 
    case 14: 
    case 16:
    case 18: 
    case 20: return (int)($h*(60)/400);
    }
    return 0;
}

function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

$conn = pg_connect(pg_connection_string_from_database_url());

if (pg_connection_status($conn) != PGSQL_CONNECTION_OK) {
    echo "Error connecting to database.";
}

$result = pg_query($conn, "SELECT * FROM cushion ORDER BY ts DESC LIMIT 1");
if (!pg_num_rows($result)) {
  echo "Your connection is working, but your database is empty.\nFret not. This is expected for new apps.<br>";
} else {
  $row = pg_fetch_assoc($result);
}

$chn = "";

$data["heatmap"]["data"]  = array();
$data["db"] = $row;
$data["type"] = $t;

for ($i =0; $i <31; $i++) {
    $point = array();
    $point["x"] = $X = (int)getX($w, $i);
    $point["y"] = $Y = (int)getY($h, $i);
    $offset     = 'ch'.$i;
    $value      = $row[$offset];
    $point["value"] = (int)$value;
    array_push($v, $value);
    $chn .= (string)($value).' | ';
    array_push($data["heatmap"]["data"], $point);
}

if(!strcmp($t,"COC")) {
    $point = array();
    $point["x"]     = (int)$row['_cntx1']*$w/400;
    $point["y"]     = (int)$row['_cnty1']*$h/400;
    $point["value"] = 100;
    array_push($data["heatmap"]["data"], $point);
}

if(!strcmp($t,"COM")) {
    $point = array();
    $point["x"]     = (int)$row['_cntx2']*$w/400;
    $point["y"]     = (int)$row['_cnty2']*$h/400;
    $point["value"] = 100;
    array_push($data["heatmap"]["data"], $point);
}

$data["heatmap"]["max"]   = $row['_max'];

$data["stat"]["raw"]     = $v;
$data["stat"]["max"]     = (int)$row['_max'];
$data["stat"]["sum"]     = (int)$row['_sum'];
$data["stat"]["avg"]     = (int)$row['_avg'];
$data["stat"]["detect"]  = (int)$row['_detect'];
$data["stat"]["stddev"]  = (int)$row['_stddev'];
$data["stat"]["diff"]    = (int)$row['_diff'];
$data["stat"]["channel"] = $chn;

$data["stat"]["pos"]["front"]  = (int)$row['_front'];
$data["stat"]["pos"]["middle"] = (int)$row['_middle'];
$data["stat"]["pos"]["rear"]   = (int)$row['_rear'];
$data["stat"]["pos"]["left"]   = (int)$row['_left'];
$data["stat"]["pos"]["center"] = (int)$row['_center'];
$data["stat"]["pos"]["right"]  = (int)$row['_right'];


echo json_encode($data, JSON_PRETTY_PRINT);

?>
