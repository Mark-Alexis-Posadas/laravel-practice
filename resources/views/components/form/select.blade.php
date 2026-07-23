@props(['name', 'label', 'options' => [], 'value' => null, 'col' => 'col-md-6'])

@php
    $hasError = isset($errors) && $errors->has($name);
@endphp

<div class="{{ $col }}">
    <div class="form-floating">

        <select id="{{ $name }}" name="{{ $name }}"
            {{ $attributes->merge([
                'class' => 'form-select' . ($hasError ? ' is-invalid' : ''),
            ]) }}>

            <option value="">Select</option>

            @foreach ($options as $key => $option)
                <option value="{{ $key }}" @selected(old($name, $value) == $key)>
                    {{ $option }}
                </option>
            @endforeach

        </select>

        <label for="{{ $name }}">{{ $label }}</label>

        @if ($hasError)
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif

    </div>
</div>
