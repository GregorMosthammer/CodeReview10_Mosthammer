<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
            Hi' <?php echo $userRow['userEmail']; ?>
             
            <a href="logout.php?logout">Sign Out</a>


            <?php

echo "<div class=\"container\" style=\"width:700px;\">";


$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if($result->num_rows > 0){
  while ($row = $result-> fetch_assoc()) {


 echo  "<div class='col-md-12'>" 
 . $row["product_name"] 
 . "<img style='width:100px; height:150px' src='" . $row["product_img"] . "'>" . 

 "<form action=\"exerciseajax.php\" method=\"POST\" id=\"myform\">" .
 "<input type=\"hidden\" name=\"hidden_name\" value=\"$row["name"]\" />" .

 "<input type=\"button\" id=\"submit\" value=\"Submit\">" .

"</form>" 

. "</div>"  
. "</div>";
    
        
 }
}else {
  echo "0 results";
}
?>





         
   
</body>
</html>
<?php ob_end_flush(); ?>