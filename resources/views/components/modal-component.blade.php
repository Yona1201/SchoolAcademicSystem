@props([
    'judul' => 'judul modal',
    'idmodal' => 'modal',
    'url' => '',
    'method' => 'PUT',
    'button' => 'Simpan',
])

<div class="modal fade" id="{{ $idmodal }}" tabindex="-1" aria-labelledby="{{ $idmodal }}Label"
		aria-hidden="true">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title text-capitalize" id="{{ $idmodal }}Label">{{ $judul }}</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="{{ $url }}" method="POST">
								@csrf
								@method($method)
								<div class="modal-body">
										{{ $slot }}
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
										<button type="submit" class="btn btn-primary">{{ $button }}</button>
								</div>
						</form>
				</div>
		</div>
</div>
