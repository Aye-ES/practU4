<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;
use Livewire\WithPagination;

class Personas extends Component
{
    use WithPagination;
    public function render()
    {
        $personas = Persona::paginate(10);
        return view('livewire.personas',[
            'personas' => $personas
        ]);
    }
}
