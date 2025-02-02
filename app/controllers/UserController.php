<?php
require __DIR__ . '/../models/UserModel.php';
class UserController
{
    private $model;
    function __construct()
    {
        $this->model =  new UserModel();
    }
    function index()
    {
        $users = $this->model->getUsers();
        require __DIR__ . '/../views/user/list.php';
    }

    function create()
    {
        require __DIR__ . '/../views/user/create.php';
    }

    function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name']
            ];
            $this->model->createUser($data);
            header('Location: /');
            exit();
        }
    }

    function edit($id)
    {
        $user = $this->model->getUser($id);
        require __DIR__ . '/../views/user/edit.php';
    }
    function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name']
            ];
            $this->model->updateUser($id, $data);
            header('Location: /');
            exit();
        }
    }

    function destroy($id)
    {
        $this->model->deleteUser($id);
        header('Location: /');
        exit();
    }
}
