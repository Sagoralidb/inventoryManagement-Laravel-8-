 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <p class="nav-link m-0"><i class="fas fa-user"></i> {{ Auth::user()->name ?? ''}}</p>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
