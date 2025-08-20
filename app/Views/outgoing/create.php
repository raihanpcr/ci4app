<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Add Outgoing<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Add Outgoing</h2>

<?php if (session()->getFlashdata('error')): ?>
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '<?= session()->getFlashdata('error') ?>'
      });
  </script>
<?php endif; ?>

<form action="/outgoings" method="post" class="mt-3">
      <?= csrf_field() ?>

      <div class="mb-3">
            <label class="form-label">Product</label>
            <select name="product" id="" class="form-select <?= session('errors.product') ? 'is-invalid' : '' ?>"
                  value="<?= old('code') ?>">
                  <option value="">Choose Product</option>
                  <?php foreach ($products as $p) : ?>
                        <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                  <?php endforeach ?>
            </select>
            <?php if (session('errors.product')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.product') ?>
                  </div>
            <?php endif; ?>
      </div>

      <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" required>
            <?php if (session('errors.name')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.name') ?>
                  </div>
            <?php endif; ?>
      </div>


      <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control <?= session('errors.quantity') ? 'is-invalid' : '' ?>" 
                  value="<?= old('quantity') ?>"required>
            <?php if (session('errors.quantity')): ?>
                  <div class="invalid-feedback">
                        <?= session('errors.quantity') ?>
                  </div>
            <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-success">Save</button>
      <a href="/categories" class="btn btn-secondary">Back</a>
</form>

<?= $this->endSection() ?>
