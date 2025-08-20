<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit Category<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Category</h2>

<form action="/categories/update/<?= $category['id'] ?>" method="post" class="mt-3">
      <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= esc($category['name']) ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
      <a href="/categories" class="btn btn-secondary">Back</a>
</form>

<?= $this->endSection() ?>
