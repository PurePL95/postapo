<?php
session_start();

// Sprawdzamy, czy użytkownik jest zalogowany
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.html');
    exit();
}

// Połączenie z bazą danych
$conn = new mysqli('localhost', 'root', '', 'your_database');

if ($conn->connect_error) {
    die("Połączenie z bazą danych nieudane: " . $conn->connect_error);
}

// Pobieramy dane postaci użytkownika
$username = $_SESSION['username'];
$sql = "SELECT * FROM characters WHERE username = '$username'";
$result = $conn->query($sql);
$character = $result->fetch_assoc();

$conn->close();
?>

<!-- Strona Karty Postaci -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karta Postaci</title>
    <link rel="stylesheet" href="styles.css"> <!-- Dodaj style CSS -->
</head>
<body>
    <header>
        <h1>Witaj, <?php echo htmlspecialchars($username); ?>!</h1>
        <nav>
            <a href="character.php">Karta Postaci</a>
            <a href="world.php">Świat</a>
            <a href="logout.php">Wyloguj</a>
        </nav>
    </header>

    <section class="character-card">
        <h2>Karta Postaci</h2>
        <div class="avatar">
            <img src="<?php echo $character['avatar']; ?>" alt="Avatar Postaci">
        </div>
        <div class="stats">
            <h3>Statystyki:</h3>
            <ul>
                <li>Siła: <?php echo $character['strength']; ?></li>
                <li>Zręczność: <?php echo $character['agility']; ?></li>
                <li>Wytrzymałość: <?php echo $character['endurance']; ?></li>
            </ul>
        </div>
        <div class="inventory">
            <h3>Ekwipunek:</h3>
            <ul>
                <li>Broń: <?php echo $character['weapon']; ?></li>
                <li>Ochrona: <?php echo $character['armor']; ?></li>
                <li>Inne: <?php echo $character['other_items']; ?></li>
            </ul>
        </div>
        <div class="currency">
            <h3>Pieniądze:</h3>
            <p><?php echo $character['money']; ?> PLN</p>
        </div>
    </section>
</body>
</html>