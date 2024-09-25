document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const groupsContainer = document.getElementById('groups-container');
    const groupItems = groupsContainer.getElementsByClassName('group-item');
    const noResults = document.getElementById('no-results');

    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        let visibleCount = 0;

        Array.from(groupItems).forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(query)) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            noResults.style.display = 'block';
            groupsContainer.style.display = 'none';
        } else {
            noResults.style.display = 'none';
            groupsContainer.style.display = 'grid';
        }
    });
});