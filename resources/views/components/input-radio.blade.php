@props([
    'nama' => 'nama',
    'idi' => 'idi',
    'value' => 'default',
])
<div class="form-check">
		<input class="form-check-input" type="radio" name="{{ $nama }}" id="{{ $idi }}"
				value="{{ $value }}">
		<label class="form-check-label" for="{{ $idi }}">
				{{ $slot }}
		</label>
</div>
