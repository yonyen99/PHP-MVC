<?php
require __DIR__ . '/../models/CategoryModel.php';

class CategoryController
{
    private $model;

    function __construct()
    {
        $this->model = new CategoryModel();
    }

    function index()
    {
        $categories = $this->model->getCategories();
        require __DIR__ . '/../views/category/list.php';
    }

    function create()
    {
        require __DIR__ . '/../views/category/create.php';
    }

    function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description']
            ];
            $this->model->createCategory($data);
            header('Location: /categories');
            exit();
        }
    }

    function edit($id)
    {
        $category = $this->model->getCategory($id);
        require __DIR__ . '/../views/category/edit.php';
    }

    function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description']
            ];
            $this->model->updateCategory($id, $data);
            header('Location: /categories');
            exit();
        }
    }

    function destroy($id)
    {
        $this->model->deleteCategory($id);
        header('Location: /categories');
        exit();
    }
}
