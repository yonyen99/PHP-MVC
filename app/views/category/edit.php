<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="container mt-3">
    <form action="/category/update?id=<?= $category['id'] ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" value="<?= $category['name'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="4" required><?= $category['description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
