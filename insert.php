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

<form method="POST">

<div class="card">
    <div class="card-header bg-dark">
    <h1 class="text-center text-white">Insertion Operation</h1>
    </div>
 
  <label> Username: </label>
 <input type="text" name="username" class="form-control"> <br>

 <label> Email: </label>
 <input type="email" name="email" class="form-control"> <br>

 <label> Password: </label>
 <input type="password" name="password" class="form-control"> <br>

 <button class="btn btn-success" type="Submit" name="done">Submit</button>

 </div>

 </form>

    </div>
</body>
</html>
<?php


include 'conn.php';

if(isset($_POST['done'])){

    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $insertquery = "INSERT INTO `crudtable`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";

$query =  mysqli_query($con,$insertquery);

}else{
    echo 'Not Submit';
}


?>