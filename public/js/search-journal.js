document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input'); // Поле ввода
    const itemsContainer = document.getElementById('items-container'); // Контейнер с элементами
    const noResults = document.getElementById('no-results'); // Сообщение "Нет результатов"
    
    if (!searchInput || !itemsContainer || !noResults) return; // Проверяем, что элементы существуют

    const containerItems = itemsContainer.querySelectorAll('.container-item'); // Находим все элементы с классом `container-item`

    searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim(); // Получаем и обрабатываем строку запроса
        let hasVisibleItems = false; // Флаг, есть ли видимые элементы

        containerItems.forEach(item => {
            const textContent = item.textContent.toLowerCase(); // Получаем текст внутри элемента
            if (textContent.includes(query)) {
                item.style.display = ''; // Показываем элемент
                hasVisibleItems = true; // Ставим флаг, что есть видимые элементы
            } else {
                item.style.display = 'none'; // Скрываем элемент
            }
        });

        // Показываем или скрываем сообщение "Нет результатов"
        noResults.style.display = hasVisibleItems ? 'none' : 'block';
    });
});
