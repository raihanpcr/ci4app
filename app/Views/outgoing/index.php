<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Outgoing<?= $this->endSection() ?>

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
      <h2>Outgoing Data</h2>
      <a href="/outgoings/new" class="btn btn-primary"> + Add Outgoing</a>
</div>

<form method="get" action="<?= base_url('outgoings') ?>" class="row g-3 mb-3">
      <div class="col-md-4">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="<?= esc(service('request')->getGet('start_date')) ?>">
      </div>
      <div class="col-md-4">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="<?= esc(service('request')->getGet('end_date')) ?>">
      </div>
      <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary me-2">Filter</button>
            <a href="<?= base_url('outgoings') ?>" class="btn btn-secondary">Reset</a>
      </div>
</form>

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

      <!-- show data -->
      <?php 
            $no = 1 + (10 * ($pager->getCurrentPage() - 1));
            foreach ($outgoings as $inc) : ?>
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