<?php

namespace App\Livewire\Admin;

use App\Models\Group;
use Livewire\Component;

class GroupsLivewire extends Component
{
    public array $groups;

    public function mount()
    {
        $this->groups = Group::with(['users', 'curator', 'headman'])
        ->get()
        ->toArray();
    }

    public function render()
    {
        return view('livewire.admin.groups-livewire')->extends('layouts.app');
    }
}
