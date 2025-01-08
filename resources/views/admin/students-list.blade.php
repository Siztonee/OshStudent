@extends('layouts.app')

@section('title') Список студентов @endsection

@section('content')
    <div class="dark:bg-gray-800 bg-gray-100">
        <div class="container mx-auto px-4 py-8">        
            <!-- Поиск и добавление преподавателя -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                    <input id="search-input" type="text" placeholder="Поиск преподавателя" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-600 dark:text-gray-200 dark:bg-gray-700">
                </div>
                <button class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-gray-200 font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i> Добавить студента
                </button>
            </div>
            
            <!-- Список преподавателей -->
            <div class="dark:bg-gray-700 bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full">
                    <thead>
                        <tr class="dark:bg-gray-600 bg-gray-200 dark:text-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">ФИО</th>
                            <th class="py-3 px-6 text-center">Действие</th>
                        </tr>
                    </thead>
                    <tbody id="items-container" class="dark:text-gray-200 text-gray-600 text-sm font-light">
                        @forelse ($students as $student)
                            <tr class="container-item border-b border-gray-200 dark:hover:bg-gray-600 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $student['id'] }}</td>
                                <td class="py-3 px-6 text-left">
                                    {{ $student['last_name'] .' '. $student['first_name'] .' '. $student['middle_name'] }}
                                </td> 
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <a href="{{ route('admins.students.info', $student['id']) }}" class="transform hover:text-green-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>   
                        @empty
                            <p>Пусто</p>
                        @endforelse
                    </tbody>
                </table>

                <p id="no-results" class="text-center dark:text-gray-100 text-gray-500 my-8 hidden">Нет результатов</p>

            </div>

            {{ $students->links() }}
        
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/search-journal.js') }}"></script>
@endpush