  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
      {{-- Logo --}}
      <div class="d-flex align-items-center justify-content-between">
          <a href="#" class="logo d-flex align-items-center">
              <img src="../img/gundar.png" alt="gundar">
              <span class="d-none d-lg-block">{{ $page }}</span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      {{-- Profile --}}
      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">
              <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                      data-bs-toggle="dropdown">
                      {{-- <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
              </li>
              <ul>
                  <li class="p-3">
                      <span>{{ auth()->user()->name }}</span>
                      <h6>{{ auth()->user()->email }}</h6>
                  </li>
              </ul>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if (Request::is('dashboardadmin*'))
                      <a class="dropdown-item" href="/dashboardadmin/profile">Profile</a>
                  @endif
                  @if (Request::is('dashboardlecturer*'))
                      <a class="dropdown-item" href="/dashboardlecturer/profile">Profile</a>
                  @endif
                  @if (Request::is('dashboardstudent*'))
                      <a class="dropdown-item" href="/dashboardstudent/profile">Profile</a>
                  @endif
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item">Logout</button>
                  </form>
              </div>

          </ul>
      </nav>
  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
          {{-- Sidebar for admin --}}
          @if (auth()->user()->usertype->type == 'admin')
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardadmin') ? '' : 'collapsed' }} " href="/dashboardadmin">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardadmin/editdashboardlecturer') ? '' : 'collapsed' }} "
                      href="/dashboardadmin/editdashboardlecturer">
                      <i class="bi bi-person"></i>
                      <span>Ubah Dashboard Dosen</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardadmin/editdashboardstudent') ? '' : 'collapsed' }}"
                      href="/dashboardadmin/editdashboardstudent">
                      <i class="bi bi-person"></i>
                      <span>Ubah Dashboard Mahasiswa</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardadmin/uts', 'dashboardadmin/uas') ? '' : 'collapsed' }}"
                      data-bs-target="#charts-nav" data-bs-toggle="collapse">
                      <i class="bi bi-bar-chart"></i><span>Olah Data Absensi</span><i
                          class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="charts-nav"
                      class="nav-content {{ Request::is('dashboardadmin/uts', 'dashboardadmin/uas') ? '' : 'collapse' }}">
                      <li>
                          <a class="{{ Request::is('dashboardadmin/uts') ? 'active' : '' }}" href="/dashboardadmin/uts">
                              <i class="bi bi-circle"></i><span>UTS</span>
                          </a>
                      </li>
                      <li>
                          <a class="{{ Request::is('dashboardadmin/uas') ? 'active' : '' }}"
                              href="/dashboardadmin/uas">
                              <i class="bi bi-circle"></i><span>UAS</span>
                          </a>
                      </li>
                  </ul>
              </li>
          @endif

          {{-- Sidebar For Lecturer --}}
          @if (auth()->user()->usertype->type == 'lecturer')
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardlecturer') ? '' : 'collapsed' }} "
                      href="/dashboardlecturer">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardlecturer/attendance') ? '' : 'collapsed' }}"
                      href="/dashboardlecturer/attendance">
                      <i class="bi bi-layout-text-window-reverse"></i>
                      <span>Presensi</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardlecturer/utslist') ? '' : 'collapsed' }}"
                      href="/dashboardlecturer/utslist">
                      <i class="bi bi-journal-text"></i>
                      <span>List UTS</span>
                  </a>
              </li>
          @endif

          {{-- Sidebar For Student --}}
          @if (auth()->user()->usertype->type == 'student')
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardstudent') ? '' : 'collapsed' }} "
                      href="/dashboardstudent">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardstudent/attendance') ? '' : 'collapsed' }}"
                      href="/dashboardstudent/attendance">
                      <i class="bi bi-layout-text-window-reverse"></i>
                      <span>Presensi</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboardstudent/examcard') ? '' : 'collapsed' }}"
                      href="/dashboardstudent/examcard">
                      <i class="bi bi-journal-text"></i>
                      <span>Kartu Ujian</span>
                  </a>
              </li>
          @endif
      </ul>
  </aside>
