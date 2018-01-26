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

include_once '../database.php';
include_once '../Objects/api.php';


// instantiate database and message object
$database = new Database();

$db = $database->getConnection();



// initialize object
$api = new Api($db);

$api->id = isset($_GET['id']) ? $_GET['id'] : die();
$api->mykey = isset($_GET['mykey']) ? $_GET['mykey'] : die();

// query message


$stmt = $api->read();
$num = $stmt->rowCount();

$api_arr=array();
$api_arr["records"]=array();

// check if more than 0 record found
if($num>0){

    // products array
    $api_arr=array();
    $api_arr["records"]=array();

    // retrieve table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $api_item=array(
            "id" => $id,
            "mykey" => $mykey,
            "value" => ($value),

        );

        array_push($api_arr["records"], $api_item);
    }

    echo json_encode($api_arr);
}

else{
    echo json_encode(
        array("Empty:" => "No new messages")
    );
}
