document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('toggle-theme');
    const htmlElement = document.documentElement;

    // Определение темы из localStorage или системы
    const storedTheme = localStorage.getItem('theme');
    if (storedTheme) {
        htmlElement.classList.toggle('dark', storedTheme === 'dark');
    } else {
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        htmlElement.classList.toggle('dark', prefersDark);
        localStorage.setItem('theme', prefersDark ? 'dark' : 'light');
    }

    // Обработчик клика
    themeToggleButton.addEventListener('click', () => {
        if (htmlElement.classList.contains('dark')) {
            htmlElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            htmlElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
});
