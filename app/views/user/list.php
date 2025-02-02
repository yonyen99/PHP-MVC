<?php require __DIR__ . '/../layout/header.php' ?>
<?php require __DIR__ . '/../layout/nav.php' ?>
<div class="container mt-3">
    <a href="/user/create" class="btn btn-primary">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $user['name'] ?></td>
                    <td>
                        <a href="/user/edit?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a> |
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#user<?= $user['id'] ?>">
                            delete
                        </button>

                        <!-- Modal -->
                        <?php require 'delete.php' ?>
                        |
                        
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/../layout/footer.php' ?>