<?php

namespace App\Livewire;

use App\Models\Question as ModelsQuestion;
use Livewire\Component;

class Question extends Component
{
    public function __construct(public $questions)
    {
    }
    public function render()
    {
        return view('livewire.question', [
            'questions' => $this->questions
        ]);
    }
}
