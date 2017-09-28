
<?php
  include 'dbconnect.php';

	
$productId=$_POST['productId'];

$userId=$_POST['userId'];

 //var_dump($_POST);
$sql = "INSERT INTO cart (productId, userId) VALUES (\"$productId\", \"$userId\")";

if (mysqli_query($conn, $sql)) {
	$sql = "SELECT * FROM products WHERE productId = \"$productId\"";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo "<div>" . $row['productName'] . "</div>";
    echo "<p>" . "$" . $row['productPrice'] . "</p>";
    echo "<img class=\"img-responsive\" src=\"".$row['productImg'] ."\">" . "<br>";

} else {
    echo "Error: " . $sql . mysqli_error($conn);
}
mysqli_close($conn);
?>