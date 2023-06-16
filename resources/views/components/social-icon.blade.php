@props(['show_account_name' => false, 'account'])

@if (isset($settings[$account]))
    <a title="Visit our {{ $account }} account"
        class="{{ $show_account_name ? 'block mb-2 lg:mb-4' : 'inline-block' }} !font-bold !no-underline" target="_blank"
        href="{{ $settings[$account] }}">
        @svg($account, 'h-12 w-12 text-blue rounded-full inline-block border bg-white p-2')
        @if ($show_account_name)
            {{ ucfirst($account) }}
        @endif
    </a>
@endif
