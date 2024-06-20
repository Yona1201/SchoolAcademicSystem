<x-guest-layout>

		{{-- <p class="text-center">
				<a href="../dashboard/dashboard.html" class="d-flex align-items-center justify-content-center">
						<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd"
										d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
										clip-rule="evenodd"></path>
						</svg>
						Back to homepage
				</a>
		</p> --}}
		<div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
				<div class="col-12 d-flex align-items-center justify-content-center">
						<div class="border-light p-lg-5 w-100 fmxw-500 rounded border-0 bg-white p-4 shadow">
								<div class="text-md-center mt-md-0 mb-4 text-center">
										<h1 class="h3 mb-0">Registrasi Akun {{ Auth::check() }}</h1>
								</div>

								<form action="{{ route('register') }}" method="POST" class="mt-4">
										@csrf

										<div class="form-group mb-4">
												<label for="nama" class="form-label">Nama Lengkap</label>
												<div class="input-group">
														<span class="input-group-text" id="basic-addon1">
																<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
																		xmlns="http://www.w3.org/2000/svg">
																		<path
																				d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
																		</path>
																</svg>
														</span>
														<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
																name="nama" value="{{ old('nama') }}" placeholder="nama lengkap ..." required autofocus>
														@error('nama')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>
										</div>
										<div class="form-group mb-4">
												<label for="phone" class="form-label">Nomor Telepon</label>
												<div class="input-group">
														<span class="input-group-text" id="basic-addon1">

																<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
																		xmlns="http://www.w3.org/2000/svg">
																		<path
																				d="m20.487 17.14-4.065-3.696a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a.997.997 0 0 0-.085-1.39z">
																		</path>
																</svg>
														</span>
														<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
																name="phone" value="{{ old('phone') }}" placeholder="nomor handphone ..." required autofocus>
														@error('phone')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>
										</div>

										<div class="form-group mb-4">
												<label for="jk" class="form-label">Jenis Kelamin</label>
												<div class="input-group">
														<span class="input-group-text input-group-sm" id="basic-addon1">


																<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
																		xmlns="http://www.w3.org/2000/svg">
																		<circle cx="6" cy="4" r="2"></circle>
																		<path d="M9 7H3a1 1 0 0 0-1 1v7h2v7h4v-7h2V8a1 1 0 0 0-1-1z"></path>
																		<circle cx="17" cy="4" r="2"></circle>
																		<path d="M20.21 7.73a1 1 0 0 0-1-.73h-4.5a1 1 0 0 0-1 .73L12 14h2l-1 4h2v4h4v-4h2l-1-4h2z"></path>
																</svg>
														</span>
														<select class="@error('jk') is-invalid @enderror form-select" name="jk" id="jk"
																aria-label="Default select example">
																<option selected="">-- jenis kelamin -- </option>
																<option value="l" @if (old('jk') == 'l') selected @endif>Laki-laki</option>
																<option value="p" @if (old('jk') == 'p') selected @endif>Perempuan</option>
														</select>
														@error('jk')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>
										</div>

										{{-- role --}}
										<div class="form-group mb-4">
												<label for="role" class="form-label">Daftar sebagai :</label>
												<div class="input-group">
														<span class="input-group-text input-group-sm" id="basic-addon1">
																<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
																		xmlns="http://www.w3.org/2000/svg">
																		<path
																				d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 3.33A1.67 1.67 0 1 1 10.33 7 1.67 1.67 0 0 1 12 5.33zm3.33 12.5-1.66.84-1.39-3.89h-.56l-1.39 3.89-1.66-.84 1.66-4.72v-1.66L7 10.33l.56-1.66 3.33 1.11h2.22l3.33-1.11.56 1.66-3.33 1.12v1.66z">
																		</path>
																</svg>
														</span>
														<select class="@error('role') is-invalid @enderror form-select" name="role" id="role"
																aria-label="Default select example">
																<option selected="">-- peran -- </option>
																<option value="2" @if (old('role') == 2) selected @endif>Orang Tua</option>
																<option value="3" @if (old('role') == 3 || old('role') == '') selected @endif>Siswa</option>
														</select>
														@error('jk')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>
										</div>

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
																name="email" value="{{ old('email') }}" placeholder="email anda ..." required>
														@error('email')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>
										</div>

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
																name="password" placeholder="***********" required autocomplete="new-password">
														@error('password')
																<div class="invalid-feedback">{{ $message }}</div>
														@enderror
												</div>
										</div>

										<div class="form-group mb-4">
												<label for="password_confirmation" class="form-label">Ulangi Password</label>
												<div class="input-group">
														<span class="input-group-text input-group-sm" id="basic-addon2">
																<svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
																		xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd"
																				d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
																				clip-rule="evenodd"></path>
																</svg>
														</span>
														<input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
																placeholder="***********" required>
												</div>
										</div>



										<div class="d-grid">
												<button type="submit" class="btn btn-gray-800">Daftar</button>
										</div>
								</form>


								<div class="d-flex justify-content-center align-items-center mt-4">
										<span class="fw-normal">
												Sudah punya akun ?
												<a href="{{ route('login') }}" class="fw-bold">Login</a>
										</span>
								</div>
						</div>
				</div>
		</div>



</x-guest-layout>
