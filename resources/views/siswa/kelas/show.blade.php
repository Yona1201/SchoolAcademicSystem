@extends('layouts.main')
@section('content')
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize">kelas {{ $kelas->nama }}</h2>
		</div>

		<div class="row mt-4">
				<div class="col-12 mb-4">
						<div class="row d-flex justify-content-center">
								<div class="card col-lg-6 col-sm-12">
										<img src="{{ asset('images') }}/kelas/default.png" style="max-height: 300px; object-fit: cover"
												class="card-img-top" alt="thumbnail class">
										<div class="card-body">
												<h5 class="card-title">{{ $kelas->nama }}</h5>
												<p class="card-text">apakah anda ingin mendaftarkan diri pada kelas ini ? </p>
												<div class="d-flex justify-content-center">
														<form action="{{ route('siswa.kelas.store') }}" method="POST">
																@csrf
																<input type="hidden" name="idk" value="{{ $kelas->id }}">
																<button type="submit" class="btn btn-primary">Ya, Daftarkan saya</button>
														</form>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
