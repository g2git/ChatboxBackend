<?php
/**
 * Created by PhpStorm.
 * User: gimmy
 * Date: 25-1-18
 * Time: 12:18
 */

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../database.php';
include_once '../Objects/api.php';

$database = new Database();
$db = $database->getConnection();

$api = new Api($db);

// get posted data

$api->mykey = isset($_GET['mykey']) ? $_GET['mykey'] : die();
$api->value = isset($_GET['value']) ? $_GET['value'] : die();


// create the message
if($api->create()){

    $api_arr=array();
    $api_arr["records"]=array();

    $api_item=array(
        "id" => $api->id,
        );

    array_push($api_arr["records"], $api_item);
    echo json_encode($api_arr);
}

// if unable to create the message, tell the user
else{
    echo '{';
    echo '"400": "Operation failed"';
    echo '}';
}
