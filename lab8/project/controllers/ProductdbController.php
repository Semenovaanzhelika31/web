<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Product;
	
	class ProductdbController extends Controller
	{
		// /db-product/:id/
		public function one($params)
		{
			$product = (new Product)->getById((int) $params['id']);
			
			if (!$product) {
				$this->title = 'Продукт не найден';
				return $this->render('common/text', ['h1' => $this->title, 'text' => 'Такого продукта нет в базе']);
			}
			
			$this->title = $product['name'];
			return $this->render('productdb/one', ['product' => $product]);
		}
		
		// /db-products/
		public function all()
		{
			$this->title = 'Все продукты из базы';
			return $this->render('productdb/all', [
				'h1'       => $this->title,
				'products' => (new Product)->getAll(),
			]);
		}
	}
