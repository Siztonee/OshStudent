<?php

namespace App\Livewire;

use App\Http\Requests\GradesRequest;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Collection;

class GradesLivewire extends Component
{
    public int $subjectId;
    public Collection $groups;
    public Collection $students;
    public Collection $grades;
    public array $months;
    public string $selectedMonth;


    public function mount()
    {
        $teacherId = auth()->id();
        $this->subjectId = Subject::where('name', auth()->user()->specialization)->value('id');
        $this->groups = Group::whereHas('schedules', fn($query) => $query->where('teacher_id', $teacherId))->get();

        $this->months = [
            'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль',
            'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
        ];

        $this->loadJournal();
    }


    public function loadJournal()
    {
        $this->selectedMonth = now()->month;

        $this->students = $this->groups->isNotEmpty()
            ? User::where('group_id', $this->groups->first()->id)
                ->orderBy('last_name')
                ->orderBy('first_name')
                ->get()
            : collect();

        $this->grades = Grade::where('month', $this->selectedMonth)
            ->where('year', now()->year)
            ->get()
            ->groupBy('student_id')
            ->map->keyBy('day');
    }


    public function render()
    {
        return view('livewire.grades-livewire')->extends('layouts.app');
    }
}
