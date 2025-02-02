<?php
require __DIR__ . '/../models/ProductModel.php';

class ProductController
{
    private $model;

    function __construct()
    {
        $this->model = new ProductModel();
    }

    function index()
    {
        $products = $this->model->getProducts();
        require __DIR__ . '/../views/product/list.php';
    }

    function create()
    {
        // Fetch categories
        $categories = $this->model->getCategories();
        require __DIR__ . '/../views/product/create.php';
    }

    function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'qty' => $_POST['qty'],
                'category_id' => $_POST['category_id']
            ];
            $this->model->createProduct($data);
            header('Location: /products');
            exit();
        }
    }

    function edit($id)
    {
        $product = $this->model->getProduct($id);
        $categories = $this->model->getCategories();
        require __DIR__ . '/../views/product/edit.php';
    }

    function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'qty' => $_POST['qty'],
                'category_id' => $_POST['category_id']
            ];
            $this->model->updateProduct($id, $data);
            header('Location: /products');
            exit();
        }
    }

    function destroy($id)
    {
        $this->model->deleteProduct($id);
        header('Location: /products');
        exit();
    }

    public function show($id)
{
    $product = $this->model->show($id);

    require __DIR__ . '/../views/product/detail.php';
}
}
