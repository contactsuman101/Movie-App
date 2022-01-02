<?php

namespace App\Http\Livewire;

use App\Models\Cast;
use Livewire\Component;

class CastIndex extends Component
{
    public function render()
    {
        return view('livewire.cast-index',[
            'casts'=>Cast::paginate(5)
        ]);
    }
}
