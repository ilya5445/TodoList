<?php

namespace Controllers;

use Models\WorkModel;
use Utils\Functions;

class WorkController extends Controller {

    public function __construct() {
        parent::__construct();
		$this->model = new WorkModel();
	}

    public function index() {
        
        $sort = trim($_GET['sort']);
        $page = isset($_GET['page']) ? intval(trim($_GET['page'])) : 1;

        $count_per_page = 3;
        $start = ($page - 1) * $count_per_page;

        $data = $this->model->findAllWorks($start, $count_per_page, $sort);

        $this->pageData['works'] = $data['items'];
        $this->pageData['count'] = $data['count'];

        $this->pageData['pagination'] = Functions::pagination($data['count'], $count_per_page);

        $this->view->render('Views/index.php', $this->pageData);
    }

    public function create() {

        if (!empty($_POST)) {

            $name = addslashes(trim($_POST['name']));
            $email = addslashes(trim($_POST['email']));
            $text = addslashes(trim(htmlspecialchars($_POST['text'])));
            
            if ($this->model->create($name, $email, $text)) {
                $this->pageData['alert'] = ['type' => 'success', 'msg' => 'Задача создана'];
            } else {
                $this->pageData['alert'] = ['type' => 'danger', 'msg' => 'Произошла ошибка при создании задачи'];
            }

        }

        $this->view->render('Views/create.php', $this->pageData);
    }

    public function edit() {

        if (!isset($this->pageData['user'])) {
            header('location: /');
            exit();
        }

        $id = intval($this->request['id']);

        $this->pageData['work'] = $this->model->findWorkByID($id);

        if (!empty($_POST)) {

            $dataForSave = [];

            $dataForSave['name'] = addslashes(trim($_POST['name']));
            $dataForSave['email'] = addslashes(trim($_POST['email']));
            $dataForSave['text'] = addslashes(trim(htmlspecialchars($_POST['text'])));
            $dataForSave['status'] = $_POST['status'] == 'on' ? 1 : 0;

            if ($this->pageData['work']['text'] != $dataForSave['text']) $dataForSave['is_edit'] = 1;

            if ($this->model->edit($id, $dataForSave)) {
                $this->pageData['alert'] = ['type' => 'success', 'msg' => 'Задача обновлена'];
            } else {
                $this->pageData['alert'] = ['type' => 'danger', 'msg' => 'Произошла ошибка при изменении задачи'];
            }

        }

        if (empty($this->pageData['work'])) {
            header('location: /');
            exit();
        }

        $this->view->render('Views/edit.php', $this->pageData);
    }
    
}