<?php

namespace Controllers;

use Views\View;
use Models\Model;

class Controller {

    protected $request;
    protected $user;
    protected $model;
	protected $view;
	protected $pageData = array();

    public function __construct() {
	
		$this->view = new View();
		$this->model = new Model();

		$this->request = $this->request();

		$this->pageData['user'] = isset($_SESSION['user']) && !empty($_SESSION['user']) ? $_SESSION['user'] : null;

	}

	public function request($str = '') {
		
		if (!$str && !empty($_GET) && isset($_GET['q']) && $_GET['q']) {

			$get = explode('/', $_GET['q']);

			$result = [];

			if (isset($get[0])) $result['method'] = $get[0];
			if (isset($get[1])) $result['id'] = intval($get[1]);

			return $result;

		} else return [];

	}
    
}