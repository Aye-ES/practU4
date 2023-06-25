<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;
use Livewire\WithPagination;

class Personas extends Component
{
    use WithPagination;

    public $q;
    public $persona = null;

    public $sortBy = 'id';
    public $sortAsc = true;

    public $confirmingPersonaDeletion = false;
    public $confirmingPersonaAdd = false;

    protected $queryString = [
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortAsc' => ['except' => true],
    ];

    protected $rules = [
        'persona.nombre' => 'required|string',
        'persona.apellido' => 'required|string',
        'persona.celular' => 'required|string',
        'persona.correo' => 'required|string',

    ];

    public function render()
    {
        $personasQuery = Persona::when($this->q, function ($query) {
            return $query->where(function ($query) {
                $query->whereRaw("lower(nombre) like lower(?)", ['%' . strtolower($this->q) . '%']);
                $query->orWhereRaw("lower(apellido) like lower(?)", ['%' . strtolower($this->q) . '%']);
            });
        })->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC');

        $personas = $personasQuery->paginate(10);

        return view('livewire.personas', [
            'personas' => $personas,
        ]);
    }


    public function updating()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($field === $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
            $this->sortBy = $field;
        }
    }

    public function confirmPersonaDeletion($id)
    {
        $this->confirmingPersonaDeletion = $id;
    }

    public function deletePersona(Persona $persona)
    {
        $persona->delete();
        $this->confirmingPersonaDeletion = false;
    }

    public function confirmPersonaAdd(Persona $persona = null)
    {
        $this->reset(['persona']);
        $this->persona = $persona;
        $this->confirmingPersonaAdd = true;
    }


    public function savePersona()
    {
        $this->validate();
        if (isset($this->persona['id'])) {
            $this->persona->save();
        } else {
            Persona::create([
                'nombre' => $this->persona['nombre'],
                'apellido' => $this->persona['apellido'],
                'celular' => $this->persona['celular'],
                'correo' => $this->persona['correo'],
            ]);
        }
        $this->confirmingPersonaAdd = false;
    }

    public function confirmPersonaEdit(Persona $persona)
    {
        $this->persona = $persona;
        $this->confirmingPersonaAdd = true;
    }
}
