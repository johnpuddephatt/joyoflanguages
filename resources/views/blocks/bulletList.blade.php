@if (isset($content))
    <ul class="{{ $class }}">
        @foreach ($content as $listItem)
            @if (isset($listItem['content']))
                <li>
                    @foreach ($listItem['content'] as $listItemContent)
                        @includeWhen(
                            $listItemContent['content'] ?? false,
                            'blocks.' . $listItemContent['type'],
                            [
                                'content' => $listItemContent['content'],
                            ]
                        )
                    @endforeach
                </li>
            @endif
        @endforeach
    </ul>
@endif
