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

if(!empty($t) && !strcmp($t, "LATEST")) {
  $result = pg_query($conn, "SELECT * FROM events ORDER BY ts DESC LIMIT 10");

  if (!pg_num_rows($result)) {
    echo "Your connection is working, but your database is empty.\nFret not. This is expected for new apps.<br>";
  } else {
    while ($row = pg_fetch_assoc($result)) {
      array_push($r, $row);
    }
  }
}

echo json_encode($r, JSON_PRETTY_PRINT);

?>
