<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container py-5">
  <!-- Greeting -->
  <div class="text-center mb-5">
    <h1 class="fw-bold text-primary">👋 Welcome to <span class="text-success">Warehouse Monitoring</span></h1>
    <p class="lead text-muted">
      Easily manage and track stock items, incoming & outgoing transactions, and reports in one place.
    </p>
  </div>

  <!-- Summary Cards -->
  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center bg-light">
        <div class="card-body">
          <h6 class="text-muted">Total Products</h6>
          <h2 class="fw-bold text-primary"><?= esc($totalProducts ?? 0) ?></h2>
          <p class="mb-0">Registered items</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center bg-light">
        <div class="card-body">
          <h6 class="text-muted">Available Stock</h6>
          <h2 class="fw-bold text-success"><?= esc($totalStock ?? 0) ?></h2>
          <p class="mb-0">Units in warehouse</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center bg-light">
        <div class="card-body">
          <h6 class="text-muted">Today's Transactions</h6>
          <h2 class="fw-bold text-info"><?= esc($todayTransactions ?? 0) ?></h2>
          <p class="mb-0">Incoming & outgoing</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Shortcut Cards -->
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center">
        <div class="card-body">
          <h5 class="card-title text-primary">📦 Product Stock</h5>
          <p class="card-text">View up-to-date stock data and ensure no items are running out.</p>
          <a href="<?= base_url('products') ?>" class="btn btn-outline-primary btn-sm">View Products</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center">
        <div class="card-body">
          <h5 class="card-title text-success">⬇️ Incoming Items</h5>
          <p class="card-text">Record and monitor every incoming item from vendors.</p>
          <a href="<?= base_url('incoming') ?>" class="btn btn-outline-success btn-sm">View Transactions</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center">
        <div class="card-body">
          <h5 class="card-title text-danger">⬆️ Outgoing Items</h5>
          <p class="card-text">Easily manage outgoing items from the warehouse.</p>
          <a href="<?= base_url('outgoing') ?>" class="btn btn-outline-danger btn-sm">View Transactions</a>
        </div>
      </div>
    </div>
  </div>
</div>



<?= $this->endSection() ?>
