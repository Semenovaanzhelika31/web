<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class UserController extends Controller
	{
		private $users;
		
		public function __construct()
		{
			$this->users = [
				1 => ['name'=>'user1', 'age'=>'23', 'salary' => 1000],
				2 => ['name'=>'user2', 'age'=>'24', 'salary' => 2000],
				3 => ['name'=>'user3', 'age'=>'25', 'salary' => 3000],
				4 => ['name'=>'user4', 'age'=>'26', 'salary' => 4000],
				5 => ['name'=>'user5', 'age'=>'27', 'salary' => 5000],
			];
		}
		
		// /user/:id/
		public function show($params)
		{
			$id = $params['id'];
			$this->title = "Юзер $id";
			
			if (!isset($this->users[$id])) {
				return $this->render('common/text', ['h1' => $this->title, 'text' => 'Такого юзера нет']);
			}
			
			$user = $this->users[$id];
			return $this->render('common/text', [
				'h1'   => $this->title,
				'text' => "Имя: {$user['name']}, возраст: {$user['age']}, зарплата: {$user['salary']}",
			]);
		}
		
		// /user/:id/:key/
		public function info($params)
		{
			$id  = $params['id'];
			$key = $params['key'];
			$this->title = "Данные юзера $id";
			
			if (!isset($this->users[$id][$key])) {
				return $this->render('common/text', ['h1' => $this->title, 'text' => 'Такого юзера или поля нет']);
			}
			
			return $this->render('common/text', [
				'h1'   => $this->title,
				'text' => "$key: " . $this->users[$id][$key],
			]);
		}
		
		// /user/all/
		public function all()
		{
			$this->title = 'Список всех юзеров';
			return $this->render('user/list', ['h1' => $this->title, 'users' => $this->users]);
		}
		
		// /user/first/:n/
		public function first($params)
		{
			$n = (int) $params['n'];
			$this->title = "Первые $n юзеров";
			return $this->render('user/list', [
				'h1'    => $this->title,
				'users' => array_slice($this->users, 0, $n, true),
			]);
		}
	}
