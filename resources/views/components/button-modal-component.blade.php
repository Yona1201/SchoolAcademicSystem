@props(['color' => 'btn-primary', 'idmodal' => 'modal', 'disabled' => false])

<button type="button" class="btn {{ $color }}" {{ $disabled ? 'disabled' : '' }} data-bs-toggle="modal"
		data-bs-target="#{{ $idmodal }}">
		{{ $slot }}
</button>
