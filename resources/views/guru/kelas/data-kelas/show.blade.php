@extends('layouts.main')
@section('content')
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize">Kelas {{ $kelas->nama }}</h2>
		</div>

		<div class="row mt-4">
				<div class="col-12 mb-4">
						<div class="card mb-4 border-0 shadow">
								<div class="card-header">
										<div class="card-title">
												Tambah data pertemuan
										</div>
								</div>
								<div class="card-body">
										<form action="{{ route('guru.kelas.pertemuan.store') }}" method="POST">
												@csrf
												<input type="hidden" value="{{ $kelas->id }}" name="idk">
												<div class="row">
														<div class="col-lg-4 col-md-6 col-12">
																<x-input-text placeholder="masukan judul pertemuan kelas anda ..." nama="judul">judul</x-input-text>
														</div>
														<div class="col-lg-8 col-md-6 col-12">
																<x-input-text placeholder="masukan deskripsi pertemuan kelas anda ..."
																		nama="deskripsi">Deskripsi</x-input-text>
														</div>


														<div class="col-12 mt-5">
																<button type="submit" class="btn btn-primary">Simpan data pertemuan</button>
														</div>
										</form>
								</div>
						</div>
				</div>
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
																		<th class="border-0">Nama</th>
																		<th class="border-0">Deskripsi</th>
																		<th class="rounded-end border-0">Aksi</th>
																</tr>
														</thead>
														<tbody>

																@forelse ($kelas->pertemuan as $pertemuan)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>
																						{{ $pertemuan->judul }}
																				</td>
																				<td>
																						{{ $pertemuan->deskripsi }}
																				</td>
																				<td>

																						{{-- modal edit --}}
																						<x-button-modal-component idmodal="modalEdit{{ $pertemuan->id }}" color="btn-warning">
																								<box-icon type='solid' name='pencil'></box-icon>
																						</x-button-modal-component>

																						<x-modal-component url="{{ route('guru.kelas.pertemuan.update', $pertemuan->id) }}"
																								idmodal="modalEdit{{ $pertemuan->id }}" judul="modal edit">

																								<x-input-text value="{{ $pertemuan->judul }}" placeholder="masukan judul pertemuan kelas anda ..."
																										nama="judul">Judul</x-input-text>
																								<x-input-text value="{{ $pertemuan->deskripsi }}" placeholder="masukan deskripsi ..."
																										nama="deskripsi">Deskripsi</x-input-text>
																						</x-modal-component>

																						{{-- modal delete --}}
																						<x-button-modal-component idmodal="modalDelete{{ $pertemuan->id }}" color="btn-danger">
																								<box-icon type='solid' name='trash'></box-icon>
																						</x-button-modal-component>
																						<x-modal-component url="{{ route('guru.kelas.pertemuan.destroy', $pertemuan->id) }}" button="Hapus"
																								idmodal="modalDelete{{ $pertemuan->id }}" judul="delete data" method="DELETE">
																								<p>yakin menghapus data siswa <strong>{{ $pertemuan->judul }}</strong> ?, <br> tindakan ini tidak
																										dapat
																										dibatalkan.</p>
																						</x-modal-component>

																						{{-- <a href="{{ route('guru.kelas.pertemuan.show', $pertemuan->id) }}" class="btn btn-success"
																								title="masuk">
																								<box-icon type='solid' name='log-in'></box-icon>
																						</a> --}}

																				</td>
																		</tr>
																@empty
																		<tr>
																				<td class="text-center" colspan="4">-- belum ada data --</td>
																		</tr>
																@endforelse
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
