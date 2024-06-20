@extends('layouts.main')
@section('content')
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize">data guru</h2>
		</div>
		<div class="row mt-4">
				<div class="col-12 mb-4">
						<div class="card mb-4 border-0 shadow">
								<div class="card-header">
										Tambah Data guru
								</div>
								<form action="{{ route('admin.guru.store') }}" method="post">
										@csrf
										<div class="card-body">
												<x-input-text placeholder="masukan nama ..." nama="nama">Nama</x-input-text>
												<x-input-text placeholder="masukan email ..." nama="email" type="email">Email</x-input-text>
												<x-input-select nama="jenis_kelamin" pilihan="pilih jenis kelamin" label="Jenis Kelamin">
														<option {{ old('jenis_kelamin') == 'l' ? 'selected' : '' }} value="l">Laki - laki
														</option>
														<option {{ old('jenis_kelamin') == 'p' ? 'selected' : '' }} value="p">Perempuan</option>
												</x-input-select>
												<x-input-text placeholder="masukan nomor handphone ..." nama="phone">Nomor
														Handphone
												</x-input-text>
												<x-input-text placeholder="masukan password ..." type="password" nama="password">Password</x-input-text>
										</div>
										<div class="card-footer">
												<button type="submit" class="btn btn-primary">Submit</button>
										</div>
								</form>
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
																		<th class="border-0">Email</th>
																		<th class="border-0">Jenis Kelamin</th>
																		<th class="border-0">Phone</th>
																		<th class="rounded-end border-0">Aksi</th>
																</tr>
														</thead>
														<tbody>
																<!-- Item -->
																@foreach ($gurus as $guru)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>
																						{{ $guru->nama }}
																				</td>
																				<td>
																						{{ $guru->email }}
																				</td>
																				<td>
																						{{ $guru->getJk() }}
																				</td>
																				<td>
																						{{ $guru->phone }}
																				</td>
																				<td>


																						<x-button-modal-component idmodal="modalEdit{{ $guru->id }}" color="btn-warning">
																								<box-icon type='solid' name='pencil'></box-icon>
																						</x-button-modal-component>

																						<x-modal-component url="{{ route('admin.guru.update', $guru->id) }}"
																								idmodal="modalEdit{{ $guru->id }}" judul="modal edit">

																								<x-input-text value="{{ $guru->nama }}" placeholder="masukan nama ..."
																										nama="nama">Nama</x-input-text>
																								<x-input-text value="{{ $guru->email }}" placeholder="masukan email ..." nama="email"
																										type="email">Email</x-input-text>
																								<x-input-select nama="jenis_kelamin" pilihan="pilih jenis kelamin" label="Jenis Kelamin">
																										<option {{ $guru->jenis_kelamin == 'l' ? 'selected' : '' }} value="l">Laki - laki
																										</option>
																										<option {{ $guru->jenis_kelamin == 'p' ? 'selected' : '' }} value="p">Perempuan</option>
																								</x-input-select>
																								<x-input-text value="{{ $guru->phone }}" placeholder="masukan nomor handphone ..."
																										nama="phone">Nomor
																										Handphone
																								</x-input-text>
																						</x-modal-component>


																						<x-button-modal-component idmodal="modalDelete{{ $guru->id }}" color="btn-danger">
																								<box-icon type='solid' name='trash'></box-icon>
																						</x-button-modal-component>
																						<x-modal-component url="{{ route('admin.guru.destroy', $guru->id) }}" button="Hapus"
																								idmodal="modalDelete{{ $guru->id }}" judul="delete data" method="DELETE">
																								<p>yakin menghapus data guru <strong>{{ $guru->nama }}</strong> ?, <br> tindakan ini tidak
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
