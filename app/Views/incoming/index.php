<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Products<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Success',
          text: '<?= session()->getFlashdata('success') ?>',
          showConfirmButton: false,
          timer: 2000
      });
  </script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '<?= session()->getFlashdata('error') ?>'
      });
  </script>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Incomings Data</h2>
  <a href="/incomings/new" class="btn btn-primary">+ Add Incoming</a>
</div>


<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>No</th>
      <th>ProductName</th>
      <th>Date</th>
      <th>Stock</th>
      
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1 + (10 * ($pager->getCurrentPage() - 1));
    foreach ($incomings as $inc) : ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $inc['product_name'] ?></td>
        <td><?= $inc['date'] ?></td>
        <td><?= $inc['quantity'] ?></td>
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
        title: 'Are you sure?',
        text: "Product data will be permanently deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      })
    });
  });
</script>



<?= $this->endSection() ?>
