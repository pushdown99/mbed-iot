<?php

date_default_timezone_set('Asia/Seoul');

set_error_handler(function($severity, $message, $file, $line) {
        throw new \ErrorException($message, 0, $severity, $file, $line);
});

set_exception_handler(function($e) {
        header('HTTP/1.1 500 Internal Server Error');
        echo "Error on line {$e->getLine()}: " . htmlSpecialChars($e->getMessage());
        die();
});

$rawPost = NULL;

if (!isset($_SERVER['CONTENT_TYPE'])) {
        throw new \Exception("Missing HTTP 'Content-Type' header.");
}

switch ($_SERVER['CONTENT_TYPE']) {
        case 'application/json':
                $json = $rawPost ?: file_get_contents('php://input');
                break;

        case 'application/x-www-form-urlencoded':
                $json = $_POST['payload'];
                break;

        default:
                throw new \Exception("Unsupported content type: $_SERVER[CONTENT_TYPE]");
}

function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

//$json = '{"uuid":"popup-iot-sensor","data":[302,399,436,321,317,324,349,401,321,423,330,359,487,310,336,310,425,490,436,483,330,388,374,427,372,423,491,381,424,473,498],"time":"2019-03-28 16:12:16"}';
$obj = json_decode($json);
if(!empty($obj->data)) {
    print_r($obj);

    $conn = pg_connect(pg_connection_string_from_database_url());

    if (pg_connection_status($conn) != PGSQL_CONNECTION_OK) {
        echo "Error connecting to database.";
    }

    $id   = $obj->uuid;
    $ts   = $obj->time;
    $ch0  = $obj->data[0];
    $ch1  = $obj->data[1];
    $ch2  = $obj->data[2];
    $ch3  = $obj->data[3];
    $ch4  = $obj->data[4];
    $ch5  = $obj->data[5];
    $ch6  = $obj->data[6];
    $ch7  = $obj->data[7];
    $ch8  = $obj->data[8];
    $ch9  = $obj->data[9];
    $ch10 = $obj->data[10];
    $ch11 = $obj->data[11];
    $ch12 = $obj->data[12];
    $ch13 = $obj->data[13];
    $ch14 = $obj->data[14];
    $ch15 = $obj->data[15];
    $ch16 = $obj->data[16];
    $ch17 = $obj->data[17];
    $ch18 = $obj->data[18];
    $ch19 = $obj->data[19];
    $ch20 = $obj->data[20];
    $ch21 = $obj->data[21];
    $ch22 = $obj->data[22];
    $ch23 = $obj->data[23];
    $ch24 = $obj->data[24];
    $ch25 = $obj->data[25];
    $ch26 = $obj->data[26];
    $ch27 = $obj->data[27];
    $ch28 = $obj->data[28];
    $ch29 = $obj->data[29];
    $ch30 = $obj->data[30];

    $sql  = "INSERT INTO cushion VALUES ('".$id."','".$ts."'::timestamp,".$ch0.",".$ch1.",".$ch2.",".$ch3.",".$ch4.",".$ch5.",".$ch6.",".$ch7.",".$ch8.",".$ch9.",".$ch10.",".$ch11.",".$ch12.",".$ch13.",".$ch14.",".$ch15.",".$ch16.",".$ch17.",".$ch18.",".$ch19.",".$ch20.",".$ch21.",".$ch22.",".$ch23.",".$ch24.",".$ch25.",".$ch26.",".$ch27.",".$ch28.",".$ch29.",".$ch30.")";
    //print_r($sql);

    $result = pg_query($conn, $sql);

}

?>

