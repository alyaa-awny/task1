<?php
require 'DBclass.php';
 require 'validatorclass.php';

Class Blog{
private $title;
private $content;


public function Publish($data){

#create validator class... 
$validator = new Validator();

 
    $this->title   = $validator->Clean($data ['title']);
    $this->content = $validator->Clean($data ['content']);
    // $this->image   = $validator->Clean($data ['image']);

  #validate data 
  $errors = [];
  
   # Valoidate title .... 
    if (!$validator->Validate($this->title, 'required')) {      
        $errors['Title'] = "Field Required";
    }elseif (!$validator->Validate($this->title, 'string')) {      
        $errors['Title'] = "InValid String";
    }

    # Validate  content 
    if (!$validator->Validate($this->content , 'required')) {      
        $errors['Content'] = "Field Required";
    }elseif(!$validator->validate($this->content ,"string")){
        $errors['content'] = "Invalid Format";
    }elseif(!$validator->validate($this->content ,"length")){
        $errors['content'] = "Must Be Greater Than 50Chrs";
    }

    // # Validate  Image 
    //   if (!$validator->Validate($this->FILES['image']['name'], 'required')) {      
    //     $errors['Image'] = "Field Required";
    //    }elseif(!$validator->Validate($this->FILES,"image")){
    //     $errors['Image'] = "Invalid Image Format";
    // }

# Checke errors 
    if (count($errors) > 0) {
        $Message = $errors;
    } else {
        // code ..... 

        # Upload Image ..... 

        $image = Upload($_FILES);


        $db = new DB();

     $sql = "insert into blog (title,content,image) values ('$this->title','$this->content','$this->image')"; 

     $op = $db->doQuery($sql);

      if($op){
          $Message = ["Message" => "Raw Inserted"]; 
      }else{
        $Message = ["Message" => "Error Try Again"]; 
      }
    }
}



}




?>