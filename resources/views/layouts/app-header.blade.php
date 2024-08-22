<header class="{{ auth()->user()->theme === 'dark' ? 'bg-gray-800' : 'bg-red-600' }} text-white shadow-md">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">{{ env('app_name') }}</a>
        <ul class="flex space-x-4">
            <li><a href="/" class="hover:text-red-200">Главная</a></li>
            @if(auth()->user()->role == 'teacher' || 'admin')
                <li><a href="{{ route('teachs.semester') }}" class="hover:text-red-200">Семестр</a></li>
            @else
                <li><a href="#" class="hover:text-red-200">Семестр</a></li>
            @endif
            @if(auth()->user()->role == 'student')
                <li><a href="{{ route('health_check') }}" class="hover:text-red-200">Медосмотр</a></li>
            @endif
            <li><a href="{{ route('schedule') }}" class="hover:text-red-200">Расписание</a></li>
            <li><a href="{{ route('settings') }}" class="hover:text-red-200">Настройки</a></li>
        </ul>
    </nav>
</header>
