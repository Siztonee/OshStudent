<div class="p-4 md:p-8 w-full">
    <div class="w-full">
        <!-- Изменен gap и добавлен padding для предотвращения обрезки -->
        <div class="flex flex-col sm:flex-row justify-between gap-4 md:gap-2 px-2">
            <!-- Average Grade -->
            <div class="text-center flex-1">
                <!-- Скорректированы размеры графиков -->
                <div class="relative inline-block w-40 h-40 md:w-56 md:h-56">
                    @php
                        $averageGrade = 5;
                        $gradePercentage = ($averageGrade / 5) * 100;
                    @endphp
                    <svg class="w-full h-full" viewBox="0 0 36 36">
                        <path 
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#eee"
                            stroke-width="3"
                        />
                        <path 
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#4CAF50"
                            stroke-width="3"
                            stroke-dasharray="{{ $gradePercentage }}, 100"
                        />
                        <text 
                            x="18" 
                            y="20.35" 
                            class="text-sm font-bold" 
                            text-anchor="middle" 
                            fill="#4CAF50"
                        >{{ number_format($averageGrade, 1) }}</text>
                    </svg>
                </div>
                <p class="mt-2 md:mt-4 text-base md:text-lg font-medium">Средний балл</p>
            </div>
            
            <!-- Attendance -->
            <div class="text-center flex-1">
                <!-- Скорректированы размеры графиков -->
                <div class="relative inline-block w-40 h-40 md:w-56 md:h-56">
                    @php
                        $attendance = 35;
                    @endphp
                    <svg class="w-full h-full" viewBox="0 0 36 36">
                        <path 
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#eee"
                            stroke-width="3"
                        />
                        <path 
                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#2196F3"
                            stroke-width="3"
                            stroke-dasharray="{{ $attendance }}, 100"
                        />
                        <text 
                            x="18" 
                            y="20.35" 
                            class="text-sm font-bold" 
                            text-anchor="middle" 
                            fill="#2196F3"
                        >{{ $attendance }}%</text>
                    </svg>
                </div>
                <p class="mt-2 md:mt-4 text-base md:text-lg font-medium">Посещаемость</p>
            </div>
        </div>
    </div>
</div>