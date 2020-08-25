<?php


include 'conn.php';
$update=0;
$username="";
$email="";
$password="";
if(isset($_REQUEST['edit'])){
    $id = $_REQUEST['edit'];
    $update = 1;
    $loadquery = "SELECT * FROM `crudtable` WHERE id = $id";

    $query =  mysqli_query($con,$loadquery);

    if(count($query) == 1 ){
        $res = mysqli_fetch_array($query);
        $id = $res['id'];
        $username = $res['username'];
        $email = $res['email'];
        $password = $res['password'];
    }

}

if(isset($_REQUEST['update'])){
    $id = $_REQUEST['edit'];
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $updatequery = "UPDATE `crudtable` SET `username`='$username',`email`='$email',`password`=`$password` WHERE id=$id";
    $query =  mysqli_query($con,$updatequery);
    header('location:insert.php');
}

if(isset($_POST['done'])){

    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $insertquery = "INSERT INTO `crudtable`(`username`, `email`,`password`) VALUES ('$username','$email','$password')";

$query =  mysqli_query($con,$insertquery);
    header('location:insert.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
    <div class="col-lg-6 m-auto">

<form action="#" method="POST">

<div class="card">
    <div class="card-header bg-dark">
    <h1 class="text-center text-white">Insertion Operation</h1>
    </div>
 
  <label> Username: </label>
 <input type="text" name="username" class="form-control" value="<?php echo $username;  ?>"> <br>

 <label> Email: </label>
 <input type="email" name="email" class="form-control" value="<?php echo $email;  ?>"> <br>

 <label> Password: </label>
 <input type="password" name="password" class="form-control" value="<?php echo $password;  ?>"> <br>

<?php if($update > 0) { ?><button class="btn btn-success" type="Submit" name="update">Update</button><?php } elseif ($update == 0) {?> <button class="btn btn-success" type="submit" name="done">Submit</button><?php }?>

 </div>



    </div>

<div class="container">
<div class="col-lg-12">
<h1 class="text-warning text-center">Display Table Data</h1>
<table class="table table-striped table-hover tb">
<tr class="text-white bg-dark text-center">
<th>Id</th>
<th>Username</th>
<th>Email</th>
<th>Delete</th>
<th>Update</th>
</tr>
<?php

include 'conn.php';



$insertquery = "SELECT * FROM `crudtable`";

$query =  mysqli_query($con,$insertquery);

while($res = mysqli_fetch_array($query)){


?>

<tr class="border border-dark text-center">
<td> <?php echo $res['id'];  ?> </td>
<td> <?php echo $res['username'];  ?> </td>
<td> <?php echo $res['email'];  ?> </td>
<td><button class="btn-danger btn"  class="text-white" type="button" onClick="deleteAjax(<?php echo $res['id']; ?>)">Delete</button></td>
<td><button class="btn-primary btn" class="text-white" type="button" ><a href="insert.php?edit=<?php echo $res['id'];  ?>" class="text-white">Update</a></button></td>
</tr>
<?php
}
?>

</table>
</div>
</form>
<script type="text/javascript">
function deleteAjax(id){

if(confirm('Are you Sure')){

$.ajax({
    type:'post',
    url:'delete.php',
    data:{delete_id:id},
    success:function(data){
        console.log(JSON.parse(data));
        location.reload();

    }
})

}

}
</script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>