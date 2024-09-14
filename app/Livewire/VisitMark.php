<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use App\Models\Subject;
use App\Models\Group;
use App\Models\User;
use App\Models\Mark;

class VisitMark extends Component
{
    public int $subjectId;
    public Collection $groups;
    public Collection $students;
    public Collection $marks;
    public array $months;
    public int $selectedMonth;
    public int $selectedYear;
    public $selectedGroup;


    public function mount()
    {
        $teacherId = auth()->id();
        $this->subjectId = Subject::where('name', auth()->user()->specialization)->value('id');
        $this->groups = Group::whereHas('schedules', fn($query) => $query->where('teacher_id', $teacherId))->get();

        $this->months = [
            1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь',
            7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'
        ];

        $this->selectedMonth = now()->month;
        $this->selectedYear = now()->year;
        $this->selectedGroup = $this->groups->isNotEmpty() ? $this->groups->first()->id : null;

        $this->loadJournal();
    }

    public function loadJournal()
    {
        $this->students = $this->selectedGroup
            ? User::where('group_id', $this->selectedGroup)
                ->orderBy('last_name')
                ->orderBy('first_name')
                ->get()
            : collect();

        $this->marks = Mark::where('month', $this->selectedMonth)
            ->where('year', $this->selectedYear)
            ->where('subject_id', $this->subjectId)
            ->get()
            ->groupBy('student_id')
            ->map->keyBy('day');
    }


    public function updatedSelectedMonth($value)
    {
        $this->selectedMonth = $value ? $value : now()->month;
        $this->loadJournal();
    }

    public function updatedSelectedYear($value)
    {
        $this->selectedYear = $value ? $value : now()->year;
        $this->loadJournal();

    }

    public function updatedSelectedGroup($value)
    {
        $this->selectedGroup = $value ? $value : $this->selectedGroup;
        $this->loadJournal();
    }


    public function render()
    {
        return view('livewire.visit-mark')->extends('layouts.app');
    }
}
