<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Add Purchase<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Add Purchase</h2>

<form action="/purchases" method="post" class="mt-3">
      <div class="mb-3">
            <label class="form-label">Vendor Name</label>
            <input type="text" name="name" class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" required>
            <?php if (session('errors.name')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.name') ?>
                  </div>
            <?php endif; ?>
      </div>
      <div class="mb-3">
            <label class="form-label">Vendor Address</label>
            <input type="text" name="address" class="form-control <?= session('errors.address') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" required>
            <?php if (session('errors.address')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.address') ?>
                  </div>
            <?php endif; ?>
      </div>
      <div class="mb-3">
            <label class="form-label">Buyer Name</label>
            <input type="text" name="buyer" class="form-control <?= session('errors.buyer') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" required>
            <?php if (session('errors.buyer')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.buyer') ?>
                  </div>
            <?php endif; ?>
      </div>
      <div class="mb-3">
            <label class="form-label">Item Name</label>
            <input type="text" name="item" class="form-control <?= session('errors.item') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" required>
            <?php if (session('errors.item')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.item') ?>
                  </div>
            <?php endif; ?>
      </div>
      
      <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control <?= session('errors.date') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" required>
            <?php if (session('errors.date')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.date') ?>
                  </div>
            <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-success">Save</button>
      <a href="/categories" class="btn btn-secondary">Back</a>
</form>

<?= $this->endSection() ?>
