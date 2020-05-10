<?php
	session_start();
	if ( isset($_POST['name']) ){
		$item = array('name' => $_POST['name'], 'cost' => $_POST['cost']);
		$_SESSION['itemsInCart'][] = $item;
	}
	else if ( isset($_SESSION['canceled']) )
	{
		unset($_SESSION['canceled']);
	}
	else
		$_SESSION['itemsInCart'] = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ryan's Computer Hardware Homepage</title>
	<meta chartset="UTF-8">
	<style>
		body{
			margin:0px;
		}
		.heading{
			background:orange;
			padding: 5px 10px;
		}
		.form{
			border:solid;
			border-color:orange;
			background:lightgrey;
			width:75%;
			margin: 20px  auto;
		}
		table{
			margin:auto;
			border-spacing: 20px 25px;
		}
		tr,td{
			border:solid;
			border-width:1px;
		}
		td{
			padding:50px;
			text-align:center;
			width:25%;
			font-weight:bold;
		}
		#viewCart{
			position: fixed;
			right:10px;
			top: 40px;
		}
		button{
			margin-top: 10px;
		}
	</style>
</head>
<body onload="checkCart()">
	<!--Scripts-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="updateCart.js"></script>
	<script src="checkCart.js"></script>

	<!--Header-->
	<div class="heading">
		<h2>Welcome to Ryan's Computer Hardware</h2>
		<a href="cart.php"> <img id="viewCart" src="shoppingCart.png" alt="View Shopping Cart"  width="25" height="25"> </a>
	</div>

	<!--Error Message-->
	<div class="error">
		<p id="errMsg"></p>
	</div>

	<!--Form-->
	<div class="form">
					<table id="myTable">
						<tr>
							<td>
								RAM - $10<br><button id="item0" name="RAM"  value="10" onclick="updateCart(0)">+</button>
							</td>
							<td>
								HDD - $15<br><button id="item1" name="HDD"  value="15" onclick="updateCart(1)">+</button>
							</td>
						</tr>
						<tr>
							<td>
								Case - $20<br><button id="item2" name="Case"  value="20" onclick="updateCart(2)">+</button>
							</td>
							<td>
								Battery - $25<br><button id="item3" name="Battery"  value="25" onclick="updateCart(3)">+</button>
							</td>
						</tr>
						<tr>
							<td>
								GPU - $30<br><button id="item4" name="GPU"  value="20" onclick="updateCart(4)">+</button>
							</td>
							<td>
								CPU - $35<br><button id="item5" name="CPU"  value="25" onclick="updateCart(5)">+</button>
							</td>
						</tr>
					</table>
	</div>
</body>
</html>
