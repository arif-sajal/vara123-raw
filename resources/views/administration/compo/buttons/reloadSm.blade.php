<button type="button" class="btn btn-secondary btn-sm @if(isset($class)) {{ $class }}@endif" @if(isset($attributes)) {{ $attributes }} @endif>
    @if(isset($icon))
        <i class="{{ $icon }}"></i>
    @endif

    @if(isset($slot))
        {{ $slot }}
    @endif
</button>
