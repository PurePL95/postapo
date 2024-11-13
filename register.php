<?php
// Połączenie z bazą danych
$host = 'localhost';
$dbname = 'game_db';
$username = 'root';
$password = ''; // W zależności od konfiguracji

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  exit;
}

// Sprawdzenie, czy dane zostały przesłane
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Szyfrowanie hasła
  
  // Wstawienie użytkownika do bazy danych
  $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->execute([$username, $password]);
  
  echo "Rejestracja zakończona pomyślnie! <a href='index.html'>Zaloguj się</a>";
}
?>