<x-guest-layout>

		<div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
				<div class="col-12 d-flex align-items-center justify-content-center">
						<div class="border-light p-lg-5 w-100 fmxw-500 rounded border-0 bg-white p-4 shadow">
								<div class="text-md-center mt-md-0 mb-4 text-center">
										<h1 class="h3 mb-0">
												Login
										</h1>
										<p>selamat datang, silahkan login untuk melanjutkan</p>
								</div>
								<form action="{{ route('login') }}" method="POST" class="mt-4">
										@csrf
										<!-- Form -->
										<div class="form-group mb-4">
												<label for="email" class="form-label">Email</label>
												<div class="input-group">
														<span class="input-group-text input-group-sm" id="basic-addon1">
																<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
																		xmlns="http://www.w3.org/2000/svg">
																		<path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
																		<path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
																</svg>
														</span>
														<input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
																name="email" value="{{ old('email') }}" placeholder="masukan email ..." required autofocus>
														@error('email')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>
										</div>
										<!-- End of Form -->
										<div class="form-group">
												<!-- Form -->
												<div class="form-group mb-4">
														<label for="password" class="form-label">Password</label>
														<div class="input-group">
																<span class="input-group-text input-group-sm" id="basic-addon2">
																		<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
																				xmlns="http://www.w3.org/2000/svg">
																				<path fill-rule="evenodd"
																						d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
																						clip-rule="evenodd"></path>
																		</svg>
																</span>
																<input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
																		name="password" placeholder="masukan password" required autocomplete="current-password">
																@error('password')
																		<div class="invalid-feedback">{{ $message }}</div>
																@enderror
														</div>
												</div>
												<!-- End of Form -->
												<div class="d-flex justify-content-between align-items-top mb-4">
														<div class="form-check">
																<input class="form-check-input" type="checkbox" name="remember" value="" id="remember" />
																<label class="form-check-label mb-0" for="remember">
																		Remember me
																</label>
														</div>
														{{-- <div>
																<a href="./forgot-password.html" class="small text-right">Lost password?</a>
														</div> --}}
												</div>
										</div>
										<div class="d-grid">
												<button type="submit" class="btn btn-gray-800">
														Login
												</button>
										</div>
								</form>

								<div class="d-flex justify-content-center align-items-center mt-4">
										<span class="fw-normal">
												Belum punya akun ?
												<a href="{{ route('register') }}" class="fw-bold">Daftar</a>
										</span>
								</div>
						</div>
				</div>
		</div>




</x-guest-layout>
