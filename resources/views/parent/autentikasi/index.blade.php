@extends('layouts.main')
@section('content')
		{{-- <div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize">Hubungkan dengan akun anak anda.</h2>
		</div> --}}

		<div class="row d-flex justify-content-center mt-4">
				<div class="col-lg-6 col-md-8 col-sm-12 mb-4">
						<div class="card">
								<div class="card-header">
										<div class="card-title text-center">
												<h4 class="text-capitalize">hubungkan terlebih dahulu dengan akun anak anda</h4>
										</div>
								</div>
								<div class="card-body">
										<form action="{{ route('parent.autentikasi') }}" method="POST">
												@csrf
												<x-input-select nama="siswa" pilihan="cari siswa" label="cari data anak">
														@forelse ($siswas as $siswa)
																<option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
														@empty
																<option value="">-- tidak ada data siswa --</option>
														@endforelse
												</x-input-select>

												<x-input-text nama="email" placeholder="masukan email akun anak ...">Email</x-input-text>
												<x-input-text nama="password" type="password"
														placeholder="masukan password akun anak ...">Password</x-input-text>

												<button type="submit" class="btn d-block btn-outline-primary w-50 mx-auto">Hubungkan</button>
										</form>
								</div>
						</div>
				</div>
		</div>
@endsection
