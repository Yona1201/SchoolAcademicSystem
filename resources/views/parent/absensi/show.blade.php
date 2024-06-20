@extends('layouts.main')
@section('content')
		<div class="col-12 mb-4">
				<h2 class="text-capitalize">Absensi anak pada kelas : {{ $kelas->nama }} </h2>
		</div>

		<div class="row mt-4">
				<div class="col-12 mb-4">
						<div class="card mb-4 border-0 shadow">
								<div class="card-body">
										<div class="table-responsive">
												<table class="table-centered table-nowrap mb-0 table rounded">
														<thead class="thead-light">
																<tr>
																		<th class="rounded-start border-0">#</th>
																		<th class="border-0">Nama Pertemuan</th>
																		<th class="border-0">Status Kehadiran</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($kelas->pertemuan as $kelas)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>
																						{{ $kelas->judul }}
																				</td>
																				<td>
																						<h5 class="badge rounded-pill bg-success p-2">
																								{{ $kelas->absensi[0]->status }}
																						</h5>
																				</td>
																		</tr>
																@endforeach
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
