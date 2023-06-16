<div class="bg-white py-12 lg:py-16">
    <div class="container grid-cols-3 lg:grid">
        <div class="col-span-2 lg:py-16">
            <div class="prose">
                @if (isset($settings['company_email']))
                    <p><a class="text-xl font-bold !no-underline"
                            href="mailto:{{ $settings['contact_email'] }}">{{ $settings['company_email'] }}</a></p>
                @endif
                @if (isset($settings['company_phone']))
                    <p><a class="text-xl font-bold !no-underline"
                            href="tel:{{ $settings['company_phone'] }}">{{ $settings['company_phone'] }}</a></p>
                @endif
                @if (isset($settings['company_address']))
                    <p class="text-xl font-bold">
                        {{ $settings['company_address'] }}</p>
                @endif

                @if (isset($settings['company_legal']))
                    <p class="mt-8 max-w-xl">{{ $settings['company_legal'] }}</p>
                @endif
            </div>
        </div>
        <div class="pt-12 lg:py-16">
            <div class="prose max-w-xl text-xl !font-bold lg:max-w-xs">

                @foreach (['facebook', 'twitter', 'youtube', 'instagram', 'linkedin', 'vimeo'] as $account)
                    <x-social-icon :account="$account" :show_account_name="true" />
                @endforeach
            </div>
        </div>

    </div>
</div>
