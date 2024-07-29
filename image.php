<?php
$conn = mysqli_connect("localhost","root","","mydb");



if(isset($_POST["btn"])){
    $name = $_POST["name"];
    $ext = $_FILES["image"]["type"];

    if(strtolower($ext) == "image/jpg" 
    || strtolower($ext) == "image/jpeg" 
    || strtolower($ext) == "image/png"
    || strtolower($ext) == "image/jfif")
        {
          $imagename=$_FILES['image']['name']; //database
          $target ='img/' .basename($imagename);
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target ))
            {
    $insert = "INSERT INTO `image`(`name`, `image`) VALUES ('$
    
    name','./$target')";
    $run = mysqli_query($conn, $insert);
  //  header("location:albumtable.php");
    echo "<script> alert('Successfully Uploaded')</script>";
    
            }
            else{
              echo "<script> alert('Not Uploaded')</script>";
            }
    
    }

  }

?>
<form action="" method="post" enctype="multipart/form-data">
  <input type="text" name="name" id=""><br><br>
  <input type="file" name="image" id="">
  <input type="submit" name="btn" value="save" id="">
</form>