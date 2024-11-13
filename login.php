<?php
// login.php
session_start(); // Rozpoczynamy sesję

// Sprawdzenie, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobranie danych z formularza
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Połączenie z bazą danych (przykład z MySQL)
    $conn = new mysqli('localhost', 'root', '', 'your_database');

    // Sprawdzanie połączenia
    if ($conn->connect_error) {
        die("Połączenie z bazą danych nieudane: " . $conn->connect_error);
    }

    // Zapytanie SQL w celu sprawdzenia loginu i hasła
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Użytkownik znalazł się w bazie danych, logowanie udane
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username; // Zapisz nazwę użytkownika w sesji
        header('Location: dashboard.php'); // Przekierowanie do strony po zalogowaniu
        exit();
    } else {
        echo "Błędna nazwa użytkownika lub hasło!";
    }
}
?>

<!-- Formularz logowania -->
<form method="post" action="login.php">
    <input type="text" name="username" placeholder="Nazwa użytkownika" required>
    <input type="password" name="password" placeholder="Hasło" required>
    <button type="submit">Zaloguj się</button>
</form>