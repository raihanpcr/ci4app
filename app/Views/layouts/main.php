<?= $this->include('layouts/partials/header') ?>
<?= $this->include('layouts/partials/navbar') ?>

<main class="flex-grow-1 container my-4">
      <?= $this->renderSection('content') ?>
</main>

<?= $this->include('layouts/partials/footer') ?>
