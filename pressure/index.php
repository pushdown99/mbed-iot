<?php

date_default_timezone_set('Asia/Seoul');

if(isset($_GET["type"])) $t = htmlspecialchars($_GET["type"]);

$r = array();

function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

$conn = pg_connect(pg_connection_string_from_database_url());

if (pg_connection_status($conn) != PGSQL_CONNECTION_OK) {
    echo "Error connecting to database.";
}

//////////////////////////////////////////////////////////////////////////////////
//
//

if(!empty($t) && !strcmp($t, "SUM")) {
  $result = pg_query($conn, "SELECT _sum FROM cushion ORDER BY ts DESC LIMIT 10");

  if (!pg_num_rows($result)) {
    echo "Your connection is working, but your database is empty.\nFret not. This is expected for new apps.<br>";
  } else {
    while ($row = pg_fetch_assoc($result)) {
      array_push($r, (int)$row["_sum"]);
    }
  }
}

if(!empty($t) && !strcmp($t, "DIFF")) {
  $result = pg_query($conn, "SELECT _diff FROM cushion ORDER BY ts DESC LIMIT 10");

  if (!pg_num_rows($result)) {
    echo "Your connection is working, but your database is empty.\nFret not. This is expected for new apps.<br>";
  } else {
    while ($row = pg_fetch_assoc($result)) {
      array_push($r, (int)$row["_diff"]);
    }
  }
}

if(!empty($t) && !strcmp($t, "USAGE")) {
  $existence = 0;
  $absence   = 0;
  $result = pg_query($conn, "SELECT _diff FROM cushion  WHERE ts BETWEEN now() AND now() + INTERVAL '1 DAY'");

  if (!pg_num_rows($result)) {
    echo "Your connection is working, but your database is empty.\nFret not. This is expected for new apps.<br>";
  } else {
    while ($row = pg_fetch_assoc($result)) {
      if($row['_sum'] > 0) $existence += 1;
      else $absence += 1;
    }
    $sum = (int)$existence + (int)$absence;
    $arg = (int)($existence*100/$sum);
    array_push($r, (int)$arg);
    array_push($r, (int)(100 - $arg));
  }
}




echo json_encode($r, JSON_PRETTY_PRINT);

?>
