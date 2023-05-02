<div class="form-group {{ $patternClass }}">
    <label for="{{ $id ?? $name }}" class="form-label">
        {{ $label ?? $name }}
    </label>

    <input class="form-control {{ $class }} @error($name) is-invalid @enderror"
        value="{{ old($name) ?? $value }}"
        name="{{ $name }}"
        id="{{ $id ?? $name }}"
        type="{{ $type }}"
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
        multiple="{{ $multiple ?? '' }}"
        spellcheck="{{ $spellcheck ?? '' }}"
        @required($required ?? false)
        @readonly($readonly ?? false)
        @disabled($disabled ?? false)

        {{ $attributes }}>

    @if ($subtext)
        <div class="form-text">
            {{ $subtext }}
        </div>
    @endif

    @error($name)
        <div class="invalid-feedback">
            <div data-field="formValidationUsername">
                {{ $message }}
            </div>
        </div>
    @enderror
</div>
