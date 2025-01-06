<div class="dark:bg-gray-800 bg-white p-6 mb-8">
    <h3 class="text-2xl font-semibold dark:text-gray-100 text-red-600 mb-4">Следующий урок:</h3>
    <div class="dark:bg-gray-700 bg-red-50 border-l-4 dark:border-gray-400 border-red-500 p-4 rounded">
        <div class="flex items-center mb-2 dark:text-gray-300 text-red-700 ">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-lg font-semibold">{{ $nextLesson['start_time']. ' - ' .$nextLesson['end_time'] }}</span>
        </div>
        <h4 class="text-xl font-bold text-gray-800 dark:text-gray-300 mb-1">{{ $nextLesson['subject']['name'] }}</h4>
        <p class="text-gray-600 dark:text-gray-300 mb-2">Группа: {{ $nextLesson['group']['name'] }}</p>
        <div class="flex items-center">
            <svg class="w-5 h-5 dark:text-gray-300 text-red-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <span class="text-gray-700 dark:text-gray-300">Аудитория: {{ $nextLesson['room'] }}</span>
        </div>
    </div>
</div>
