@extends('layouts.main')
@section('content')
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize">kelas saya</h2>
		</div>

		<div class="row mt-4">
				<div class="col-12 mb-4">
						<div class="row gap-4 p-5">
								@forelse ($kelass as $kelas)
										<div class="card col-3">
												<img src="{{ asset('images') }}/kelas/default.png" class="card-img-top"
														alt="{{ asset('images') }}/kelas/default.png">
												<div class="card-body">
														<h5 class="card-title text-capitalize">{{ $kelas->kelas->nama }}</h5>
														<p class="card-text text-capitalize">{{ $kelas->kelas->deskripsi }}</p>
														<a href="{{ route('siswa.kelas-saya.show', $kelas->kelas_id) }}" class="btn btn-primary">Masuk</a>
														{{-- <form action="" method="POST">
																@csrf
																<input type="hidden" value="{{ $kelas->id }}">
																<button type="submit" class="btn btn-primary">daftar</button>
														</form> --}}
												</div>
										</div>
								@empty
										<div class="w-100 d-flex justify-content-center">
												<h4>-- belum ada kelas tersedia --</h4>
										</div>
								@endforelse
						</div>
				</div>
		</div>
@endsection
