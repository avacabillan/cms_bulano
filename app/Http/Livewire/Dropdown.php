<?php

namespace App\Http\Livewire;
use App\Models\Corporate;
use App\Models\Group;
use Livewire\Component;


class Dropdown extends Component
{
    public $selectedGroup = null;
    public $selectedCorporate = null;
    public $corporates = null;

    public function render()
    {
        return view('livewire.dropdown',[
            'Group' => Group::all(),
        ]);
    }
    public function updatedSelectedGroup($group_id)
    {
        $this->corporates = Corporate::where('group_id', $group_id)->get();
    }
}
