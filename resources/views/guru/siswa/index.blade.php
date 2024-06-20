@extends('layouts.main')
@section('content')
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize">data siswa</h2>
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
																		<th class="border-0">Email</th>
																		<th class="border-0">Jenis Kelamin</th>
																		<th class="border-0">Phone</th>
																		<th class="rounded-end border-0">Aksi</th>
																</tr>
														</thead>
														<tbody>
																<!-- Item -->
																@foreach ($siswas as $siswa)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>
																						{{ $siswa->nama }}
																				</td>
																				<td>
																						{{ $siswa->email }}
																				</td>
																				<td>
																						{{ $siswa->getJk() }}
																				</td>
																				<td>
																						{{ $siswa->phone }}
																				</td>
																				<td>


																						<x-button-modal-component idmodal="modalEdit{{ $siswa->id }}" color="btn-warning">
																								<box-icon type='solid' name='pencil'></box-icon>
																						</x-button-modal-component>

																						<x-modal-component url="{{ route('guru.siswa.update', $siswa->id) }}"
																								idmodal="modalEdit{{ $siswa->id }}" judul="modal edit">

																								<x-input-text value="{{ $siswa->nama }}" placeholder="masukan nama ..."
																										nama="nama">Nama</x-input-text>
																								<x-input-text value="{{ $siswa->email }}" placeholder="masukan email ..." nama="email"
																										type="email">Email</x-input-text>
																								<x-input-select nama="jenis_kelamin" pilihan="pilih jenis kelamin" label="Jenis Kelamin">
																										<option {{ $siswa->jenis_kelamin == 'l' ? 'selected' : '' }} value="l">Laki - laki
																										</option>
																										<option {{ $siswa->jenis_kelamin == 'p' ? 'selected' : '' }} value="p">Perempuan</option>
																								</x-input-select>
																								<x-input-text value="{{ $siswa->phone }}" placeholder="masukan nomor handphone ..."
																										nama="phone">Nomor
																										Handphone
																								</x-input-text>
																						</x-modal-component>


																						<x-button-modal-component idmodal="modalDelete{{ $siswa->id }}" color="btn-danger">
																								<box-icon type='solid' name='trash'></box-icon>
																						</x-button-modal-component>
																						<x-modal-component url="{{ route('guru.siswa.destroy', $siswa->id) }}" button="Hapus"
																								idmodal="modalDelete{{ $siswa->id }}" judul="delete data" method="DELETE">
																								<p>yakin menghapus data siswa <strong>{{ $siswa->nama }}</strong> ?, <br> tindakan ini tidak
																										dapat
																										dibatalkan.</p>
																						</x-modal-component>

																				</td>
																		</tr>
																@endforeach

																<!-- End of Item -->
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
