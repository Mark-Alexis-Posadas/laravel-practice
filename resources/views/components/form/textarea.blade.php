@props(['name', 'label', 'value' => null, 'col' => 'col-12'])

<div class="{{ $col }}">
    <div class="form-floating">

        <textarea id="{{ $name }}" name="{{ $name }}" placeholder="{{ $label }}"
            {{ $attributes->merge([
                'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : ''),
            ]) }}>{{ old($name, $value) }}</textarea>

        <label for="{{ $name }}">{{ $label }}</label>

        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>
</div>
