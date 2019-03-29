<?php

date_default_timezone_set('Asia/Seoul');

$h = 400;
$w = 400;

if(isset($_GET["width"]))  $w = (int)htmlspecialchars($_GET["width"]);
if(isset($_GET["height"])) $h = (int)htmlspecialchars($_GET["height"]);

$r = array();
$v = array();

function getX($i)
{
    switch($i) {
    case 0 : return (int)($w*(60))/400;
    case 1 : return (int)($w*(60+25))/400;
    case 2 : return (int)($w*(60+25+25))/400;
    case 3 : return (int)($w*(60+25+25+25))/400;
    case 4 : return (int)($w*(60+25+25+25+25))/400;
    case 5 : return (int)($w*(25))/400;
    case 6 : return (int)($w*(25+25))/400;
    case 7 : return (int)($w*(25+25+25))/400;
    case 8 : return (int)($w*(25+25+25+25))/400;
    case 9 : return (int)($w*(25+25+25+25+25))/400;
    case 10: return (int)($w*(70))/400;
    case 11: return (int)($w*(25+25+25+25+25+25))/400;
    case 12: return (int)($w*(70+45))/400;
    case 13: return (int)($w*(25+25+25+25+25+25+25))/400;
    case 14: return (int)($w*(70+45+45))/400;
    case 15: return (int)($w*(25+25+25+25+25+25+25+25))/400;
    case 16: return (int)($w*(70+45+45+80))/400;
    case 17: return (int)($w*(25+25+25+25+25+25+25+25+25))/400;
    case 18: return (int)($w*(70+45+45+80+45))/400;
    case 19: return (int)($w*(25+25+25+25+25+25+25+25+25+25))/400;
    case 20: return (int)($w*(70+45+45+80+45+45))/400;
    case 21: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25))/400;
    case 22: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25+25))/400;
    case 23: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25+25+25))/400;
    case 24: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25+25+25))/400;
    case 25: return (int)($w*(25+25+25+25+25+25+25+25+25+25+25+25+25+25))/400;
    case 26: return (int)($w*(60+25+25+25+25+80))/400;
    case 27: return (int)($w*(60+25+25+25+25+80+25))/400;
    case 28: return (int)($w*(60+25+25+25+25+80+25+25))/400;
    case 29: return (int)($w*(60+25+25+25+25+80+25+25+25))/400;
    case 30: return (int)($w*(60+25+25+25+25+80+25+25+25+25))/400;
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
    case 30: return (int)($h*(60+145+120))/400;

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
    case 25: return (int)($h*(60+145))/400;

    case 10: 
    case 12: 
    case 14: 
    case 16:
    case 18: 
    case 20: return (int)($h*(60))/400;
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
  $row = pg_fetch_row($result);
}


$sum = 0;
$avg = 0;
$max = 0;
$chn = "";
$data["heatmap"]["data"]  = array();

for ($i =0; $i <31; $i++) {
    $point = array();
    $point["x"]     = getX($i);
    $point["y"]     = getY($i);
    $point["value"] = $row[$i+2];

    $value = (int)$point["value"];
    array_push($v, $value);
    $max =  max($max, $value);
    $sum += $value;
    $chn .= (string)($value).' | ';
    array_push($data["heatmap"]["data"], $point);
}

$data["stat"]["raw"]     = $v;
$data["stat"]["max"]     = (int)$max;
$data["stat"]["sum"]     = (int)$sum;
$data["stat"]["avg"]     = (int)($sum/31);
$data["stat"]["channel"] = $chn;

$data["stat"]["pos"]["front"]  = (int)($v[10]+$v[12]+$v[14]+$v[16]+$v[18]+$v[20]);
$data["stat"]["pos"]["middle"] = (int)($v[5]+$v[6]+$v[7]+$v[8]+$v[11]+$v[13]+$v[15]+$v[17]+$v[19]+$v[21]+$v[22]+$v[23]+$v[24]+$v[25]);
$data["stat"]["pos"]["rear"]   = (int)($v[0]+$v[1]+$v[2]+$v[3]+$v[4]+$v[26]+$v[27]+$v[28]+$v[29]+$v[30]);

$data["stat"]["pos"]["left"]   = (int)($v[10]+$v[12]+$v[5]+$v[6]+$v[7]+$v[8]+$v[9]+$v[0]+$v[1]+$v[2]);
$data["stat"]["pos"]["center"] = (int)($v[14]+$v[16]+$v[11]+$v[13]+$v[15]+$v[17]+$v[19]+$v[3]+$v[4]+$v[26]+$v[27]);
$data["stat"]["pos"]["right"]  = (int)($v[18]+$v[20]+$$v[21]+v[22]+$v[23]+$v[24]+$v[25]+$v[28]+$v[29]+$v[30]);

$data["heatmap"]["max"]   = (int)$max;
echo json_encode($data, JSON_PRETTY_PRINT);

?>

