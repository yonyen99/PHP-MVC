<?php require __DIR__ . '/../layout/header.php' ?>
<?php require __DIR__ . '/../layout/nav.php' ?>
<div class="container mt-3">
    <a href="/product/create" class="btn btn-primary">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $index => $product): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['qty'] ?></td>
                    <td>
                        <a href="/product/edit?id=<?= $product['id'] ?>" class="btn btn-warning">Edit</a> |
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#product<?= $product['id'] ?>">
                            Delete
                        </button>

                        <!-- Modal -->
                        <?php require 'delete.php' ?>
                        |
                        <a href="/product/show?id=<?= $product['id'] ?>" class="btn btn-success">view</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/../layout/footer.php' ?>