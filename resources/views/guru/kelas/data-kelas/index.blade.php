@extends('layouts.main')
@section('content')
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize">data kelas</h2>
		</div>

		<div class="row mt-4">
				<div class="col-12 mb-4">
						<div class="card mb-4 border-0 shadow">
								<div class="card-body">
										<form action="{{ route('guru.kelas.data-kelas.store') }}" method="POST">
												@csrf
												<div class="row">
														<div class="col-lg-4 col-md-6 col-12">
																<x-input-text placeholder="masukan nama kelas anda ..." nama="nama">Nama</x-input-text>
														</div>
														<div class="col-lg-8 col-md-6 col-12">
																<x-input-text placeholder="masukan deskripsi kelas anda ..." nama="deskripsi">Deskripsi</x-input-text>
														</div>

														<div class="col-lg-4 col-md-6 col-12">
																<x-input-select nama="hari" pilihan="Pilih Hari" label="Hari">
																		@foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $hari)
																				<option value="{{ $hari }}" class="text-capitalize mb-1">{{ $hari }}</option>
																		@endforeach
																</x-input-select>
														</div>


														<div class="col-lg-4 col-md-6 col-12">
																<x-input-text placeholder="jam mulai kelas anda ..." type="time" nama="mulai">Jam
																		Mulai</x-input-text>
														</div>
														<div class="col-lg-4 col-md-6 col-12">
																<x-input-text placeholder="jam mulai kelas anda ..." type="time" nama="selesai">Jam
																		Selesai</x-input-text>
														</div>
														<div class="col-12 mt-5">
																<button type="submit" class="btn btn-primary">Simpan data kelas</button>
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
																		<th class="border-0">Nama Kelas</th>
																		<th class="border-0">Deskripsi</th>
																		<th class="border-0">Hari</th>
																		<th class="border-0">Jam</th>
																		<th class="border-0">Jumlah Pertemuan</th>
																		<th class="rounded-end border-0">Aksi</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($kelass as $kelas)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>
																						{{ $kelas->nama }}
																				</td>
																				<td>
																						{{ $kelas->deskripsi }}
																				</td>
																				<td>
																						{{ $kelas->hari }}
																				</td>
																				<td>
																						{{ \Carbon\Carbon::parse($kelas->mulai)->format('H:i') }} s/d
																						{{ \Carbon\Carbon::parse($kelas->selesai)->format('H:i') }}
																				</td>


																				<td>
																						0
																				</td>
																				<td>


																						<x-button-modal-component idmodal="modalEdit{{ $kelas->id }}" color="btn-warning">
																								<box-icon type='solid' name='pencil'></box-icon>
																						</x-button-modal-component>

																						<x-modal-component url="{{ route('guru.kelas.data-kelas.update', $kelas->id) }}"
																								idmodal="modalEdit{{ $kelas->id }}" judul="modal edit">

																								<x-input-text value="{{ $kelas->nama }}" placeholder="masukan nama kelas anda ..."
																										nama="nama">Nama</x-input-text>
																								<x-input-text value="{{ $kelas->deskripsi }}" placeholder="masukan deskripsi ..."
																										nama="deskripsi">Deskripsi</x-input-text>


																								<x-input-select nama="hari" pilihan="Pilih Hari" label="Hari">
																										@foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $hari)
																												<option {{ $kelas->hari == $hari ? 'selected' : '' }} value="{{ $hari }}"
																														class="text-capitalize mb-1">{{ $hari }}
																												</option>
																										@endforeach
																								</x-input-select>


																								<div class="row">
																										<div class="col-6">
																												<x-input-text value="{{ \Carbon\Carbon::parse($kelas->mulai)->format('H:i') }}"
																														placeholder="masukan jam mulai ..." nama="mulai" type="time">Jam Mulai</x-input-text>
																										</div>
																										<div class="col-6">
																												<x-input-text value="{{ \Carbon\Carbon::parse($kelas->selesai)->format('H:i') }}"
																														placeholder="masukan jam selesai ..." nama="selesai" type="time">Jam
																														Selesai</x-input-text>
																										</div>
																								</div>
																						</x-modal-component>


																						<x-button-modal-component idmodal="modalDelete{{ $kelas->id }}" color="btn-danger">
																								<box-icon type='solid' name='trash'></box-icon>
																						</x-button-modal-component>
																						<x-modal-component url="{{ route('guru.kelas.data-kelas.destroy', $kelas->id) }}" button="Hapus"
																								idmodal="modalDelete{{ $kelas->id }}" judul="delete data" method="DELETE">
																								<p>yakin menghapus data siswa <strong>{{ $kelas->nama }}</strong> ?, <br> tindakan ini tidak
																										dapat
																										dibatalkan.</p>
																						</x-modal-component>

																						<a href="{{ route('guru.kelas.data-kelas.show', $kelas->id) }}" class="btn btn-success"
																								title="masuk">
																								<box-icon type='solid' name='log-in'></box-icon>
																						</a>

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
