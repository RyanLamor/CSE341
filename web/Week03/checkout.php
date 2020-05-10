<?php
	session_start();
  if (isset($_POST['canceled'])){
    $_SESSION['canceled'] = 'true';
    header("Location: store.php");
  }
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
    input[type='text']{
      margin-left:10px;
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

  <form method="post" action="confirm.php">
    <div>
      <h2>Enter Your Information</h2>
      Frist Name<input type='text' name="firstName"><br>
      Last Name<input type='text' name="lastName"><br>
      Address<input type='text' name="address"><br>
    </div>

  	<div class="form">
  			<ul>
  				<li>Do you wish to continue with purchase?</li>
  				<li><input type=submit name="confirmed" value="Finish"><li>
  				<li><input type=submit name="canceled" value="Cancel"></li>
  			<ul>
  	</div>
  </form>


</body>
</html>
