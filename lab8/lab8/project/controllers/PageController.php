<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Page;
	
	class PageController extends Controller
	{
		private $pages;
		
		public function __construct()
		{
			$this->pages = [
				1 => ['title'=>'страница 1', 'text'=>'текст страницы 1'],
				2 => ['title'=>'страница 2', 'text'=>'текст страницы 2'],
				3 => ['title'=>'страница 3', 'text'=>'текст страницы 3'],
			];
		}
		
		// /my-page/:n/ - страницы из массива, текст в абзаце, title из ключа 'title'
		public function show($params)
		{
			$n = $params['n'];
			
			if (!isset($this->pages[$n])) {
				$this->title = 'Страница не найдена';
				return $this->render('common/text', ['h1' => $this->title, 'text' => 'Такой страницы нет']);
			}
			
			$this->title = $this->pages[$n]['title'];
			return $this->render('page/show', ['text' => $this->pages[$n]['text']]);
		}
		
		// /page/test/ - проверка модели из теории
		public function test()
		{
			$page = new Page;
			
			var_dump($page->getById(3));
			var_dump($page->getById(5));
			var_dump($page->getByRange(2, 5));
		}
		
		// /page/:id/ - одна страница из базы
		public function one($params)
		{
			$page = (new Page)->getById((int) $params['id']);
			
			if (!$page) {
				$this->title = 'Страница не найдена';
				return $this->render('common/text', ['h1' => $this->title, 'text' => 'Такой страницы нет в базе']);
			}
			
			$this->title = $page['title'];
			return $this->render('page/one', [
				'text' => $page['text'],
				'h1'   => $this->title,
			]);
		}
		
		// /pages/ - все страницы из базы
		public function all()
		{
			$this->title = 'Список всех страниц';
			
			$pages = (new Page)->getAll();
			return $this->render('page/all', [
				'pages' => $pages,
				'h1'    => $this->title,
			]);
		}
	}
