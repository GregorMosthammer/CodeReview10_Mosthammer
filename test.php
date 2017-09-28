<?php
echo $_SESSION['user'];
$test = $_SESSION['user'];

if (mysqli_query($conn, $sql)) {
	$sql = "SELECT * FROM cart,products WHERE userId = $test AND products.productId = cart.productId";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo "<div>" . $row['productName'] . "</div>";
    echo "<p>" . "$" . $row['productPrice'] . "</p>";
    echo "<img class=\"img-responsive\" src=\"".$row['productImg'] ."\">" . "<br>";

} else {
    echo "Error: " . $sql . mysqli_error($conn);
}?>