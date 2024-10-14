@section('title') Информация о группе @endsection

<div class="min-h-screen bg-gray-100">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('admins.groups') }}" class="inline-flex items-center text-blue-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Назад к списку
                </a>
                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    Удалить группу
                </button>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h1 class="text-2xl font-bold mb-4">{{ $group['name'] }}</h1>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Куратор</h3>
                        <p class="text-gray-600">{{ $group['curator']['first_name'] ?? 'Отсуствует' }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Староста</h3>
                        <p class="text-gray-600">{{ $group['headman']['first_name'] ?? 'Отсуствует' }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Рейтинг</h3>
                        <p class="text-gray-600">{{ $group['total_score'] }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Курс</h3>
                        <p class="text-gray-600">{{ $group['course'] }}</p>
                    </div>
                </div>
                
                <h2 class="text-xl font-bold mb-4">Список студентов</h2>
                <div class="space-y-4">
                    @forelse ($students as $student)
                        <div class="bg-gray-100 rounded-lg p-4 flex justify-between items-center">
                            <h3 class="text-lg font-semibold">{{ $student['last_name'] .' '. $student['first_name'] }}</h3>
                            <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    @empty
                        <p>Пусто</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>