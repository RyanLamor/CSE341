<?php
	session_start();
	if (isset($_POST['canceled'])){
		$_SESSION['canceled'] = 'true';
		header("Location: cart.php");
	}
	echo '<h1>' , 'Thank You ' , $_POST['firstName'] , " " ,
	 		 $_POST['lastName'] , ' For Your Purchase' , '</h1>';

	echo "The following items will be shipped to ", '<u>', $_POST['address'], '</u>', '<br>';

	if(isset($_SESSION['itemsInCart'])){
			//Loop through it like any other array.
			foreach($_SESSION['itemsInCart'] as $item){
					//Print out the product ID.
					echo '- ', $item['name'], "<br>" ;
			}

	}

?>

<!DOCTYPE html>
<html>
	<title>Purchase Confirmed</title>

<body>
	<br>
	<a href="store.php">Return to Store</a>
</body>
</html>
