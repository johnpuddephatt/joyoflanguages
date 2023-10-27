<footer class="relative overflow-hidden bg-blue pb-8 pt-36 lg:pb-24 2xl:pb-36">
    <div class="container mx-auto max-w-none">
        @if (isset($settings['mission']))
            <div class="prose-standout prose mx-auto mb-4 max-w-lg lg:mx-0">@markdown($settings['mission'])</div>
        @endif

        @if (isset($settings['company_legal']))
            <div class="prose mx-auto max-w-lg lg:mx-0">@markdown($settings['company_legal'])</div>
        @endif
        @if (isset($settings['company_address']))
            <div class="prose mx-auto max-w-lg lg:mx-0">@markdown($settings['company_address'])</div>
        @endif

        <div class="mt-12 flex flex-col gap-4 lg:flex-row lg:gap-6">
            @if (isset($settings['company_email']))
                <a class="type-md text-white"
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
