<?php

require "blog/classes/blogclass.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $obj = new Blog();
   $Result = $obj-> Publish($_POST);

    foreach ($Result as $key => $value) {
        # code...
echo '_'.$key.':'.$value;

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
        <h2>Blog</h2>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" required id="exampleInputtitle" aria-describedby="" name="title" placeholder="Enter title">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Content</label>
                <input type="text" class="form-control" required id="exampleInputcontent"  name="content" placeholder="Enter content">
            </div>

           <div class="form-group">
                <label for="exampleInputName">Image</label>
                <input type="file" name="image">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</body>

</html>