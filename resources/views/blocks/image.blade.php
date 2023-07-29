@if (isset($attrs['media']))
    <figure class="{{ $class }}">
        <x-library-image class="w-full" :image="\Outl1ne\NovaMediaHub\Models\Media::find($attrs['media'])" :conversion="$attrs['conversion'] ?? null" />
    </figure>
@endif
