<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIAPI
{
    /**
     * Create a new class instance.
     */
    public static function callAPI($prompt)
    {
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "Bearer " . env('OPENAI_API_KEY')
        ])->post('https://api.openai.com/v1/responses', [
                    "model" => "gpt-4.1",
                    "input" => $prompt,
                ]);

        // Check if the response is successful
        if ($response->successful()) {
            $text = $response->json()['output'][0]['content'][0]['text'];
        } else {
            // Handle the error
            $text = 'Error: ' . $response->json()['error']['message'];
        }
        return $text;
    }
}
