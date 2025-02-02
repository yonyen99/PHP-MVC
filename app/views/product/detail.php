<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="container mt-3">
    <h3>Product Details</h3>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td><?= $product['name']; ?></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><?= $product['price']; ?></td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td><?= $product['qty']; ?></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><?= $product['category_name']; ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?= $product['description']; ?></td>
        </tr>
    </table>

    <a href="/products" class="btn btn-secondary">Back to Product List</a>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>