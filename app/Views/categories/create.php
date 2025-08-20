<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Add Category<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Add Category</h2>

<form action="/categories/store" method="post" class="mt-3">
      <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Save</button>
      <a href="/categories" class="btn btn-secondary">Back</a>
</form>

<?= $this->endSection() ?>
