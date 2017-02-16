<?php
$host = "localhost";
$db   = "deneme";
$user = "deneme";
$pass = "dnm";
header("Content-type: application/json");
$method=$_SERVER["REQUEST_METHOD"];
$db=new PDO("mysql:host=$host;dbname=$db", "$user", "$pass");

