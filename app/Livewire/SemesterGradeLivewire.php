<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Subject;
use Livewire\Component;
use App\Models\SemesterGrade;
use Illuminate\Support\Collection;


class SemesterGradeLivewire extends Component
{
    public int $subjectId;
    public Collection $groups;
    public Collection $students;
    public $grades;
    public int $selectedSemester;
    public int $selectedYear;
    public $selectedGroup;

    public function mount()
    {
        $teacherId = auth()->id();
        $this->subjectId = Subject::where('name', auth()->user()->specialization)->value('id');
        $this->groups = Group::whereHas('schedules', fn($query) => $query->where('teacher_id', $teacherId))->get();
        $this->selectedSemester = 1;
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

        $this->grades = SemesterGrade::where('semester', $this->selectedSemester)
            ->where('year', $this->selectedYear)
            ->where('subject_id', $this->subjectId)
            ->get()
            ->groupBy('student_id')
            ->collect();
    }

    public function updatedSelectedSemester($value)
    {
        $this->selectedSemester = $value ? $value : 1;
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
        return view('livewire.semester-grade-livewire')->extends('layouts.app');
    }
}
