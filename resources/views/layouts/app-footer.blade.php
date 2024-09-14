<footer class="{{ auth()->user() && auth()->user()->theme === 'dark' ? 'bg-gray-800' : 'bg-red-600' }} text-white mt-auto">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="mb-4 md:mb-0">&copy; siztone | {{ config('app.name') }}. Все права защищены.</p>
            <div class="space-x-4">
                <a href="#" class="hover:text-red-200">Политика конфиденциальности</a>
                <a href="#" class="hover:text-red-200">Условия использования</a>
            </div>
        </div>
    </div>
</footer>
