<header class="{{ auth()->user()->theme === 'dark' ? 'bg-gray-800' : 'bg-red-600' }} text-white shadow-md">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">{{ env('app_name') }}</a>
        <ul class="flex space-x-4">
            <li><a href="/" class="hover:text-red-200">Главная</a></li>
            <li><a href="#" class="hover:text-red-200">Семестр</a></li>
            <li><a href="{{ route('health_check') }}" class="hover:text-red-200">Медосмотр</a></li>
            <li><a href="{{ route('schedule') }}" class="hover:text-red-200">Расписание</a></li>
            <li><a href="{{ route('settings') }}" class="hover:text-red-200">Настройки</a></li>
        </ul>
    </nav>
</header>
