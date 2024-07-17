<?php

namespace App\Livewire;

use App\Models\Poll;
use App\Models\Vote;
use Livewire\Component;
use Livewire\Attributes\On;

class Polls extends Component
{

    #[On('pollCreated')]
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.polls', ['polls' => $polls]);
    }


    public function addVotes($optionId) {
        Vote::create(['option_id' => $optionId]);
    }

    public function deletePoll($pollId) {
        Poll::where('id', $pollId)->delete();
    }
}
