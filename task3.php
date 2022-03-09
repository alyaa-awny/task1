
<?php 


   if($_SERVER['REQUEST_METHOD'] == "POST"){

   $name  = $_POST['name'];
   $email = $_POST['email'];

   $password = $_POST['password'];
   $linkedin = $_POST['linkedin'];
   $address = $_POST['address'];
   echo $name.' : '.$email.' : '.$password. ':' .$linkedin.':' .$address.':';  
   }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Register</h2>

        <form action="task3.php" method="post">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="string" required class="form-control" id="exampleInputName" aria-describedby=""  name="name"  placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" required   minlength="6" class="form-control" id="exampleInputPassword1"  name="password"  placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputurl">linkedIn URL</label>
                <input type="url"  required class="form-control" id="exampleInputlinkedinurl"  name="linkedin"  placeholder="linkedin url">
            </div>
            <div class="form-group">
                <label for="exampleInputaddress">Address</label>
                <input type="text" required  
          minlength="10" class="form-control" id="exampleInputaddres"  name="address"  placeholder="address">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
