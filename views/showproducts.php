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
				<h1 class="header-title">Books list</h1>
				<form method="post">
					<button type="submit" name="add-product-btn" class="add-product-btn">Add Book</button>
				</form>
			</div>
		</div>	
	</header>
	<section>
		<div class="container">
			<div class="wrapper">
				<?php 
					if ($products['content']) {
						foreach ($products['content'] as $id => $name) {
							$number = ++$id;
							echo '
									<div class="item">
										<p class="item-text">' . $number . '. ' .  $name["name"] . '</p>
										<form class="delete-products-form" method="post">
											<button type="submit" value="' . $name['id'] . '" name="delete-product-btn" class="delete-product-btn">Delete Book</button>
										</form>
									</div>
								';
						}	
					} else {
						echo '
								<div class="item">
									<p class="item-text">Oops! No books created...</p>
								</div>
							';
					}
				?>
			</div>
		</div>
	</section>
	<footer>
		
	</footer>
	
</body>
</html>
