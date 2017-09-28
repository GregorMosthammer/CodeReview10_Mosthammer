<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
}else{
  $_SESSION['login'] = True;
}
 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['firstName']; ?></title>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="getProduct();">






            <?php echo "<div class=\"container\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-lg-5\">";
            echo "<img class=\"img-responsive\" src=\"0.png"."\">";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"row\">";
            echo "<div class=\"col-lg-6\">";
            echo "<h1>" . "Welcome" ." ".$userRow['firstName']. "!"."</h1>";
            echo "</div>";
              echo "<div class=\"col-lg-1\">";
              echo "<img class=\"img-responsive\" src=\"".$userRow['photolink'] ."\">";
              echo "<a href=\"logout.php?logout\">Sign Out</a>";
              echo "<h4>"."cart"."</h4>";
              echo "<div id=\"cartPlace\" action=\"exerciseajax.php\" method=\"POST\">";
                     
              echo "</div>";
              echo "</div>";

              echo "</div>";
            ?>

   

             <?php   
            $sqlstatement = "SELECT * FROM products";
  $xy = mysqli_query($conn,$sqlstatement);
  //$linkArray = Array();
  $counter = 0;
  
  $row = mysqli_fetch_array($xy, MYSQLI_ASSOC);
  echo "<div id=\"allproducts\">";            
      
    echo "<div class=\"row\" >";
      while ($row != NULL){
      
//to show the products


        $productId = $row['productId'];

                  
                  echo "<div style=\"border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;\" align=\"center\" class=\"col-lg-2 \">";
                  echo "<img class=\"img-responsive\" src=\"".$row['productImg'] ."\">";
                  echo "<a id=\"titel\" href='profile.php?id=" . $row['productId'] . "'>" . $row['productName']. "</a>"."<br>";
                  echo "<p id='price'>"."$".$row['productPrice']."</p>";
                  echo "<a id=\"details\" href='profile.php?id=" . $row['productId'] . "'>" . "details...". "</a>"."<br>";
                  echo "<button class=\"add\" value=\"". $productId . "\" type=\"button\">Add</button>";
                  echo "</div>";

                $counter += 1;
            $row = mysqli_fetch_array($xy, MYSQLI_ASSOC);

            if($counter % 4 == 0) {
            echo "</div>";
            echo "<div class=\"row\" >";
            }
            
      }
    echo "</div>";
  echo "</div>";
echo "</div>";
        



            ?>

<script>
            /* 
                function to put into the card
            */

            $(document).ready(function(){
            $(".add").click(function(){

            alert("productId =" + $(this).attr("value"));
            var productId = $(this).attr("value");
             var userId  = <?php echo $_SESSION['user'] ; ?> ;
             alert("userId =" + userId);
            
           var dataString = '&userId='+ userId;
           var dataString1 = '&productId='+ productId;

            if(productId==''){
              alert("Please Fill All Fields");
            
            }else{

            $.ajax({
                type: "POST",
                url: "exerciseajax.php",
                data: dataString + dataString1,
                cache: false,
                success: function(result){
                  alert(result);
                 // window.location.reload();
                 $('#cartPlace').prepend(result);
                }
            });
            
              
            }
 return false;
       });
      });

 function getProduct(){
 		$.ajax({
                type: "POST",
                url: "test2.php",
           
                cache: false,
                success: function(result){
                  alert(result);
                 // window.location.reload();
                 $('#cartPlace').prepend(result);
                }
            });
 }



/*
    $(document).ready(function()
    {
        $("#delete_video").click(function()
        { console.log("Hallo");
            var del_id = $(this).val();

            console.log(del_id);
            $.ajax({
                type:'POST',
                url:'delete.php',
                data:'delete_id='+del_id,
                cache: false,
                success: function(data)
                {
                  alert(data);
                    //window.location.reload();
                    $("#"+data).remove();
                }
            });
        });
    });*/





</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script-ajax.js" type="text/javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>