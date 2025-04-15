<div>
 <div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Chat App') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Testing Chat GPT API With a Chat App') }}</flux:subheading>
    <flux:separator variant="subtle" />
</div>

<div>
    <div class="mb-4">
        <ul>
            @foreach ($history as $item )
                <li>
                    <div class="text-blue-500 font-bold">{{ Auth()->user()->name}}</div>
                    <p>{{$item['q']}}</p>
                </li>
                <li>
                    <div class="text-blue-500 font-bold">AI:</div>
                    <p>{{ $item['a'] }}</p>
                </li>
            @endforeach
        </ul>
    </div>
    <form wire:submit.prevent="sendMessage" class="mb-4">
        <flux:textarea
        label="Prompt"
        wire:model="prompt"
        placeholder="Type your message here..."
    />
        <flux:button variant="primary" class="mt-2" type="submit">Send</flux:button>
    </form>
</div>

</div>
