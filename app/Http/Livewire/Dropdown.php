<?php

namespace App\Http\Livewire;
use App\Models\Corporate;
use App\Models\Group;
use Livewire\Component;


class Dropdown extends Component
{
    public $selectedGroup = null;
    public $selectedCorp = null;
    public $corporates = null;

    public function render()
    {
        return view('livewire.dropdown',[
            'groups' => Group::all(),
        ]);
    }
    public function updatedSelectedGroup($id)
    {
        $this->corporates = Corporate::where('group_id', $id)->get();
    }
}
