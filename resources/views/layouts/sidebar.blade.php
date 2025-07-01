<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="{{ asset('template/img/vartica-white.png') }} "
                alt="navbar brand"
                class="navbar-brand"
                height="15"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../demo1/index.html">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Componentes</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#obras">
                  <i class="fas fa-palette"></i>
                  <p>Gestión de obras</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="obras">
                  <ul class="nav nav-collapse">
                   
                    @if(auth()->user()->id_rol == 1)
                    <li>
                    <a href="{{ route('obras.store') }}">
                        <span class="sub-item">Listado de obras</span>
                    </a>
                    </li>
                    @endif
                    
                    @if(auth()->user()->id_rol == 3)
                    
                    <li>
                      <a href="{{ route('obras.misObras')}}">
                        <span class="sub-item">Mis obras</span>
                      </a>
                    </li>
                    @endif
                  </ul>
                </div>
              </li>
              @if(auth()->user()->id_rol == 1)
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#areas">
                  <i class="fas fa-theater-masks"></i>
                  <p>Gestión de Áreas</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="areas">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{ route('areas.index')}}">
                        <span class="sub-item">Listado de Áreas</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('ramas.index')}}">
                        <span class="sub-item">Ramas</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              
              
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#usuarios">
                  <i class="fas fa-user"></i>
                  <p>Gestión de usuarios</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="usuarios">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{ route('usuarios.index')}}">
                        <span class="sub-item">Listado de usuarios</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              @endif  
              <!-- 
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#maps">
                  <i class="fas fa-map-marker-alt"></i>
                  <p>Maps</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="maps">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="maps/googlemaps.html">
                        <span class="sub-item">Google Maps</span>
                      </a>
                    </li>
                    <li>
                      <a href="maps/jsvectormap.html">
                        <span class="sub-item">Jsvectormap</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#charts">
                  <i class="far fa-chart-bar"></i>
                  <p>Charts</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="charts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="charts/charts.html">
                        <span class="sub-item">Chart Js</span>
                      </a>
                    </li>
                    <li>
                      <a href="charts/sparkline.html">
                        <span class="sub-item">Sparkline</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="widgets.html">
                  <i class="fas fa-desktop"></i>
                  <p>Widgets</p>
                  <span class="badge badge-success">4</span>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#submenu">
                  <i class="fas fa-bars"></i>
                  <p>Menu Levels</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="submenu">
                  <ul class="nav nav-collapse">
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav1">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav1">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a data-bs-toggle="collapse" href="#subnav2">
                        <span class="sub-item">Level 1</span>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="subnav2">
                        <ul class="nav nav-collapse subnav">
                          <li>
                            <a href="#">
                              <span class="sub-item">Level 2</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a href="#">
                        <span class="sub-item">Level 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> -->
            </ul>
          </div>
        </div>
      </div>