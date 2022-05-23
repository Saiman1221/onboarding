<?php
	require_once __DIR__ . '/vendor/autoload.php';
	use Main\FrontController\FrontController;

	Connect::getInstance();
	FrontController::getInstance();

	class Controller
	{
		private $model;

		protected function getModel(){
			return $this->model;
		}

		public function __construct(){
			$this->model = ProductsModel::getInstance();
		}

		public function ShowProducts($view)
		{
			$products = [
						"title" => "Book list",
						"content" => $this->getModel()->getProducts()
					];
			self::Render($view, $products);
		}

		public function AddProducts($view)
		{
			$products = [
						"title" => "Add book"
					];
			self::Render($view, $products);
		}

		public function SaveProducts($prop)
		{
			$this->getModel()->addProducts(new Book($prop));
		}

		public function DeleteProducts($id)
		{
			$this->getModel()->deleteProducts($id);
		}

		public function NotFoundPage()
		{
			
		}

		public function Render($view, $products = NULL)
		{
			include $view;
		}
	}

	class Connect{
		static function getInstance(){
			static $instance;
			if(!isset($instance))
			{
				return $instance = new self();
			}
			return $instance;
		}

		public function __construct(){
			$conn = new mysqli('localhost', 'root', 'root');
			$sql = "CREATE DATABASE onboardingtest";
			mysqli_query($conn, $sql);

			$conn = new mysqli('localhost', 'root', 'root', 'onboardingtest');
			$sql = "CREATE TABLE Products(
								id INT NOT NULL AUTO_INCREMENT,
								name TEXT NOT NULL,
								PRIMARY KEY (id)
							)";
			mysqli_query($conn, $sql);
		}
	}

	class ProductsModel{
		private $DbConnection;

		public function getDbConnection(){
			return $this->DbConnection;
		}

		public function __construct(){
			$this->DbConnection = new mysqli('localhost', 'root', 'root', 'onboardingtest');
		}

		static function getInstance(){
			static $instance;
			if(!isset($instance))
			{
				return $instance = new self();
			}
			return $instance;
		}

		public function addProducts($product){
			
			$sql = "INSERT INTO Products(name) VALUES ('{$product->getName()}')";
			$this->getDbConnection()->query($sql);
		}

		public function getProducts(){
			$mysqli_result = mysqli_query($this->getDbConnection(), 'SELECT * FROM Products');
			while($row = mysqli_fetch_assoc($mysqli_result)){
				$result[] = $row;
			}
			// var_dump($result);
			return $result;
		}

		public function deleteProducts($id){
			mysqli_query($this->getDbConnection(), "DELETE FROM Products WHERE id IN($id)");
		}
	}

	class Book
	{
		private $name;

		public function getName()
		{
			return $this->name;
		}

		public function __construct($name)
		{
			$this->name = $name;
		}
	}

?>