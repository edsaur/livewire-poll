<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Component;

use function PHPSTORM_META\map;

class CreatePoll extends Component
{

    #[Validate]
    public $title; // To show current title

    public $options = [''];

    protected function rules() {
        return ['title' => 'required', 'options' => 'required|array|min:1|max:10', 'options.*' => 'required|min:1|max:255']; 
    }

    protected $messages = ['option.*' => 'The option cannot be empty'];
    
    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOptions() 
    {
        $this->options[] = '';
    }

    public function removeOptions($index) 
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll() 
    {
        $this->validate();
        Poll::create(['title' => $this->title])->options()->createMany(
            collect($this->options)->map(fn($options) => ['name' => $options])->all()
        );

        $this->reset(['title', 'options']);

    }
}
