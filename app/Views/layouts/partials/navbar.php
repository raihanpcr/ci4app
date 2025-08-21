<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">📦 Warehouse</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="/products" class="nav-link text-white">Products</a></li>
        <li class="nav-item"><a href="/categories" class="nav-link text-white">Categories</a></li>
        <li class="nav-item"><a href="/incomings" class="nav-link text-white">Incoming</a></li>
        <li class="nav-item"><a href="/outgoings" class="nav-link text-white">Outgoing</a></li>
        <li class="nav-item"><a href="/purchases" class="nav-link text-white">Purchase</a></li>
        <!-- <li class="nav-item"><a href="/report" class="nav-link text-white">Report</a></li> -->
        <li class="nav-item"><a href="<?= site_url('logout') ?>"  class="nav-link text-white">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
