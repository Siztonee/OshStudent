@extends('layouts.app')

@section('title') Список преподавателей @endsection

@section('content')
    <div class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">        
            <!-- Поиск и добавление преподавателя -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                <div class="w-full sm:w-1/2 mb-4 sm:mb-0">
                    <input type="text" placeholder="Поиск преподавателя" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-gray-200 font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i> Добавить преподавателя
                </button>
            </div>
            
            <!-- Список преподавателей -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">№</th>
                            <th class="py-3 px-6 text-left">ФИО</th>
                            <th class="py-3 px-6 text-center">Действие</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($teachers as $index => $teacher)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="py-3 px-6 text-left">
                                    {{ $teacher['last_name'] .' '. $teacher['first_name'] .' '. $teacher['middle_name'] }}
                                </td> 
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <a href="{{ route('admins.teachers.info', $teacher['id']) }}" class="transform hover:text-green-500 hover:scale-110">
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
            </div>

            {{ $teachers->links() }}

        </div>
    </div>
@endsection