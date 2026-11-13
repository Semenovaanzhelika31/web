<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class NumController extends Controller
	{
		public function sum($params)
		{
			$sum = $params['n1'] + $params['n2'] + $params['n3'];
			
			$this->title = 'Сумма чисел';
			return $this->render('common/text', [
				'h1'   => $this->title,
				'text' => "{$params['n1']} + {$params['n2']} + {$params['n3']} = $sum",
			]);
		}
	}
