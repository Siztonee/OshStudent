document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');

    toggleButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
});
