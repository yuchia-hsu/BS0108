<?php

$servername = "localhost";
$username = "chizumi";
$password = "19960112";
$database = "test";

$link = mysqli_connect($servername, $username, $password, $database);

if(!$link){
    die("connection failed:". mysqli_connect_error());
}

$insertSQL = "INSERT INTO test1 (username, password, email) VALUE ('', '', '') ";

if(mysqli_query($link, $insertSQL)){
    echo "已新增一筆資料";
}else{
    echo "Error:".$insertSQL."<br>".mysqli_error($link);
}

mysqli_close($link);


?>