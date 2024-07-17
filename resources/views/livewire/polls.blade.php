<div class="mb-5">
    
    @forelse ($polls as $poll)
    <div class="mb-3 mt-3 border-slate-900">
        <div class="flex gap-2">
            <h2 class="text-lg font-bold">{{$poll->title}}</h2>
            <button class="btn" wire:click="deletePoll({{$poll->id}})">Delete Poll</button>
        </div>
            @foreach ($poll->options as $option)
            <div class="flex gap-2">
                <button class="btn" wire:click="addVotes({{$option->id}})">Vote</button>
                <label for="{{$option->name}}">{{$option->name}} ({{$option->votes->count()}})</label>
            </div>
            @endforeach
        </form>
    </div>
    @empty
    <div class="mb-3 mt-3">
        <h3 class="text-lg font-bold">Polls are empty</h3>
    </div>
    @endforelse
</div>
