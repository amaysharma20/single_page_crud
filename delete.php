<?php

include 'conn.php';

$data=[];
$id = $_POST['delete_id'];

$q = " DELETE FROM `crudtable` WHERE id = $id ";
$b= mysqli_query($con,$q);
//  if(mysqli_query($con,$q)){
//      $data['status']=1;
//  }else{
//      $data['status']=0;
//  }

echo mysqli_affected_rows($con);
if($b == 1){
    $data['status']='true';
}else{
    $data['status']='false';
}

echo json_encode($data);
// header('location:insert.php');

?>