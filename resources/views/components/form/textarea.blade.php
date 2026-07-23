@props(['name', 'label', 'value' => null, 'col' => 'col-12'])

@php
    $hasError = isset($errors) && $errors->has($name);
@endphp

<div class="{{ $col }}">
    <div class="form-floating">

        <textarea id="{{ $name }}" name="{{ $name }}" placeholder="{{ $label }}"
            {{ $attributes->merge([
                'class' => 'form-control' . ($hasError ? ' is-invalid' : ''),
            ]) }}>{{ old($name, $value) }}</textarea>

        <label for="{{ $name }}">{{ $label }}</label>

        @if ($hasError)
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif

    </div>
</div>
