<?php

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

$payload = json_decode($json);
if(!empty($payload->notifications))
	file_put_contents("/tmp/json", base64_decode($payload->notifications[0]->payload));

?>

