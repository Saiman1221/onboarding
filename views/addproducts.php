<!DOCTYPE html>
<html>
<head>
	<title><?= $products["title"] ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/main.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="display-flex">
				<h1 class="header-title">Add Books</h1>
				<form method="post">
					<button type="submit" name="show-product-btn" class="delete-product-btn">Cancel</button>
				</form>
			</div>
		</div>	
	</header>
	<section>
		<div class="container">
			<div class="wrapper">
				<p class="item-text">Input the Name of Book</p>
				<div class="item">
					<form class="save-products-form" method="post">
						<input type="text" name="name" placeholder="Name" required="">
						<button type="submit"  name="save-product-btn" class="add-product-btn">Add Book</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer>
		
	</footer>
	
</body>
</html>
