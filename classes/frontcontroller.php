<?php 
	namespace Main\FrontController;

	class FrontController{
		private $url;
		private $HttpMethod;
		private $controller;
		private function getUrl()
		{
			return $this->url;
		}

		private function getHttpMethod()
		{
			return $this->HttpMethod;
		}

		private function __construct()
		{
			$this->url = $_SERVER['REDIRECT_URL'];
			$this->HttpMethod = $_SERVER['REQUEST_METHOD'];
			$this->controller = new \Controller();
			$this->Router();
		}

		static function getInstance()
		{
			static $instance;
			if(!isset($instance))
			{
				return $instance = new self();
			}
			return $instance;
		}

		public function Router(){
			if($this->url == "/" && $this->HttpMethod == "GET" || isset($_POST['show-product-btn']))
			{
				$this->controller->ShowProducts('views/showproducts.php');
			} 
			else if($this->url == "/" && isset($_POST['add-product-btn']))
			{
				$this->controller->AddProducts('views/addproducts.php');
			}
			else if($this->url == "/" && isset($_POST['save-product-btn']))
			{
				$this->controller->SaveProducts($_POST['name']);
				$this->controller->ShowProducts('views/showproducts.php');
			}
			else if($this->url == "/" && isset($_POST['delete-product-btn']))
			{
				$this->controller->DeleteProducts($_POST['delete-product-btn']);
				$this->controller->ShowProducts('views/showproducts.php');
			}
			else if($this->url == "/")
			{
				$this->controller->NotFoundPage('404_NOT_FOUND.php');
			}
		}
	}
	
?>
