<?php

date_default_timezone_set('Asia/Seoul');

$r = array();
$v = array();

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
$han = "";
$data["heatmap"]["data"]  = array();

for ($i =0; $i <31; $i++) {
    $point = array();
    $point["x"]     = getX($i)*10;
    $point["y"]     = getY($i)*10;
    $point["value"] = $row[$i+2];

    $value = (int)$point["value"];
    array_push($v, $value);
    $max =  max($max, $value);
    $sum += $value;
    $chn += (string)$value + "|";
    array_push($data["heatmap"]["data"], $point);
}

$data["stat"]["raw"]    = $v;
$data["stat"]["max"]    = (int)$max;
$data["stat"]["sum"]    = (int)$sum;
$data["stat"]["avg"]    = (int)($sum/31);
$data["stat"]["front"]  = (int)($v[10]+$v[12]+$v[14]+$v[16]+$v[18]+$v[20]);
$data["stat"]["middle"] = (int)($v[5]+$v[6]+$v[7]+$v[8]+$v[11]+$v[13]+$v[15]+$v[17]+$v[19]+$v[21]+$v[22]+$v[23]+$v[24]+$v[25]);
$data["stat"]["rear"]   = (int)($v[0]+$v[1]+$v[2]+$v[3]+$v[4]+$v[26]+$v[27]+$v[28]+$v[29]+$v[30]);
$data["stat"]["left"]   = (int)($v[10]+$v[12]+$v[5]+$v[6]+$v[7]+$v[8]+$v[0]+$v[1]+$v[2]);
$data["stat"]["center"] = (int)($v[14]+$v[16]+$v[9]+$v[11]+$v[13]+$v[15]+$v[17]+$v[19]+$v[21]+$v[3]+$v[4]+$v[26]+$v[27]);
$data["stat"]["right"]  = (int)($v[18]+$v[20]+$v[22]+$v[23]+$v[24]+$v[25]+$v[28]+$v[29]+$v[30]);
$data["heatmap"]["max"] = (int)$max;
echo json_encode($data, JSON_PRETTY_PRINT);

?>

