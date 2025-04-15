<?php

namespace App\Livewire;

use App\Services\OpenAIAPI;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ChatApp extends Component
{
    public $prompt;
    public $history = [];

    public function sendMessage()
    {
        // Validate the prompt
        $this->validate([
            'prompt' => 'required|string|max:255',
        ]);

        $historyValue = [
            'q' => $this->prompt,
            'a' => '',
        ];

        $text = OpenAIAPI::callAPI($this->prompt);

        $historyValue['a'] = $text;
        $this->history[] = $historyValue;
        $this->prompt = ''; // Clear the input field
    }


    public function render()
    {
        return view('livewire.chat-app');
    }
}
