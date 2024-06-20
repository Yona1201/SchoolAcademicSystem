@extends('layouts.main')
@section('content')
		<div class="col-12 col-sm-6 col-xl-4 mb-4">
				<h2 class="text-capitalize"></h2>
		</div>

		<div class="row mt-4 p-4">
				<div class="col-12 mb-4">
						<div class="card">
								<div class="card-body p-4">
										<div class="row">
												<div class="col-2">
														<img src="{{ asset('images') }}/kelas/default.png" class="rounded-2" alt="">
												</div>
												<div class="col-10">
														<table class="mb-3">
																<tr>
																		<td>Nama Kelas</td>
																		<td>:</td>
																		<td>{{ $kelas->nama }}</td>
																</tr>
																<tr>
																		<td>Pengajar</td>
																		<td>:</td>
																		<td>{{ $kelas->guru?->nama }}</td>
																</tr>
														</table>
												</div>

										</div>
								</div>
						</div>

				</div>
		</div>

		<div class="row mt-4 p-4">
				<div class="col-12 mb-4">
						<div class="accordion" id="pertemuanAccordion">
								@forelse ($kelas->pertemuan as $pertemuan)
										<div class="accordion-item">
												<h2 class="accordion-header" id="heading{{ $loop->iteration }}">
														<button class="accordion-button" type="button" data-bs-toggle="collapse"
																data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
																aria-controls="collapse{{ $loop->iteration }}">
																Pertemuan {{ $loop->iteration }} - {{ $pertemuan->judul }}
														</button>
												</h2>
												<div id="collapse{{ $loop->iteration }}" class="accordion-collapse {{ $loop->first ? 'show' : '' }} collapse"
														aria-labelledby="heading{{ $loop->iteration }}" data-bs-parent="#pertemuanAccordion">
														<div class="accordion-body">
																{{ $pertemuan->deskripsi }}
																<ul class="list-unstyled">
																		<li class="mt-3">
																				{{-- <a href="" class="btn btn-success">
																						<i class="fas fa-user-check" style="color: #ffffff;"></i>
																						<span class="ms-2 text-white">Isi Absen</span>
																				</a> --}}


																				{{-- triger modal absen --}}
																				<x-button-modal-component disabled="{{ $pertemuan->cekAbsensi() }}"
																						color="{{ $pertemuan->cekAbsensi() ? 'btn-gray-400' : 'btn-success' }}"
																						idmodal="modalAbsen{{ $loop->iteration }}">
																						<i class="fas fa-user-check" style="color: #ffffff;"></i>
																						<span class="ms-2 text-white">Isi Absen {{ !$pertemuan->cekAbsensi() }}</span>
																				</x-button-modal-component>

																				{{-- modal absen --}}
																				<x-modal-component judul="absen pertemuan {{ $pertemuan->judul }}"
																						idmodal="modalAbsen{{ $loop->iteration }}" method="POST" url="{{ route('siswa.absensi.store') }}"
																						button="Submit absen">
																						<input type="hidden" name="idp" value="{{ $pertemuan->id }}">

																						<div class="d-flex justify-content-start gap-3">
																								<x-input-radio nama="status" value="hadir" idi="status1">Hadir</x-input-radio>
																								<x-input-radio nama="status" value="izin" idi="status1">Izin</x-input-radio>
																								<x-input-radio nama="status" value="sakit" idi="status1">Sakit</x-input-radio>
																								<x-input-radio nama="status" value="alpa" idi="status1">Alpa</x-input-radio>
																						</div>

																						<x-input-text nama="keterangan" placeholder="isi keterangan jika ada ...">Keterangan</x-input-text>
																				</x-modal-component>

																		</li>
																		<li class="mt-3">
																				<div class="d-flex justify-start gap-3">
																						@forelse ($pertemuan->materi as $materi)
																								<a class="btn btn-info text-capitalize" href="{{ asset('upload') }}/pdf/{{ $materi->path }}"
																										target="_blank" rel="noopener noreferrer">
																										download {{ $materi->judul }}
																								</a>
																						@empty
																								<p>- guru belum mengupload materi --</p>
																						@endforelse
																				</div>
																		</li>
																</ul>

														</div>
												</div>
										</div>
								@empty
										<div class="w-100 d-flex justify-content-center">
												<h5>-- kelas ini belum memiliki data pertemuan --</h5>
										</div>
								@endforelse

						</div>
				</div>
		</div>
@endsection
@push('css')
		<style>
				/* Menambahkan padding ke semua sel tabel */
				table td {
						padding: 10px;
						/* Atur nilai padding sesuai keinginan */
				}

				/* Menambahkan padding ke semua baris tabel */
				table tr {
						padding: 5px 0;
						/* Padding atas-bawah 5px, kiri-kanan 0 */
				}
		</style>
@endpush
