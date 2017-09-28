<?php 

$id = $_POST['delete_id'];
include('dbconnect.php');
echo $id . "<br>";

$sql=('DELETE FROM products WHERE productid = "'.$videoId.'"');

if (mysqli_query($conn,$sql)){
	echo ($id);
}
else {echo "Error" .$sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>

