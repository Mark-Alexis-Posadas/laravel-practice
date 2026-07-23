@props(['name', 'label', 'type' => 'text', 'value' => null, 'col' => 'col-md-6'])

<div class="{{ $col }}">
    <div class="form-floating">

        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            placeholder="{{ $label }}"
            {{ $attributes->merge([
                'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : ''),
            ]) }}>

        <label for="{{ $name }}">{{ $label }}</label>

        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>
</div>
