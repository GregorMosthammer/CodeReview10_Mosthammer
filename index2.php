<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 } ?>
 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php

echo "<div class='container-fluid'>";

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if($result->num_rows > 0){
  while ($row = $result-> fetch_assoc()) {

  
 echo "<div class='row'>" . "<div class='col-md-4'>" .
.  $row["product_name"] . $row["product_img"] . 
. "</div>" . "<div class='col-md-8'>" . "</div>" . "</div>";
    
        
 }
}else {
  echo "0 results";
}



?>
















 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script-ajax.js" type="text/javascript"></script>
</body>
</html>