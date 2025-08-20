<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit Product<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Product</h2>

<?php $errors = session('errors') ?? []; ?>

<form action="/products/<?= $product['id'] ?>" method="post" class="mt-3">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" 
            name="name" 
            class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" 
            value="<?= old('name', $product['name']) ?>" 
            required>
        <?php if (isset($errors['name'])): ?>
            <div class="invalid-feedback"><?= $errors['name'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Code</label>
        <input type="text" 
            name="code" 
            class="form-control <?= isset($errors['code']) ? 'is-invalid' : '' ?>" 
            value="<?= old('code', $product['code']) ?>" 
            required>
        <?php if (isset($errors['code'])): ?>
            <div class="invalid-feedback"><?= $errors['code'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" 
                class="form-control <?= isset($errors['category']) ? 'is-invalid' : '' ?>">
            <option value="">Choose Category</option>
            <?php foreach ($categories as $c) : ?>
                <option value="<?= $c['id'] ?>" 
                    <?= old('category', $product['category_id']) == $c['id'] ? 'selected' : '' ?>>
                    <?= $c['name'] ?>
                </option>
            <?php endforeach ?>
        </select>

        <!-- return error -->
        <?php if (isset($errors['category'])): ?>
            <div class="invalid-feedback"><?= $errors['category'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Unit</label>
        <input type="text" 
            name="unit" 
            class="form-control <?= isset($errors['unit']) ? 'is-invalid' : '' ?>" 
            value="<?= old('unit', $product['unit']) ?>" 
            required>
        <?php if (isset($errors['unit'])): ?>
            <div class="invalid-feedback"><?= $errors['unit'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Stock</label>
        <input type="number" 
            name="stock" 
            class="form-control <?= isset($errors['stock']) ? 'is-invalid' : '' ?>" 
            value="<?= old('stock', $product['stock']) ?>" 
            disabled>
        <?php if (isset($errors['stock'])): ?>
            <div class="invalid-feedback"><?= $errors['stock'] ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="/products" class="btn btn-secondary">Back</a>
</form>

<?= $this->endSection() ?>
