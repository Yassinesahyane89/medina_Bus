<div class="form-group {{ $patternClass }}">
    <label for="{{ $id ?? $name }}" class="form-label">
        {{ $label ?? $name }}
    </label>

    <select class="form-control {{ $class }} @error($name) is-invalid @enderror"
        value="{{ old($name) ?? $value }}"
        name="{{ $name }}"
        id="{{ $id ?? $name }}"
        placeholder="{{ $placeholder ?? '' }}"
        autocomplete="{{ $autocomplete ?? 'off' }}"
        autofocus="{{ $autofocus ?? '' }}"
        min="{{ $min ?? '' }}"
        max="{{ $max ?? '' }}"
        step="{{ $step ?? '' }}"
        pattern="{{ $pattern ?? '' }}"
        title="{{ $title ?? '' }}"
        size="{{ $size ?? '' }}"
        maxlength="{{ $maxlength ?? '' }}"
        minlength="{{ $minlength ?? '' }}"
        accept="{{ $accept ?? '' }}"
        @if ($multiple ?? false)
            multiple="{{ $multiple ?? '' }}"
        @endif
        spellcheck="{{ $spellcheck ?? '' }}"
        @required($required ?? false)
        @readonly($readonly ?? false)
        @disabled($disabled ?? false)

        {{ $attributes }}>
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}" {{ $option['selected'] ? 'selected' : '' }}>{{ $option['text'] }}</option>
        @endforeach
    </select>

    @if ($subtext)
        <div class="form-text">
            {{ $subtext }}
        </div>
    @endif

    @error($name)
        <div class="invalid-feedback">
            <div>
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
