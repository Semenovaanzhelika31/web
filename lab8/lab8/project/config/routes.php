<?php
	use \Core\Route;
	
	return [
		new Route('/hello/', 'hello', 'index'),

		// TestController
		new Route('/test/act1/', 'test', 'act1'),
		new Route('/test/act2/', 'test', 'act2'),
		new Route('/test/act3/', 'test', 'act3'),

		// NumController
		new Route('/nums/:n1/:n2/:n3/', 'num', 'sum'),

		// UserController: статические адреса идут раньше адресов с параметрами
		new Route('/user/all/',       'user', 'all'),
		new Route('/user/first/:n/',  'user', 'first'),
		new Route('/user/:id/:key/',  'user', 'info'),
		new Route('/user/:id/',       'user', 'show'),

		// ProductController (массив)
		new Route('/product/:n/',  'product', 'show'),
		new Route('/products/all/', 'product', 'all'),

		// PageController (массив, тайтлы)
		new Route('/my-page/:n/', 'page', 'show'),

		// PageController + модель (база данных, таблица page)
		new Route('/page/test/', 'page', 'test'),
		new Route('/page/:id/',  'page', 'one'),
		new Route('/pages/',     'page', 'all'),

		// ProductDb: продукты из базы данных (таблица product)
		new Route('/db-product/:id/', 'productdb', 'one'),
		new Route('/db-products/',    'productdb', 'all'),
	];
