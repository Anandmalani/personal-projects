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
  <div class="container">
  <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Product Name</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include "dbconnect.php";
  
$sql = "SELECT * FROM `info`";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    // echo var_dump($row);

     echo "<tr>
      <th scope='row'>".$row['Sr.No']."</th>
      <td>".$row['proname']."</td>";
      ?>
      <td><img src="<?php echo $row['image']  ;?>" height="100px" width="100px"></td>
      <?php
      echo
      "<td>".$row['price']."</td>
      <td>".$row['details']."</td>
    </tr>";
      // // echo var_dump($row);
      // echo $row['Sr.No'] . $row['fname'] . $row['lname'] . $row['Jobtitle'] . $row['Department'];
      // echo "<br>";
  }



?>




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