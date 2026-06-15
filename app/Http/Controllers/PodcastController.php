<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PodcastController extends Controller
{
    public static function show(?Language $language, Podcast $podcast)
    {
        return view('podcast.show', compact('podcast'));
    }

    public static function audio(
        Request $request,
        ?Language $language,
        Podcast $podcast
    ) {
        abort_unless($podcast->file, 404);

        // Forward the browser's Range header so the upstream host can serve
        // partial content. Firefox relies on this for seeking and resuming
        // buffered playback; without it the response is aborted mid-stream
        // (NS_ERROR_NET_PARTIAL_TRANSFER).
        $upstreamHeaders = [];
        if ($range = $request->header('Range')) {
            $upstreamHeaders['Range'] = $range;
        }

        $upstream = Http::withHeaders($upstreamHeaders)
            ->withOptions(['stream' => true])
            ->get($podcast->file);

        abort_unless($upstream->successful(), $upstream->status());

        // Pass through the upstream's own byte accounting so Content-Length /
        // Content-Range always match the bytes we actually send, and only
        // advertise range support if the upstream genuinely honoured it.
        $responseHeaders = ['Content-Type' => 'audio/mpeg'];
        foreach (
            [
                'Content-Length',
                'Content-Range',
                'Accept-Ranges',
                'Last-Modified',
                'ETag',
            ] as $header
        ) {
            if ($upstream->hasHeader($header)) {
                $responseHeaders[$header] = $upstream->header($header);
            }
        }

        $body = $upstream->toPsrResponse()->getBody();

        return response()->stream(
            function () use ($body) {
                while (! $body->eof()) {
                    echo $body->read(256 * 1024);
                    flush();
                }
            },
            $upstream->status(),
            $responseHeaders
        );
    }
}
