@section('title') Группы @endsection

<div class="min-h-screen bg-gray-100">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold mb-6">Список групп</h1>
            
            <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center mb-6 space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('admins.groups.create') }}" class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Добавить группу
                </a>
            </div>
            
            <div class="mb-6">
                <div class="relative">
                    <input type="text" id="search-input" placeholder="Поиск группы..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            
            <div id="groups-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($groups as $group)
                    @if ($group && $group['curator'] && $group['headman'])
                        <div class="group-item bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow">
                            <a href="{{ route('admins.group', $group['id']) }}">
                                <h3 class="text-lg font-semibold">{{ $group['name'] }}</h3>
                                <p class="text-sm text-gray-600">Куратор: {{ $group['curator']['first_name'] }}</p>
                                <p class="text-sm text-gray-600">Староста: {{ $group['headman']['first_name'] }}</p>
                                <p class="text-sm text-gray-600">Студентов: {{ count($group['users']) }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            
            <p id="no-results" class="text-center text-gray-500 mt-8 hidden">Группы не найдены</p>

        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/search-group.js') }}"></script>
@endpush