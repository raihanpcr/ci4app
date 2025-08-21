<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Category<?= $this->endSection() ?>

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
      <h2>Category List</h2>
      <a href="/purchases/new" class="btn btn-primary">+ Add Purchase</a>
</div>

<table class="table table-bordered table-striped">
      <thead class="table-dark">
            <tr>
                  <th>No</th>
                  <th>Vendor Name</th>
                  <th>Alamat</th>
                  <th>Buyer Name</th>
                  <th>Item</th>
                  <th>Date</th>
                  <th>Action</th>
            </tr>
      </thead>
      <tbody>
            <?php 
            $no = 1 + (10 * ($pager->getCurrentPage() - 1));
            foreach ($purchases as $c) : ?>
                  <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $c['vendor_name'] ?></td>
                        <td><?= $c['alamat'] ?></td>
                        <td><?= $c['buyer_name'] ?></td>
                        <td><?= $c['item'] ?></td>
                        <td><?= $c['date'] ?></td>
                        <td>
                              <a href="/purchases/<?= $c['id'] ?>" class="btn btn-sm btn-primary">Edit</a>

                              <!-- Delete -->
                              <form action="/purchases/<?= $c['id'] ?>" method="post" class="d-inline delete-form">
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
                        title: 'Are you sure?',
                        text: "Purchases data will be permanently deleted!",
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
