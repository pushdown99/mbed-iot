<?php

date_default_timezone_set('Asia/Seoul');

$r = array();

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


$r["max"]   = 0;
$r["data"]  = array();

for ($i =0; $i <31; $i++) {
    $point = array();
    $point["x"] = getX($i)*10;
    $point["y"] = getY($i)*10;
    $point["value"] = $row[$i+2];
    $r["max"]  = max($r["max"] , $point["value"]);
    array_push($r["data"], $point);
}
echo json_encode($r, JSON_PRETTY_PRINT);

?>

