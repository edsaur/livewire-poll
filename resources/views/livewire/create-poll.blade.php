<div>
    <form wire:submit.prevent="createPoll">
        @error('title')
        <p class="text-red-500">{{$message}}</p>
        @enderror
        <label>Poll Title</label>
        <input type="text" wire:model.live="title" name="title" class="@error("title") border-red-500 @enderror"/>
        Current title: {{$title}}

        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOptions">Add options</button>
        </div>
        <div class="mt-4">
            @error('options')
            <p class="text-red-500">{{$message}}</p>
            @enderror
            @foreach ($options as $k=>$v)
            <div class="mb-4">
                <label> Option {{$k + 1 }} </label>
                <div class="flex gap-2">
                    <input type="text" wire:model="options.{{$k}}" class="@error("options.{$k}") border-red-500 @enderror"/>
                    <button class="btn" wire:click.prevent="removeOptions({{$k}})">Remove</button>
                </div>
                @error("options.{$k}")
                <p>{{$message}}</p>
            @enderror
            </div>
            @endforeach
        </div>
        <div>
            <button class="btn" type="submit">Create Poll</button>
        </div>
    </form>
</div>
