<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsletterController extends Controller
{
    /**
     * Proxy a ConvertKit form subscription server-side so the request is
     * first-party and isn't blocked by tracker blockers (DuckDuckGo, uBlock,
     * Brave, Firefox ETP). Also keeps the API key off the front end.
     */
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            "form_id" => ["required", "regex:/^[A-Za-z0-9-]+$/"],
            "email" => ["required", "email"],
            "tags" => ["array"],
            "tags.*" => ["integer"],
        ]);

        $response = Http::acceptJson()->asJson()->post(
            "https://api.convertkit.com/v3/forms/{$validated["form_id"]}/subscribe",
            [
                "api_key" => config("services.convertkit.api_key"),
                "email" => $validated["email"],
                "tags" => $validated["tags"] ?? [],
            ]
        );

        // Relay ConvertKit's JSON/status so the existing front-end logic
        // (json.error, json.subscription.state) keeps working unchanged.
        return response()->json($response->json(), $response->status());
    }

    /**
     * Proxy ConvertKit's form-visit tracking ping (analytics only).
     */
    public function visit(Request $request)
    {
        $validated = $request->validate([
            "form_id" => ["required", "regex:/^[A-Za-z0-9-]+$/"],
        ]);

        Http::acceptJson()->asJson()->post(
            "https://app.convertkit.com/forms/{$validated["form_id"]}/visit"
        );

        return response()->json(["ok" => true]);
    }
}
