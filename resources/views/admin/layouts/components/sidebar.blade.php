<nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
          <g>
            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
          </g>
        </svg>
      </a>
    </div>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Data</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100 {{ $active == 'Dashboard' ? 'active' : null }}">
        <a class="nav-link " href="/admin/dashboard">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100 {{ $active == 'user' ? 'active' : null }}">
        <a class="nav-link " href="/admin/user">
          <i class="fe fe-users"></i>
          <span class="ml-3 item-text">User</span>
        </a>
      </li>
    </ul>
    
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Components</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-box fe-16"></i>
          <span class="ml-3 item-text">Komponent </span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
          <li class="nav-item {{ $active == 'kategori' ? 'active' : null }}">
            <a class="nav-link pl-3 " href="/admin/kategori">

              <span class="ml-1 item-text">Kategori</span>
            </a>
          </li>
          
        </ul>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
          <li class="nav-item {{ $active == 'tag' ? 'active' : null }}">
            <a class="nav-link pl-3 " href="/admin/tag">

              <span class="ml-1 item-text">Tag</span>
            </a>
          </li>
          
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item {{ $active == 'produk' ? 'active' : null }} w-100">
        <a class="nav-link " href="/admin/produk">
          <i class="fe fe-clipboard"></i>
          <span class="ml-3 item-text">Produk</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100 {{ $active == 'riwayat' ? 'active' : null }}">
        <a class="nav-link " href="/admin/riwayatProduk">
          <i class="fe fe-rotate-ccw "></i>
          <span class="ml-3 item-text">Riwayat Produk</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100 {{ $active == 'metode' ? 'active' : null }}">
        <a class="nav-link " href="/admin/metode">
          <i class="fe fe-database "></i>
          <span class="ml-3 item-text">Metode Pembayaran</span>
        </a>
      </li>
    </ul>

    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Data User</span>
    </p>
      
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100 {{ $active == 'topup' ? 'active' : null }}">
        <a class="nav-link " href="/admin/topup">
          <i class="fe fe-credit-card "></i>
          <span class="ml-3 item-text">Topup</span>
        </a>
      </li>
    </ul>
    
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100 {{ $active == 'keranjang' ? 'active' : null }}">
        <a class="nav-link " href="/admin/keranjang">
          <i class="fe fe-shopping-cart "></i>
          <span class="ml-3 item-text">Keranjang</span>
        </a>
      </li>
    </ul>
  </nav>