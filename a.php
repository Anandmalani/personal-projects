<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $proname=$_POST["proname"];
    
    $price=$_POST["price"];
    $details=$_POST["details"];

    // Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "task2";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Die if connection was not successful
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
      // Submit these to a database

      // Sql query to be executed 
      $files=$_FILES['image'];
      $filename=$files['name'];
      $filetmp=$files["tmp_name"];
      $fileext=explode(".",$filename);
      $filecheck=strtolower(end($fileext));
      $fileextstored=array("png","jpg");
      if (in_array($filecheck,$fileextstored)){
        $destinationfile='upload/'.$filename;
        move_uploaded_file($filetmp,$destinationfile);

        $sql="INSERT INTO `info`( `proname`, `image`, `price`, `details`) VALUES (' $proname','$destinationfile','$price','$details')";
        $result = mysqli_query($conn, $sql);
      }
      
    //   $sql="INSERT INTO `info` ( `fname`, `lname`, `Jobtitle`, `Department`) VALUES ('$fname', '$lname', '$Jobtitle', '$Department')";
    //   $result = mysqli_query($conn, $sql);

      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your entry has been submitted successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
      }
      else{
          // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
      }

     }
  }
?>
  


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5 px-10">
    <form action="/task2/a.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="proname" class="form-label">Product Name</label>
    <input type="text" name="proname" required class="form-control" id="proname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" required class="form-control" id="image" >
    
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" required class="form-control" id="price" aria-describedby="emailHelp">
    
  </div>
  <div >
  <label for="Textarea ">Details</label>
  <textarea class="form-control mt-2" name="details" required id="Textarea"></textarea>
 
</div>
 
  <button type="submit" class="btn btn-primary mt-2">Submit</button>
  <button type="reset" class="btn btn-primary mt-2">Reset</button>
</form>

<div class="btn-group mt-4">
  <a href="/task2/b.php" class="btn btn-primary active" aria-current="page">Next</a>
  
</div>


<!-- 
    <div class="mt-4">
    <a href="/task2/b.php" class="btn btn-primary" role="button" data-bs-toggle="button">Next</a>
   -->
    <!-- <a href="/task2/b.php" class="btn btn-primary btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">Next</a> -->
    
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>