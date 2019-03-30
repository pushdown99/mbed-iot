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

function std_dev ($arr) { 
  $num_of_elements = count($arr); 
  $variance = 0.0; 
  $average = array_sum($arr)/$num_of_elements; 
    
  foreach($arr as $i) { 
    $variance += pow(($i - $average), 2); 
  } 
  return (float)sqrt($variance/$num_of_elements); 
}

function getX($i)
{
    switch($i) {
    case 0 : return (int)(100*(60)/400);
    case 1 : return (int)(100*(60+25)/400);
    case 2 : return (int)(100*(60+25+25)/400);
    case 3 : return (int)(100*(60+25+25+25)/400);
    case 4 : return (int)(100*(60+25+25+25+25)/400);
    case 5 : return (int)(100*(25)/400);
    case 6 : return (int)(100*(25+25)/400);
    case 7 : return (int)(100*(25+25+25)/400);
    case 8 : return (int)(100*(25+25+25+25)/400);
    case 9 : return (int)(100*(25+25+25+25+25)/400);
    case 10: return (int)(100*(70)/400);
    case 11: return (int)(100*(25+25+25+25+25+25)/400);
    case 12: return (int)(100*(70+45)/400);
    case 13: return (int)(100*(25+25+25+25+25+25+25)/400);
    case 14: return (int)(100*(70+45+45)/400);
    case 15: return (int)(100*(25+25+25+25+25+25+25+25)/400);
    case 16: return (int)(100*(70+45+45+80)/400);
    case 17: return (int)(100*(25+25+25+25+25+25+25+25+25)/400);
    case 18: return (int)(100*(70+45+45+80+45)/400);
    case 19: return (int)(100*(25+25+25+25+25+25+25+25+25+25)/400);
    case 20: return (int)(100*(70+45+45+80+45+45)/400);
    case 21: return (int)(100*(25+25+25+25+25+25+25+25+25+25+25)/400);
    case 22: return (int)(100*(25+25+25+25+25+25+25+25+25+25+25+25)/400);
    case 23: return (int)(100*(25+25+25+25+25+25+25+25+25+25+25+25+25)/400);
    case 24: return (int)(100*(25+25+25+25+25+25+25+25+25+25+25+25+25)/400);
    case 25: return (int)(100*(25+25+25+25+25+25+25+25+25+25+25+25+25+25)/400);
    case 26: return (int)(100*(60+25+25+25+25+80)/400);
    case 27: return (int)(100*(60+25+25+25+25+80+25)/400);
    case 28: return (int)(100*(60+25+25+25+25+80+25+25)/400);
    case 29: return (int)(100*(60+25+25+25+25+80+25+25+25)/400);
    case 30: return (int)(100*(60+25+25+25+25+80+25+25+25+25)/400);
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
    case 30: return (int)(100*(60+145+120)/400);

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
    case 25: return (int)(100*(60+145)/400);

    case 10:
    case 12:
    case 14:
    case 16:
    case 18:
    case 20: return (int)(100*(60)/400);
    }
    return 0;
}

//$json = '{"uuid":"popup-iot-sensor","data":[302,399,436,321,317,324,349,401,321,423,330,359,487,310,336,310,425,490,436,483,330,388,374,427,372,423,491,381,424,473,498],"time":"2019-03-28 16:12:16"}';

$obj = json_decode($json);

