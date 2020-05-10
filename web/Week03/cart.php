<?php
	session_start();
?>

<!DOCTYPE html>
<html lang = "en">
  <meta charset = "utf-8" />
  <title>Purchase Details Confirmation</title>
  <style>
		input{
			margin-top:10px;
		}
		ul, li{
			list-style:none;
		}
		ul{
			padding: 0px;
		}
		div{
			margin-top:10px;
			padding:0px 0px 20px 10px;
			border:solid;
			border-color:orange;
		}
		h2{
			text-decoration:underline;
			margin-bottom:10px;
		}
		.form{
			 border:none;
			 background-color:lightgrey;
			 margin:10px auto;
			 padding:5px;
			 text-align:center;
		}
  </style>
<body>

	<h1 style="text-align:center;">Please Review Your Purchase</h1>
	<div>
		<h2>Order Details</h2>
		<p style="text-decoration:underline">Items Purchased</p>
		<?php
		//Make sure that the session variable actually exists!
		if(isset($_SESSION['itemsInCart'])){
		    //Loop through it like any other array.
				$total = 0;
		    foreach($_SESSION['itemsInCart'] as $item){
		        //Print out the product ID.
		        echo $item['name'], " $", $item['cost'], "<br>" ;
						$total += $item['cost'];
		    }
				echo "<br>", "Total: $", $total, "<br>";
		}
		?>

	</div>

	<div class="form">
		<form method="post" action="checkout.php">
			<ul>
				<li>Do you wish to continue with purchase?</li>
				<li><input type=submit name="confirmed" value="Continue"><li>
				<li><input type=submit name="canceled" value="Return"></li>
			<ul>
		</form>
	</div>


</body>
</html>
