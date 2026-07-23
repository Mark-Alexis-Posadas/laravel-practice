@props(['name', 'label', 'options' => [], 'value' => null, 'col' => 'col-md-6'])

<div class="{{ $col }}">
    <div class="form-floating">

        <select name="{{ $name }}"
            {{ $attributes->merge([
                'class' => 'form-select' . ($errors->has($name) ? ' is-invalid' : ''),
            ]) }}>

            <option value="">Select</option>

            @foreach ($options as $key => $option)
                <option value="{{ $key }}" @selected(old($name, $value) == $key)>
                    {{ $option }}
                </option>
            @endforeach

        </select>

        <label>{{ $label }}</label>

        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>
</div>
