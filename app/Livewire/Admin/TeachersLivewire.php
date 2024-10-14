<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class TeachersLivewire extends Component
{
    public array $teachers;

    public function mount(User $user)
    {
        $this->teachers = $user->where('role', 'teacher')
        ->get()
        ->toArray();
    }

    public function render()
    {
        return view('livewire.admin.teachers-livewire')->extends('layouts.app');
    }
}
