<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
    <div class="container">

        <div class="col-lg-12">
        <h1 class="text-warning text-center">Display Table Data</h1>
        <table class="table table-striped table-hover tb">
        <tr class="text-white bg-dark text-center">
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th>
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
        <td> <?php echo $res['password'];  ?> </td>
        <td><button class="btn-danger btn"><a href="delete.php?id=<?php echo $res['id'];  ?> " class="text-white">Delete</a></button></td>
        <td><button class="btn-primary btn"><a href="update.php?id=<?php echo $res['id'];  ?>" class="text-white">Update</a></button></td>
        </tr>
<?php
    }
?>

        </table>
        </div>

    </div>
</body>
</html>