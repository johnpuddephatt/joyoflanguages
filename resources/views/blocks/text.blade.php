{{-- prettier-ignore-start --}}
@if(isset($content))
@foreach ($content as $textNode)
@if (isset($textNode['marks']))
@foreach ($textNode['marks'] as $mark)
@if ($mark['type'] == 'link')
<a href="{{ $mark['attrs']['href'] }}"
@if($mark['attrs']['class'] ?? false) target="{{ $mark['attrs']['class'] }}"@endif
@if($mark['attrs']['target'] ?? false) target="{{ $mark['attrs']['target'] }}"@endif>@elseif($mark['type'] == 'bold')
<strong>
@elseif($mark['type'] == 'italic')
<em>
@elseif($mark['type'] == 'strike')
<s>@elseif($mark['type'] == 'code')<code>@endif
@endforeach
@endif
@if($textNode['text'] ?? false){{ $textNode['text'] }}@endif
@if(isset($textNode['marks']))
@foreach ($textNode['marks'] as $mark)
@if ($mark['type'] == 'link')
</a>
@elseif($mark['type'] == 'bold')
</strong>
@elseif($mark['type'] == 'italic')
</em>
@elseif($mark['type'] == 'strike')
</s>
@elseif($mark['type'] == 'code')
</code>
@endif
@endforeach
@endif
@endforeach
{{-- prettier-ignore-end --}}
@endif
