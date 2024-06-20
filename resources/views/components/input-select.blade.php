@props([
    'nama' => 'nama',
    'pilihan' => 'pilihan',
    'value' => '',
    'label' => 'labelnya',
])
<div class="mb-3">
		<label class="text-capitalize" for="{{ $nama }}">{{ $label }}</label>
		<select class="form-control" id="{{ $nama }}" name="{{ $nama }}" value="{{ old($nama) ?? $value }}">
				<option value="">-- {{ $pilihan }} --</option>
				{{ $slot }}
		</select>
</div>
