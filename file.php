<?php
$filetable='file_managed';
/*
header('Content-type: application/json');
$method=$_SERVER['REQUEST_METHOD'];
$db=new PDO('mysql:host=localhost;dbname=d7testbed', 'd7testbeduser', 'd7testbedpass');
 */
include "conn.php";
switch($method) {
  case 'GET':
    $sql=$db->query('SELECT * FROM file_managed');
    $fid=array();
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
      $fid[] = $row;
    }
    echo json_encode($fid);
    break;
  case 'POST':
    if (empty($_POST['data'])) {
      header('Missing data', true, 400);
    } else {
      $fid=$db->query('SELECT MAX(fid)+1 as fid FROM file_managed')->fetchColumn();
      echo json_encode(['fid' => $fid]);
    }
}
