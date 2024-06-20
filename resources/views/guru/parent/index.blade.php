@extends('layouts.main')
@section('content')
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize">data orang tua</h2>
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
																@foreach ($parents as $parent)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>
																						{{ $parent->nama }}
																				</td>
																				<td>
																						{{ $parent->email }}
																				</td>
																				<td>
																						{{ $parent->getJk() }}
																				</td>
																				<td>
																						{{ $parent->phone }}
																				</td>
																				<td>


																						<x-button-modal-component idmodal="modalEdit{{ $parent->id }}" color="btn-warning">
																								<box-icon type='solid' name='pencil'></box-icon>
																						</x-button-modal-component>

																						<x-modal-component url="{{ route('guru.siswa.update', $parent->id) }}"
																								idmodal="modalEdit{{ $parent->id }}" judul="modal edit">

																								<x-input-text value="{{ $parent->nama }}" placeholder="masukan nama ..."
																										nama="nama">Nama</x-input-text>
																								<x-input-text value="{{ $parent->email }}" placeholder="masukan email ..." nama="email"
																										type="email">Email</x-input-text>
																								<x-input-select nama="jenis_kelamin" pilihan="pilih jenis kelamin" label="Jenis Kelamin">
																										<option {{ $parent->jenis_kelamin == 'l' ? 'selected' : '' }} value="l">Laki - laki
																										</option>
																										<option {{ $parent->jenis_kelamin == 'p' ? 'selected' : '' }} value="p">Perempuan</option>
																								</x-input-select>
																								<x-input-text value="{{ $parent->phone }}" placeholder="masukan nomor handphone ..."
																										nama="phone">Nomor
																										Handphone
																								</x-input-text>
																						</x-modal-component>


																						<x-button-modal-component idmodal="modalDelete{{ $parent->id }}" color="btn-danger">
																								<box-icon type='solid' name='trash'></box-icon>
																						</x-button-modal-component>
																						<x-modal-component url="{{ route('guru.siswa.destroy', $parent->id) }}" button="Hapus"
																								idmodal="modalDelete{{ $parent->id }}" judul="delete data" method="DELETE">
																								<p>yakin menghapus data siswa <strong>{{ $parent->nama }}</strong> ?, <br> tindakan ini tidak
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
