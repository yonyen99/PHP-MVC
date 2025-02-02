<?php require __DIR__ . '/../layout/header.php' ?>
<div class="container">
    <form action="/product/update?id=<?= $product['id'] ?>" method="POST">
        <div class="form-group">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="price" class="form-label">Price:</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>" required>
        </div>
        <div class="form-group">
            <label for="qty" class="form-label">Quantity:</label>
            <input type="number" name="qty" class="form-control" value="<?= $product['qty'] ?>" required>
        </div>
        <div class="form-group">
            <label for="category_id" class="form-label">Category:</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select a Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?>>
                        <?= $category['name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control" required><?= $product['description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
<?php require __DIR__ . '/../layout/footer.php' ?>