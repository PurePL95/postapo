// Funkcja do przełączania formularzy
document.getElementById('login-btn').addEventListener('click', function() {
    // Ukrywa formularz rejestracji i pokazuje logowanie
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
});

document.getElementById('register-btn').addEventListener('click', function() {
    // Ukrywa formularz logowania i pokazuje rejestrację
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
});
