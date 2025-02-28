@if (isset($content))
    <table class="{{ $class }} block overflow-x-auto">
        @foreach ($content as $tableRow)
            <tr class="border-b">
                @foreach ($tableRow['content'] as $tableCell)
                    @if ($tableCell['type'] == 'TableHeader')
                        <th>
                        @else
                        <td>
                    @endif
                    @if (isset($tableCell['content']))
                        @include('blocks.text', ['content' => $tableCell['content']])
                    @endif
                    @if ($tableCell['type'] == 'TableHeader')
                        </th>
                    @else
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
@endif
