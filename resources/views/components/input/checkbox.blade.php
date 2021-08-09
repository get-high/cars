@props(['label'])

<div class="block">
    <div class="mt-2">
        <div>
            <label class="inline-flex items-center cursor-pointer">
                {{ $slot }}
                <span class="ml-2">{{ $label }}</span>
            </label>
        </div>
    </div>
</div>