<?php
require 'dbconnection.php';

function Clean($input){
 
    return  stripslashes(strip_tags(trim($input)));
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title     = Clean($_POST['title']);
    $content = Clean($_POST['content']);
    // $image   = Clean($_POST['image']);


    # Validate ...... 

    $errors = [];

    # validate title .... 
    if (empty($title)) {
        $errors['title'] = "Field Required";
    }elseif (var_dump($title )!= string) {
       echo "write a valid title"
    }


    # validate content 
    if (empty($content)) {
        $errors['content'] = "Field Required";
    } elseif (strlen($content) < 50) {
        $errors['content']   = "Content length must be > 50chars";
    }


    # validate img 
    if (empty($image)) {
        $errors['image'] = "Field Required";
    } 


     # Check ...... 
    if (count($errors) > 0) {
        // print errors .... 

        foreach ($errors as $key => $value) {
            # code...

            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    }  else {

        $file  =   fopen('info.txt', 'a') or die('Unable to OPen File');

        $text = time() . "|" . $name . "|" . $email . "|" . $password . "\n";
        fwrite($file, $text);

        fclose($file);
    }


        //database code ...... 

      $sql = "insert into blog (title,content,img) values ('$title','$content', )";

     $op =  mysqli_query($con,$sql);

       if($op){
           echo 'Raw Inserted';
       }else{
           echo 'Error Try Again '.mysqli_error($con);
       }


       mysqli_close($con);

}


 ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>BLOG</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype= "multipart/form-data">

            <div class="form-group">
                <label for="exampleInputtitle">Title</label>
                <input type="text" class="form-control" required id="exampleInputtitle" aria-describedby="" name="title" placeholder="Enter Title">
            </div>


            <div class="form-group">
                <label for="exampleInputcontent">Content</label>
                <input type="text" class="form-control" required id="exampleInputcontent" aria-describedby="emailHelp" name="content" placeholder="Enter content">
            </div>

            <div class="form-group">
                <label for="exampleInputimage">Image</label>
                <input type="file" class="form-control" required id="exampleInputimage" name="image" placeholder="image">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</body>

</html>
