<?php require __DIR__ . '/../layout/header.php' ?>
<?php require __DIR__ . '/../layout/nav.php' ?>
<div class="container mt-3">
    <a href="/category/create" class="btn btn-primary">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $index => $category): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $category['name'] ?></td>
                    <td><?= $category['description'] ?></td>
                    <td>
                        <a href="/category/edit?id=<?= $category['id'] ?>" class="btn btn-warning">Edit</a> |
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#category<?= $category['id'] ?>">
                            Delete
                        </button>

                        <!-- Modal -->
                        <?php require 'delete.php' ?>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/../layout/footer.php' ?>
