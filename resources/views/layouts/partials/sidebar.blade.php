<nav class="navbar navbar-dark navbar-theme-primary col-12 d-lg-none px-4">
		<a class="navbar-brand me-lg-5" href="/">
				SISTEM AKADEMIK
		</a>
		<div class="d-flex align-items-center">
				<button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
						data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				</button>
		</div>
</nav>


@php
		$role = 'invalid';
		if (Auth::check()) {
		    $userRole = Auth::user()->role;
		    switch ($userRole) {
		        case 0:
		            $role = 'admin';
		            break;
		        case 1:
		            $role = 'guru';
		            break;
		        case 2:
		            $role = 'parent';
		            break;
		        case 3:
		            $role = 'siswa';
		            break;
		        default:
		            $role = 'invalid';
		            break;
		    }
		}
@endphp

<nav id="sidebarMenu" class="sidebar d-lg-block collapse bg-gray-800 text-white" data-simplebar>
		<div class="sidebar-inner px-4 pt-3">
				<div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
						<div class="d-flex align-items-center">
								<div class="avatar-lg me-4">
										<img src="{{ asset('assets') }}/img/team/profile-picture-3.jpg"
												class="card-img-top rounded-circle border-white" alt="Bonnie Green">
								</div>
								<div class="d-block">
										<h2 class="h5 mb-3">Hallo, nama</h2>
										<a href="../../pages/examples/sign-in.html" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
												<svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
														xmlns="http://www.w3.org/2000/svg">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
												</svg>
												Logout
										</a>
								</div>
						</div>
						<div class="collapse-close d-md-none">
								<a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
										aria-expanded="true" aria-label="Toggle navigation">
										<svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd"
														d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
														clip-rule="evenodd"></path>
										</svg>
								</a>
						</div>
				</div>
				<ul class="nav flex-column pt-md-0 pt-3">
						<li class="nav-item">
								<a href="../../index.html" class="nav-link d-flex align-items-center">
										<span class="sidebar-icon">
												<img src="{{ asset('assets') }}/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
										</span>
										<span class="sidebar-text ms-1 mt-1">SISTEM AKADEMIK</span>
								</a>
						</li>

						@if ($role == 'admin')
								{{-- dashboard --}}
								<li class="nav-item {{ \Route::is('admin.dashboard.*') ? 'active' : '' }}">
										<a href="{{ route('admin.dashboard.index') }}" class="nav-link">
												<span class="sidebar-icon">
														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
																<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
																<path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
														</svg>
												</span>
												<span class="sidebar-text">Dashboard</span>
										</a>
								</li>
								{{-- guru --}}
								<li class="nav-item {{ \Route::is('admin.guru.*') ? 'active' : '' }}">
										<a href="{{ route('admin.guru.index') }}" class="nav-link">
												<span class="sidebar-icon">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																style="fill: rgba(247, 243, 243, 1);transform: ;msFilter:;">
																<path
																		d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
																</path>
														</svg>
												</span>
												<span class="sidebar-text">Data Akun Guru</span>
										</a>
								</li>
						@endif

						{{-- hanya jika role guru --}}
						@if ($role == 'guru')
								{{-- dashboard --}}
								<li class="nav-item {{ \Route::is('guru.dashboard.*') ? 'active' : '' }}">
										<a href="{{ route('guru.dashboard.index') }}" class="nav-link">
												<span class="sidebar-icon">
														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
																<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
																<path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
														</svg>
												</span>
												<span class="sidebar-text">Dashboard</span>
										</a>
								</li>


								<li role="separator" class="dropdown-divider mb-2 mt-4 border-gray-700"></li>
								<li>
										<p class="mb-0 text-center">MASTER DATA</p>
								</li>
								<li role="separator" class="dropdown-divider mb-3 mt-1 border-gray-700"></li>



								{{-- siswa --}}
								<li class="nav-item {{ \Route::is('guru.siswa.*') ? 'active' : '' }}">
										<a href="{{ route('guru.siswa.index') }}" class="nav-link">
												<span class="sidebar-icon">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																style="fill: rgba(247, 243, 243, 1);transform: ;msFilter:;">
																<path
																		d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
																</path>
														</svg>
												</span>
												<span class="sidebar-text">Data Siswa</span>
										</a>
								</li>
								{{-- parent --}}
								<li class="nav-item {{ \Route::is('guru.parent.*') ? 'active' : '' }}">
										<a href="{{ route('guru.parent.index') }}" class="nav-link">
												<span class="sidebar-icon">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																style="fill: rgba(247, 243, 243, 1);transform: ;msFilter:;">
																<path
																		d="M8 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zm0-6c1.178 0 2 .822 2 2s-.822 2-2 2-2-.822-2-2 .822-2 2-2zm1 7H7c-2.757 0-5 2.243-5 5v1h2v-1c0-1.654 1.346-3 3-3h2c1.654 0 3 1.346 3 3v1h2v-1c0-2.757-2.243-5-5-5zm9.364-10.364L16.95 4.05C18.271 5.373 19 7.131 19 9s-.729 3.627-2.05 4.95l1.414 1.414C20.064 13.663 21 11.403 21 9s-.936-4.663-2.636-6.364z">
																</path>
																<path
																		d="M15.535 5.464 14.121 6.88C14.688 7.445 15 8.198 15 9s-.312 1.555-.879 2.12l1.414 1.416C16.479 11.592 17 10.337 17 9s-.521-2.592-1.465-3.536z">
																</path>
														</svg>
												</span>
												<span class="sidebar-text">Data Orang Tua</span>
										</a>
								</li>

								{{-- master kelas --}}
								<li class="nav-item {{ \Route::is('guru.kelas.*') ? 'active' : '' }}">
										<span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
												data-bs-target="#submenu-app">
												<span>
														<span class="sidebar-icon">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																		style="fill: rgba(247, 243, 243, 1);transform: ;msFilter:;">
																		<path
																				d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z">
																		</path>
																		<path d="M8 6h9v2H8z"></path>
																</svg>
														</span>
														<span class="sidebar-text">Master Kelas</span>
												</span>
												<span class="link-arrow">
														<svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
																<path fill-rule="evenodd"
																		d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
																		clip-rule="evenodd"></path>
														</svg>
												</span>
										</span>
										<div class="multi-level {{ \Route::is('guru.kelas.data-kelas.*') ? 'show' : '' }} collapse" role="list"
												id="submenu-app" aria-expanded="false">
												<ul class="flex-column nav">
														<li class="nav-item {{ \Route::is('guru.kelas.data-kelas.*') ? 'active' : '' }}">
																<a class="nav-link" href="{{ route('guru.kelas.data-kelas.index') }}">
																		<span class="sidebar-text">Data Kelas</span>
																</a>
														</li>
												</ul>
										</div>
								</li>
						@endif

						@if ($role == 'siswa')
								<li class="nav-item {{ \Route::is('siswa.dashboard.*') ? 'active' : '' }}">
										<a href="{{ route('siswa.dashboard.index') }}" class="nav-link">
												<span class="sidebar-icon">
														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
																xmlns="http://www.w3.org/2000/svg">
																<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
																<path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
														</svg>
												</span>
												<span class="sidebar-text">Dashboard</span>
										</a>
								</li>
								<li class="nav-item {{ \Route::is('siswa.kelas.*') ? 'active' : '' }}">
										<a href="{{ route('siswa.kelas.index') }}" class="nav-link">
												<span class="sidebar-icon">

														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
																xmlns="http://www.w3.org/2000/svg">
																<path
																		d="M6.012 18H21V4a2 2 0 0 0-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1zM8 6h9v2H8V6z">
																</path>
														</svg>
												</span>
												<span class="sidebar-text">Data Kelas</span>
										</a>
								</li>
								<li class="nav-item {{ \Route::is('siswa.kelas-saya.*') ? 'active' : '' }}">
										<a href="{{ route('siswa.kelas-saya.index') }}" class="nav-link">
												<span class="sidebar-icon">

														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
																xmlns="http://www.w3.org/2000/svg">
																<path d="M16.999 23V7c0-1.103-.897-2-2-2h-8c-1.103 0-2 .897-2 2v16l6-3.601 6 3.601z"></path>
																<path
																		d="M15.585 3h1.414c1.103 0 2 .897 2 2v10.443l2 2.489V3c0-1.103-.897-2-2-2h-8c-1.103 0-2 .897-2 2h6.586z">
																</path>
														</svg>
												</span>
												<span class="sidebar-text">Kelas Saya</span>
										</a>
								</li>
						@endif

						@if ($role == 'parent')
								<li class="nav-item {{ \Route::is('parent.absensi.*') ? 'active' : '' }}">
										<a href="{{ route('parent.absensi.index') }}" class="nav-link">
												<span class="sidebar-icon">
														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
																xmlns="http://www.w3.org/2000/svg">
																<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
																<path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
														</svg>
												</span>
												<span class="sidebar-text">Absensi</span>
										</a>
								</li>
						@endif


						{{-- collapse menu template --}}
						{{-- <li class="nav-item">
								<span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
										data-bs-target="#submenu-app">
										<span>
												<span class="sidebar-icon">
														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
																xmlns="http://www.w3.org/2000/svg">
																<path fill-rule="evenodd"
																		d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
																		clip-rule="evenodd"></path>
														</svg>
												</span>
												<span class="sidebar-text">Tables</span>
										</span>
										<span class="link-arrow">
												<svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd"
																d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
																clip-rule="evenodd"></path>
												</svg>
										</span>
								</span>
								<div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
										<ul class="flex-column nav">
												<li class="nav-item">
														<a class="nav-link" href="../../pages/tables/bootstrap-tables.html">
																<span class="sidebar-text">Bootstrap Tables</span>
														</a>
												</li>
										</ul>
								</div>
						</li> --}}

						{{-- separator --}}
						<li role="separator" class="dropdown-divider mb-3 mt-4 border-gray-700"></li>


						{{-- <li class="nav-item">
								<a href="https://themesberg.com" target="_blank" class="nav-link d-flex align-items-center">
										<span class="sidebar-icon">
												<img src="{{ asset('assets') }}/img/themesberg.svg" height="20" width="28"
														alt="Themesberg Logo">
										</span>
										<span class="sidebar-text">Themesberg</span>
								</a>
						</li> --}}
						<li class="nav-item">
								<form action="{{ route('logout') }}" method="POST">
										@csrf

										<button type="submit"
												class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
												<span class="sidebar-icon d-inline-flex align-items-center justify-content-center">

														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
																xmlns="http://www.w3.org/2000/svg">
																<path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path>
																<path
																		d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z">
																</path>
														</svg>
												</span>
												<span>Logout</span>
										</button>
								</form>
						</li>

				</ul>
		</div>
</nav>
