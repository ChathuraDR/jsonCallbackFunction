<?php
/**
 * Created by PhpStorm.
 * User: ChathuraDR
 * Date: 4/10/2017
 * Time: 12:00 PM
 */

function getConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "git";

// Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname) or die("Connection failed: " . mysqli_connect_error());
    return $conn;
}


