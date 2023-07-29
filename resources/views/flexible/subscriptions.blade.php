<div class="container mx-auto max-w-5xl py-36">
    <p class="text-3xl font-bold">{{ $layout->pre_title }}</p>
    <h2 class="text-3xl font-bold">{{ $layout->title }}</h2>
    <div>@markdown($layout->intro)</div>

    @if ($layout->subscriptions)
        <div class="flex flex-row gap-4">
            @foreach ($layout->subscriptions as $subscription)
                <div class="rounded-3xl border p-4">
                    @if ($subscription->pre_title)
                        <div>{{ $subscription->pre_title }}</div>
                    @endif
                    @if ($subscription->title)
                        <div>{{ $subscription->title }}</div>
                    @endif
                    @if ($subscription->sticker)
                        <div>{{ $subscription->sticker }}</div>
                    @endif
                    @if ($subscription->price)
                        <div>{{ $subscription->price }}</div>
                    @endif
                    @if ($subscription->description)
                        <div>{{ $subscription->description }}</div>
                    @endif
                    @if ($subscription->url)
                        <x-button-link class="mt-8 shadow-white" :href="$subscription->url">Subscribe</x-button-link>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    @if ($layout->outro)
        <div class="rounded-3xl bg-blue bg-opacity-20 p-8">@markdown($layout->outro)</div>
    @endif

</div>
