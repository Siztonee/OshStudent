<header class="dark:bg-gray-800 bg-red-600 text-white shadow-md mb-4">
    <nav class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center">
            <a href="/" class="text-2xl font-bold">{{ env('APP_NAME') }}</a>
            
            <button id="mobile-menu-button" class="sm:hidden flex items-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            @auth
                <ul class="hidden sm:flex sm:space-x-4">
                    <li><a href="/" class="hover:text-red-200">Главная</a></li>
                    @can('has-role', ['teacher', 'admin'])
                        <li><a href="{{ route('teachs.semester') }}" class="hover:text-red-200">Семестр</a></li>
                    @endcan

                    @can('has-role', ['student'])
                        <li><a href="#" class="hover:text-red-200">Семестр</a></li>
                        <li><a href="{{ route('health_check') }}" class="hover:text-red-200">Медосмотр</a></li>
                    @endcan
                    <li><a href="{{ route('schedule') }}" class="hover:text-red-200">Расписание</a></li>
                    <li><a href="{{ route('settings') }}" class="hover:text-red-200">Настройки</a></li>
                </ul>

                <ul id="mobile-menu" class="hidden absolute top-16 left-0 right-0 bg-red-600 dark:bg-gray-800 shadow-md">
                    <li><a href="/" class="block py-2 px-4 hover:bg-red-700 dark:hover:bg-gray-700">Главная</a></li>
                    @can('has-role', ['teacher', 'admin'])
                        <li><a href="{{ route('teachs.semester') }}" class="block py-2 px-4 hover:bg-red-700 dark:hover:bg-gray-700">Семестр</a></li>
                    @endcan

                    @can('has-role', ['student'])
                        <li><a href="#" class="block py-2 px-4 hover:bg-red-700 dark:hover:bg-gray-700">Семестр</a></li>
                        <li><a href="{{ route('health_check') }}" class="block py-2 px-4 hover:bg-red-700 dark:hover:bg-gray-700">Медосмотр</a></li>
                    @endcan
                    <li><a href="{{ route('schedule') }}" class="block py-2 px-4 hover:bg-red-700 dark:hover:bg-gray-700">Расписание</a></li>
                    <li><a href="{{ route('settings') }}" class="block py-2 px-4 hover:bg-red-700 dark:hover:bg-gray-700">Настройки</a></li>
                </ul>
            @endauth
        </div>
    </nav>
</header>
