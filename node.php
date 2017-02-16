<?php
$nodetable='deneme';
include "conn.php";
/*
 * $input = json_decode(file_get_contents('php://input'),true);
$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
$values = array_map(function ($value) use ($db) {
  if ($value===null) return null;
},array_values($input));
$set = '';
for ($i=0;$i<count($columns);$i++) {
  $set.=($i>0?',':'').'`'.$columns[$i].'`=';
  $set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
}
 */
switch($method) {
  case 'GET':
    $sql=$db->query("SELECT * FROM $nodetable");
    $node=array();
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
      $node[] = $row;
    }
    echo json_encode($node);
    break;
  case 'POST':
    if (empty($_POST['data'])) {
      header('Missing data', true, 400);
    } else {
      $node=$db->query("INSERT INTO $nodetable SET $set");
      $db->execute();
      echo json_encode($node);
      break;
    }
}
