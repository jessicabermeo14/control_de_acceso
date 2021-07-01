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
    
    public $id_member, $name, $last_name,$birthday, $document_type, $document_number, $email, $phone, $city, $status;
    public $modal = false;
    public $search = '';
    public $perPage = 5;

    protected $rules = [
        'name'            => 'required|min:6',
        'last_name'       => 'required|min:6',
        'birthday'        => 'required|min:6',
        'document_type'   => 'required|min:6',
        'document_number' => 'required|min:6',
        'email'           => 'required|email',
        'phone'           => 'required|min:6',
        'city'            => 'required|min:6',
        'status'          => 'required'
    ];

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
        $this->name            = '';
        $this->id_member       = '';
        $this->last_name       = '';
        $this->birthday        = '';
        $this->document_type   = '';
        $this->document_number = '';
        $this->email           = '';
        $this->phone           = '';
        $this->city            = '';
        $this->status          = '';
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $this->id_member       = $id;
        $this->name            = $member->name;
        $this->last_name       = $member->last_name;
        $this->birthday        = $member->birthday;
        $this->document_type   = $member->document_type;
        $this->document_number = $member->document_number;
        $this->email           = $member->email;
        $this->phone           = $member->phone;
        $this->city            = $member->city;
        $this->status          = $member->status;
        

        $this->openModal();
    }

    public function destroy($id)
    {
        Member::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function store()
    {
        $this->validate();
        Member::updateOrCreate(['id'=>$this->id_member],
            [
                'name'            => $this->name,
                'last_name'       => $this->last_name,
                'birthday'        => $this->birthday,
                'document_type'   => $this->document_type,
                'document_number' => $this->document_number,
                'email'           => $this->email,
                'phone'           => $this->phone,
                'city'            => $this->city,
                'status'          => $this->status
            ]);
         
        session()->flash('message',
        $this->id_member ? '¡Actualización exitosa!' : '¡Registro exitoso!');
         
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
