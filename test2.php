<?php 

ob_start();
 session_start();
 // to add into card

 require_once 'dbconnect.php';


// include 'test.php';
// echo $_SESSION['user'];
$test = $_SESSION['user'];
$sql = "SELECT * FROM cart,products WHERE cart.userId = $test AND products.productId = cart.productId";
if (mysqli_query($conn, $sql)) {
	$result = mysqli_query($conn, $sql);
	// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	//$resultString = " ";
	while ($row = mysqli_fetch_assoc($result)) {
		// var_dump($row);

    echo $row['productName'];
    echo "<p>"  . $row['productPrice'] . "</p>";
    echo "<img class=\"img-responsive\" src=\"".$row['productImg'] ."\">" . "<br>";

    //$resultString +=  "<div>" . $row['productName'] . "</div>";
    //$resultString +=  "<p>"  . $row['productPrice'] . "</p>";
    //$resultString +=  "<img class=\"img-responsive\" src=\"".$row['productImg'] ."\">" . "<br>";
}




} else {
    echo "Error: " . $sql . mysqli_error($conn);
}



 ?>