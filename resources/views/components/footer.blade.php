<footer class="relative overflow-hidden bg-blue py-36 text-center lg:text-left">
    <div class="container mx-auto max-w-none">
        @if (isset($settings['mission']))
            <p class="mx-auto max-w-lg text-gray lg:mx-0">{{ $settings['mission'] }}</p>
        @endif

        <div class="mt-12 flex flex-col items-center gap-4 lg:flex-row lg:gap-6">
            @if (isset($settings['company_email']))
                <a class="text-xl font-bold text-white lg:text-3xl"
                    href="mailto:{{ $settings['company_email'] }}">{{ $settings['company_email'] }}</a>
            @endif
            <div class="flex flex-row gap-1">
                @foreach (['facebook', 'twitter', 'youtube', 'instagram', 'linkedin', 'vimeo'] as $account)
                    <x-social-icon :account="$account" />
                @endforeach
            </div>
        </div>

        @if (isset($secondary_menu))
            <nav class="-mx-4 mt-6 flex flex-row gap-2">
                @foreach ($secondary_menu as $menu_item)
                    @if (($menu_item['data']['type'] ?? false) == 'button')
                        <x-button-link target="{{ $menu_item['target'] ?? '_self' }}"
                            :href="$menu_item['value']">{{ $menu_item['name'] }}</x-button-link>
                    @else
                        <a class="inline-block rounded border-transparent px-4 py-2 transition hover:bg-white hover:bg-opacity-10"
                            href="{{ $menu_item['value'] }}" target="{{ $menu_item['target'] ?? '_self' }}">
                            {{ $menu_item['name'] }}
                        </a>
                    @endif
                @endforeach
            </nav>
        @endif
    </div>

</footer>