if(!empty($obj->data)) {
    print_r($obj);

    $conn = pg_connect(pg_connection_string_from_database_url());

    if (pg_connection_status($conn) != PGSQL_CONNECTION_OK) {
        echo "Error connecting to database.";
        return;
    }

    $result = pg_query($conn, "SELECT * FROM cushion ORDER BY ts DESC LIMIT 1");

    if (!pg_num_rows($result)) {
      echo "Your connection is working, but your database is empty.\nFret not. This is expected for new apps.<br>";
    } else {
      $prev = pg_fetch_assoc($result);
    }

    $lst = array();

    $minX1 = 100;
    $maxX1 = 0;
    $cntX1 = 50;

    $minY1 = 100;
    $maxY1 = 0;
    $cntY1 = 50;

    $minX2 = 100;
    $maxX2 = 0;
    $cntX2 = 50;

    $minY2 = 100;
    $maxY2 = 0;
    $cntY2 = 50;

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

    $idx     = 0;
    $sum     = 0;
    $max     = 0;
    $detect  = 0;
    foreach($obj->data as $v) {
      $max = max($max, $v);		// max
      $sum += $v;			// sum
      if($v > 0) $detect += 1;		// detect

      $X = (int)getX($idx);
      $Y = (int)getY($idx);

      $v1 = ($v > 0)? 50:0;
      $v2 = ($v > 0)? 200:0;

      if($v1>0) {
        $minX1 = min($minX1, $X);
        $maxX1 = max($maxX1, $X);
        $minY1 = min($minY1, $Y);
        $maxY1 = max($maxY1, $Y);
      }

      if($v2>0) {
        $minX2 = min($minX2, $X);
        $maxX2 = max($maxX2, $X);
        $minY2 = min($minY2, $Y);
        $maxY2 = max($maxY2, $Y);
      }

      array_push($lst, $v);	
      $idx += 1;
    }
    $cntX1 = (int)($minX1 + $maxX1)/2;
    $cntY1 = (int)($minY1 + $maxY1)/2;
    $cntX2 = (int)($minX2 + $maxX2)/2;
    $cntY2 = (int)($minY2 + $maxY2)/2;

    $avg = (int)($sum / 31);
    $stddev = (int)std_dev($lst);

    $front  = (int)($lst[10]+$lst[12]+$lst[14]+$lst[16]+$lst[18]+$lst[20]);
    $middle = (int)($lst[5]+$lst[6]+$lst[7]+$lst[8]+$lst[11]+$lst[13]+$lst[15]+$lst[17]+$lst[19]+$lst[21]+$lst[22]+$lst[23]+$lst[24]+$lst[25]);
    $rear   = (int)($lst[0]+$lst[1]+$lst[2]+$lst[3]+$lst[4]+$lst[26]+$lst[27]+$lst[28]+$lst[29]+$lst[30]);
    $left   = (int)($lst[10]+$lst[12]+$lst[5]+$lst[6]+$lst[7]+$lst[8]+$lst[9]+$lst[0]+$lst[1]+$lst[2]);
    $center = (int)($lst[14]+$lst[16]+$lst[11]+$lst[13]+$lst[15]+$lst[17]+$lst[19]+$lst[3]+$lst[4]+$lst[26]+$lst[27]);
    $right  = (int)($lst[18]+$lst[20]+$lst[21]+$lst[22]+$lst[23]+$lst[24]+$lst[25]+$lst[28]+$lst[29]+$lst[30]);
    //$diff   = (!empty($_prev))? abs($sum - $_prev['sum']):0;
    $diff   = 0;

    $sql  = "INSERT INTO cushion VALUES ('".$id."','".$ts."'::timestamp,".$ch0.",".$ch1.",".$ch2.",".$ch3.",".$ch4.",".$ch5.",".$ch6.",".$ch7.",".$ch8.",".$ch9.",".$ch10.",".$ch11.",".$ch12.",".$ch13.",".$ch14.",".$ch15.",".$ch16.",".$ch17.",".$ch18.",".$ch19.",".$ch20.",".$ch21.",".$ch22.",".$ch23.",".$ch24.",".$ch25.",".$ch26.",".$ch27.",".$ch28.",".$ch29.",".$ch30.",".$max.",".$sum.",".$avg.",".$detect.",".$stddev.",".$front.",".$middle.",".$rear.",".$left.",".$center.",".$right.",".$minX1.",".$maxX1.",".$cntX1.",".$minY1.",".$maxY1.",".$cntY1.",".$minX2.",".$maxX2.",".$cntX2.",".$minY2.",".$maxY2.",".$cntY2.",".$diff.")";
    echo $sql."\n";

    $result = pg_query($conn, $sql);
}

?>

