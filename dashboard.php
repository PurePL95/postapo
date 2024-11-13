<?php
// dashboard.php
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.html'); // Jeśli nie jest zalogowany, przekierowanie na stronę logowania
    exit();
}

$username = $_SESSION['username']; // Pobranie nazwy użytkownika z sesji
?>

<!-- Strona po zalogowaniu -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona po zalogowaniu</title>
</head>
<body>
    <h1>Witaj, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Jesteś zalogowany do gry.</p>
    <a href="game_start.php">Zacznij grę</a>
    <a href="profile.php">Mój profil</a>
    <a href="logout.php">Wyloguj się</a>
</body>
</html>
