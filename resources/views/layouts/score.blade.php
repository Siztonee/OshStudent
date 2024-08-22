<div class="p-8 md:w-1/2 flex items-center">
    <div class="w-full">
        <div class="flex justify-between"> <!-- Изменено на justify-between -->
            <div class="text-center">
                <div class="relative inline-block w-64 h-64">
                    @php
                        $averageGrade = 5;
                        $gradePercentage = ($averageGrade / 5) * 100;
                    @endphp
                    <svg class="w-full h-full" viewBox="0 0 36 36">
                        <path d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none"
                              stroke="#eee"
                              stroke-width="3"/>
                        <path d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none"
                              stroke="#4CAF50"
                              stroke-width="3"
                              stroke-dasharray="{{ $gradePercentage }}, 100"/>
                        <text x="18" y="20.35" class="text-sm font-bold" text-anchor="middle" fill="#4CAF50">{{ number_format($averageGrade, 1) }}</text>
                    </svg>
                </div>
                <p class="mt-4 text-lg font-medium">Средний балл</p>
            </div>
            <div class="text-center">
                <div class="relative inline-block w-64 h-64">
                    @php
                        $attendance = 35;
                    @endphp
                    <svg class="w-full h-full" viewBox="0 0 36 36">
                        <path d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none"
                              stroke="#eee"
                              stroke-width="3"/>
                        <path d="M18 2.0845
                                a 15.9155 15.9155 0 0 1 0 31.831
                                a 15.9155 15.9155 0 0 1 0 -31.831"
                              fill="none"
                              stroke="#2196F3"
                              stroke-width="3"
                              stroke-dasharray="{{ $attendance }}, 100"/>
                        <text x="18" y="20.35" class="text-sm font-bold" text-anchor="middle" fill="#2196F3">{{ $attendance }}%</text>
                    </svg>
                </div>
                <p class="mt-4 text-lg font-medium">Посещаемость</p>
            </div>
        </div>
    </div>
</div>
