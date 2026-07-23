@props(['name', 'label', 'type' => 'text', 'value' => null, 'col' => 'col-md-6'])

<div class="{{ $col }}">
    <div class="form-floating">

        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $value) }}" placeholder="{{ $label }}" @class([
                'form-control',
                'is-invalid' => isset($errors) && $errors->has($name),
            ])
            {{ $attributes }}>

        <label for="{{ $name }}">{{ $label }}</label>

        @if (isset($errors))
            @error($name)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        @endif

    </div>
</div>
