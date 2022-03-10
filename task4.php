
<?php 

function Clean($input){
     
       $input = trim($input);
       $input = strip_tags($input);
       $input = stripslashes($input);

       return $input;  }

   if($_SERVER['REQUEST_METHOD'] == "POST"){

   $name  =  clean ($_POST['name']);
   $password = clean ($_POST['password']);
   $linkedin = clean ($_POST['linkedin']);
   $address = clean ($_POST['address']);
//    $gender =clean( $_POST['gender']);
   $errors = [];

#validate name... 

if (empty($name)) {
    $errors ['name'] = 'enter your name';
}

#validate email address... 

if (empty($email)) { 
    $errors ['email']= 'required field';
} elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['Email']  = "Invalid Format"; 
    }
  
#validate password
 if (empty($password)) {
     $errors['password'] = 'enter your password';
 } elseif (strlen ($password) < 6) { 
     $errors['password']= " your password must be mor than 6 chars";
 }

#validate  address... 

if (empty($address)) { 
    $errors ['address']= 'required field';
} elseif (strlen ($address) < 10) { 
     $errors['address']= " your address must be mor than 10 chars";
 }

 #validate url... 
   if (filter_var($linkedin,FILTER_VALIDATE_URL)){
        echo  (" $linkedin this is a valid URL");
    }else {
       echo(" $linkedin this is not a valid URL") ;
    }
if (empty($linkedin)) { 
    $errors ['linkedin']= 'required field';
}
 

 #gender determination
//  if (empty($gender)) {
//     $errors ['gender'] = 'enter your gender';
// }

 #check errors.... 
  if (count($errors) > 0 ) {
      foreach ($errors as $key => $value) {
          echo $key. ":" .$value. "<br>";  
      } 
  }else {
    echo 'Name : '.$name.'<br>'.' Email : '.$email. "<br".'passwrd :' .$password.'<br>'.'address : '.$address.'<br>'. 'linkedil :'.$linkedin;
}

}
 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // CODE ..... 

    if (!empty($_FILES['uploadcv']['name'])) {

        $uploadcvName    = $_FILES['image']['name'];
        $uploadcvTemName = $_FILES['image']['tmp_name'];
        $uploadcvType    = $_FILES['image']['type'];
        $uploadcvSize    = $_FILES['image']['size'];

        # Allowed Extensions 
        $allowedExtensions = [ 'pdf'];

        $uploadcvArray = explode('/', $uploadcvType);

        # Uploadcv Extension ...... 
        $uploadcvExtension = end($imgArray);


        if (in_array($uploadcvExtension, $allowedExtensions)) {

            # Uploadcv New Name ...... 
            $FinalName = time() . rand() . '.' . $uploadcvExtension;

            $disPath = 'uploads/' . $FinalName;


            if (move_uploaded_file($uploadcvTemName, $disPath)) {
                echo 'CV Uploaded Succ ';
            } else {
                echo 'Error try Again';
            }
        } else {
            echo 'InValid Extension .... ';
        }
    } else {
        echo '* CV Required';
    }
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

        <form action="task4.php" method="post" enctype= "multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="string"  class="form-control" id="exampleInputName" aria-describedby=""  name="name"  placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password"    class="form-control" id="exampleInputPassword1"  name="password"  placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputurl">linkedIn URL</label>
                <input type="url"  class="form-control" id="exampleInputlinkedinurl"  name="linkedin"  placeholder="linkedin url">
            </div>
            <div class="form-group">
                <label for="exampleInputaddress">Address</label>
                <input type="text"   
           class="form-control" id="exampleInputaddres"  name="address"  placeholder="address">
            </div>
            
        
            <div> 
                <label for=""> Gender</label> <br>
          <input id="exampleInputmale" type="radio" name="gender" >
           <label for ="exampleInputmale">Male</label>
</div>
<div>
        
           <input  id="exampleInputfemal" type="radio" name="gender">
           <label for ="exampleInputfemal">Femal</label>
            </div>

<div class="form-group">
                <label for="exampleInputuploadcv">Upload CV</label>
                <input type="file"   
           class="form-control" id="exampleInputuploadcv"  name="uploadcv"  placeholder="Upload CV">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
