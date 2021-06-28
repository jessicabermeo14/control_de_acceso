<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Member;

class Members extends Component
{
    use WithPagination;

    protected $queryString = ['search'=>['except'=>''],
    'perPage'=>['except'=>5]
    ];

    public $name, $id_institution;
    public $modal = false;
    public $search = '';
    public $perPage = 5;

    public function render()
    {
        return view('livewire.members', [
            'members'=>Member::where('name', 'LIKE', "%{$this->search}%")
            ->orderBy('id','desc')
            ->paginate($this->perPage)
        ]);

    }

    public function create()
    {
        $this->cleanFields();
        $this->openModal();
    }

    public function openModal() 
    {
        $this->modal = true;
    }

    public function closeModal() 
    {
        $this->modal = false;
    }
    
    public function cleanFields()
    {
        $this->name = '';
        $this->id_institution = '';
    }

    public function edit($id)
    {
        $institution = Member::findOrFail($id);
        $this->id_institution = $id;
        $this->name = $institution->name;
        $this->openModal();
    }

    public function destroy($id)
    {
        Member::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function store()
    {
        $this->validate(['name'=>'required']);
        Member::updateOrCreate(['id'=>$this->id_institution],
            [
                'name' => $this->name
            ]);
         
        session()->flash('message',
        $this->id_institution ? '¡Actualización exitosa!' : '¡Registro exitoso!');
         
        $this->closeModal();
        $this->cleanFields();
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = 5;
    }
    
}
