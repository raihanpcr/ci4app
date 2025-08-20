<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Products<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Product List</h2>
  <a href="/products/new" class="btn btn-primary">+ Add Product</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Category</th>
      <th>Code</th>
      <th>Stock</th>
      <th>Unit</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1 + (10 * ($pager->getCurrentPage() - 1));
    foreach ($products as $p) : ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $p['name'] ?></td>
        <td><?= $p['category_name'] ?></td>
        <td><?= $p['code'] ?></td>
        <td><?= $p['stock'] ?></td>
        <td><?= $p['unit'] ?></td>
        <td>
          <a href="/products/edit/<?= $p['id'] ?>" class="btn btn-sm btn-primary">Edit</a>

          <!-- Delete -->
          <form action="/products/<?= $p['id'] ?>" method="post" class="d-inline delete-form">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $pager->links('default', 'bootstrap_full') ?>

<script>
  document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Yakin?',
        text: "Data kategori akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })
    });
  });
</script>



<?= $this->endSection() ?>
