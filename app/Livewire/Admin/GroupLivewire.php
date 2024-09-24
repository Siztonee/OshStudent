<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Group;
use Livewire\Component;

class GroupLivewire extends Component
{
    public array $students;
    public array $group;

    public function mount($id)
    {
        $this->group = Group::with(['curator', 'headman'])
        ->find($id)
        ->toArray();

        $this->students = User::where('group_id', $id)
        ->get()
        ->toArray();
    }

    public function render()
    {
        return view('livewire.admin.group-livewire')->extends('layouts.app');
    }
}
