<?php

require "database.php";
define('SERVER_API_KEY','your server api key');
$token =[''];

$res = DataBase::getInstance()->getConnection()->prepare("select `token` from `token`");


if ($res->execute()) {
    if ($res->rowCount()>0)
    while ($row = $res->fetch(PDO::ATTR_AUTOCOMMIT)){
       array_push($token,$row['token']);
    }
    }

$header =[

    'Authorization: Key='.SERVER_API_KEY,
    'Content-Type: Application/json'

];



if (isset($_REQUEST['title'])  && !empty($_REQUEST['title'])  && isset($_REQUEST['body'])  && !empty($_REQUEST['body'])) {

    $msg = [

        'title' => $_REQUEST['title'],
        'body' => $_REQUEST['body'],
        'icon' => 'icon.png',
        'image' => 'd.png',

    ];


    $payload = [
        'registration_ids' => $token,
        'data' => $msg
    ];


    $curl = curl_init();

    curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => $header
        )

    );

    $response = curl_exec($curl);

    $err = curl_error($curl);

    curl_close($curl);


    if ($err) {
        echo "cUrl Error #:" . $err;
    } else {

        $res = DataBase::getInstance()->getConnection()->prepare("insert into `request_log` set `title`=?
,`body`=? ,`send_date`=? ,`response_log`=?");

        $res->bindValue(1,$_REQUEST['title']);
        $res->bindValue(2,$_REQUEST['body']);
        $res->bindValue(3,date("Y-m-d"));
        $res->bindValue(4,$response);

        $res->execute();

        echo $response;


    }

}else{
    echo "please Enter Parameter";
}



