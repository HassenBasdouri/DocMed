 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-3">
    <!-- Brand Logo -->
 <a href="/" class="brand-link">
      <img src="{{ url('images/img/docmed-logo.png') }}" alt="HelloDoc" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HelloDoc</span>
    </a>
@auth
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/storage/images/profils/' . Auth::user()->imagepath) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="{{ route('profile') }}" class="d-block {{ (request()->is('profile*')) ? 'active' : '' }}">{{Auth::user()->name}} {{Auth::user()->lastname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link {{ (request()->is('dashboard*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('Dashboard')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('rendezvous.index') }}" class="nav-link {{ (request()->is('rendezvous')) ? 'active' : '' }}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                {{ __('My appointments') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('rendezvous/create*')) ? 'active' : '' }}" href="{{ route('rendezvous.create') }}">
              <i class=" nav-icon fas fa-calendar-check"></i>
            <p>
              {{ __('New appointment') }}
            </p>
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('patients')) ? 'active' : '' }}" href="{{ route('patients.index') }}">
              <i class=" nav-icon fas fa-address-book"></i>
            <p>
              {{ __('login.patientlist') }}
            </p>
          </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                {{_('Patient files')}}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    @endauth
    @guest
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link {{ (request()->is('login*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-sign-in-alt "></i>
            <p>
              {{__('login.login')}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link {{ (request()->is('register*')) ? 'active' : '' }}">
            <i class="nav-icon far fa-edit"></i>
            <p>
              {{__('login.register')}}
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
    @endguest
  </aside>
