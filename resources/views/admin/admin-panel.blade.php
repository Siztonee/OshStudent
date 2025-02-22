<div class="w-full p-6">
    <h2 class="text-3xl font-bold dark:text-gray-100 text-red-800 mb-6 text-center">Панель администратора</h2>
    <div class="space-y-2">
        <a href="{{ route('admins.groups') }}" class="flex items-center justify-start w-full p-4 dark:bg-gray-700 bg-white dark:text-gray-100 text-gray-800 border-2 border-gray-900 rounded-lg font-semibold transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="text-xl">Группы</span>
        </a>
        <a href="{{ route('admins.teachers') }}" class="flex items-center justify-start w-full p-4 dark:bg-gray-700 bg-white dark:text-gray-100 text-gray-800 border-2 border-gray-900 rounded-lg font-semibold transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span class="text-xl">Учителя</span>
        </a>
        <a href="{{ route('admins.students') }}" class="flex items-center justify-start w-full p-4 dark:bg-gray-700 bg-white dark:text-gray-100 text-gray-800 border-2 border-gray-900 rounded-lg font-semibold transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="text-xl">Студенты</span>
        </a>
        <!-- Здесь можно добавить дополнительные кнопки в будущем -->
    </div>
</div>
