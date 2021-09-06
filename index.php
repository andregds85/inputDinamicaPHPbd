<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    if(isset($_POST['btnSubmit'])){
        $items = $_POST['array'];
        
        foreach ($items as $item){
            
            $arr = array();
            foreach ($item as $user){
                array_push($arr,$user);
            }
            
            $sql = "INSERT INTO info (Name, Email, Mobile)
                VALUES ('$arr[0]', '$arr[1]', '$arr[2]')";
        
            if ($conn->query($sql) === TRUE) {
                echo "Novo Registro foi Inserido";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4 text-center">Dynamically Add and Remove<br>HTML with Array</h1><hr>
      <form action="" method="post">

        <div id="main">
          <div class="card mb-3">
            <div class="card-body text-right">
              <button type="button" class="btn btn-success" id="add">Add More</button>
            </div>
          </div>
          <div class="card mb-3 clone">
            <div class="card-body">
              <div class="form-group form-check text-right">
                <button type="button" class="remove btn btn-danger d-none">Remove</button>
              </div>
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="array[0][name]">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="array[0][email]">
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" name="array[0][phone]">
              </div>
                
            </div>
          </div>
        </div>

          <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
      </form> 
    </div> 
  </div>
  
  <!-- Custome -->
  <script src="script.js"></script>
</body>
</html>



