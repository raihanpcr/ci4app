<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container py-5">
  <div class="text-center mb-4">
    <h1 class="fw-bold text-primary">👋 Welcome to <span class="text-success">Warehouse Monitoring</span></h1>
    <p class="lead text-muted">
      This system helps you monitor stock, incoming and outgoing transactions, and purchase reports more easily and quickly.
    </p>
  </div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center">
        <div class="card-body">
          <h5 class="card-title text-primary">📦 Product Stock</h5>
          <p class="card-text">Look at the latest stock data, make sure there are no empty items.</p>
          <a href="<?= base_url('products') ?>" class="btn btn-outline-primary btn-sm">Show Products</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center">
        <div class="card-body">
          <h5 class="card-title text-success">⬇️ Incoming Items</h5>
          <p class="card-text">Record and monitor every incoming item.</p>
          <a href="<?= base_url('incomings') ?>" class="btn btn-outline-success btn-sm">Show Transaction</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0 h-100 text-center">
        <div class="card-body">
          <h5 class="card-title text-danger">⬆️ Outcoming Items</h5>
          <p class="card-text">Record and monitor every outcoming item.</p>
          <a href="<?= base_url('outgoings') ?>" class="btn btn-outline-danger btn-sm">Show Transaction</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
