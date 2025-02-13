@if (isset($content))
    <ul class="{{ $class }}">
        @foreach ($content as $listItem)
            <li>
                @foreach ($listItem['content'] as $listItemContent)
                    @includeWhen($listItemContent['content'] ?? false, 'blocks.' . $listItemContent['type'], [
                        'content' => $listItemContent['content'],
                    ])
                @endforeach
            </li>
        @endforeach
    </ul>
@endif
