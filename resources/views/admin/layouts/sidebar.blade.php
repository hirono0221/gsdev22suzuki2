<div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="{{url('/dashboard')}}">
                            <div class="logo-img">
                              
                            </div>
                            <span class="text">Coaching</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Navigation</div>
                                <div class="nav-item active">
                                    <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>

                                @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Coach</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('coach.create')}}" class="menu-item">Create</a>
                                        <a href="{{route('coach.index')}}" class="menu-item">View</a>
                                       
                                    </div>
                                </div>
                                @endif
                                
                                @if(auth()->check()&& auth()->user()->role->name === 'coach')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Appointment Time</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('appointment.create')}}" class="menu-item">Create</a>
                                        <a href="{{route('appointment.index')}}" class="menu-item">Check</a>
                                       
                                    </div>
                                </div>
                                @endif
                                
                                @if(auth()->check()&& auth()->user()->role->name === 'coach')
                                   <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Clients</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('clients.today')}}" class="menu-item">Clients(today)</a>
                                        <a href="{{route('prescribed.clients')}}" class="menu-item">All clients(prescription)</a>
                                       
                                    </div>
                                </div>
                                @endif   
                                
                                @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Client Appointment</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('client')}}" class="menu-item">Today Appointment</a>
                                        <a href="{{route('all.appointments')}}" class="menu-item">All Time Appointment</a>
                                       
                                    </div>
                                </div>
                                
                                @endif


                                <div class="nav-item active">
                                    <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                           
                                
                            </nav>
                        </div>
                    </div>
                </div>