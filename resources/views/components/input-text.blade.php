@props([
    'nama' => 'nama',
    'type' => 'text',
    'placeholder' => 'placeholder di sini ...',
    'value' => '',
])
<div class="mb-3">
		<label for="{{ $nama }}">{{ $slot }}</label>
		<input class="form-control @error($nama) is-invalid @enderror" id="{{ $nama }}" name="{{ $nama }}"
				type="{{ $type }}" value="{{ old($nama) ?? $value }}" placeholder="{{ $placeholder }}">
		@error($nama)
				<div class="invalid-feedback">
						{{ $message }}
				</div>
		@enderror
</div>
