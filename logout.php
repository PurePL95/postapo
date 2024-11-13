<?php
// logout.php
session_start();
session_unset(); // Usuwa wszystkie dane sesji
session_destroy(); // Zniszczenie sesji
header('Location: index.html'); // Przekierowanie na stronę powitalną
exit();
?>