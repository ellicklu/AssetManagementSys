<?php
function __autoload($class_name) {
    if(substr($class_name, -3) === 'Dao' || $class_name == 'DataAccess') {
        require_once 'dao/'.$class_name . '.php';
    } else {
        require_once $class_name . '.php';
    }
}

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    $API = new AssetAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}
?>