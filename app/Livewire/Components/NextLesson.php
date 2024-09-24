<?php

namespace App\Livewire\Components;

use Carbon\Carbon;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class NextLesson extends Component
{
    public array $nextLesson;
    public string $nextLessonName;

    public function mount()
    {
        $now = Carbon::now();
        $currentDayOfWeek = $now->dayOfWeek;
        $currentTime = $now->format('H:i:s');

        $nextLesson = Schedule::where('teacher_id', Auth::id())
            ->where(function ($query) use ($currentDayOfWeek, $currentTime) {
                $query->where('day_of_week', $currentDayOfWeek)
                    ->where('start_time', '>', $currentTime)
                    ->orWhere('day_of_week', '>', $currentDayOfWeek);
            })
            ->orderBy('day_of_week')
            ->orderBy('start_time')
            ->with(['subject', 'group'])
            ->first();

        $this->nextLesson = $nextLesson ? $nextLesson->toArray() : [];
        $this->nextLessonName = $nextLesson ? Subject::find($this->nextLesson['subject_id']) : '';
        $this->nextLesson['start_time'] = Carbon::parse($nextLesson['start_time'])->format('H:i');
        $this->nextLesson['end_time'] = Carbon::parse($nextLesson['end_time'])->format('H:i');   
    }

    public function render()
    {
        return view('livewire.components.next-lesson');
    }
}
