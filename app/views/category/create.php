<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="container mt-3">
    <form action="/category/store" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
