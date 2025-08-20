<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit Category<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Category</h2>

<form action="/categories/update/<?= $category['id'] ?>" method="post" class="mt-3">
      <?= csrf_field() ?>

      <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" value="<?= esc($product['name']) ?>" required>
            <?php if (session('errors.name')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.name') ?>
                  </div>
            <?php endif; ?>
      </div>

      <div class="mb-3">
            <label class="form-label">Code</label>
            <input type="text" name="code" class="form-control <?= session('errors.code') ? 'is-invalid' : '' ?>" 
                  value="<?= old('code') ?>" required>
            <?php if (session('errors.code')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.code') ?>
                  </div>
            <?php endif; ?>
      </div>

      <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" id="" class="form-control <?= session('errors.category') ? 'is-invalid' : '' ?>"
                  value="<?= old('code') ?>">
                  <option value="">Choose Category</option>
                  <?php foreach ($categories as $c) : ?>
                        <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                  <?php endforeach ?>
            </select>
            <?php if (session('errors.category')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.category') ?>
                  </div>
            <?php endif; ?>
      </div>

      <div class="mb-3">
            <label class="form-label">Unit</label>
            <input type="text" name="unit" class="form-control <?= session('errors.unit') ? 'is-invalid' : '' ?>" 
                  value="<?= old('unit') ?>" required>
            <?php if (session('errors.unit')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.unit') ?>
                  </div>
            <?php endif; ?>
      </div>

      <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control <?= session('errors.stock') ? 'is-invalid' : '' ?>" 
                  value="<?= old('stock') ?>"required>
            <?php if (session('errors.stock')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.stock') ?>
                  </div>
            <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-success">Save</button>
      <a href="/categories" class="btn btn-secondary">Back</a>
</form>

<?= $this->endSection() ?>
