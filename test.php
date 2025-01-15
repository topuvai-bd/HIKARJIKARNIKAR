<?php 
// echo all session variables
// show error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function GetRoomCode() {
    $url="https://apihubs.in/api/api?roomcode=&roomtype=0&apikey=a15df920e6978f846fd15eea957405ba";
    //curl get response
    // {
    //   "status": "success",
    //   "message": "data fatched",
    //   "data": {
    //   "apikey": "63baae34e6fcc32efe65440acc0080ac",
    //   "data": {
    //   "roomcode": "01089690",
    //   "type": "classic",
    //   "created_at": "2024-12-08T17:12:09.721Z"
    //   }
    //   }
    //   }
    $cURL= curl_init($url);
  
    curl_setopt($cURL,CURLOPT_RETURNTRANSFER,true);
    $response=curl_exec($cURL);
    // die($response);{"status":"success","message":"data fatched","data":{"data":{"roomcode":"04488290","type":"classic","created_at":"2025-01-15T09:03:56.623Z"}}}
    if(curl_errno($cURL)){
      return "";
    }
    else {
      $response=json_decode($response, true);
      if(isset($response["status"]) && $response["status"]=="success" ){
        return isset($response["data"]["data"]["roomcode"]) ? $response["data"]["data"]["roomcode"] : "";
      }
    }
    return "";
  }
echo "<pre>";
echo GetRoomCode();
echo "</pre>";  

?>
