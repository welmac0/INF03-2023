<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h3>Portal Społecznościowy - panel administratora</h3>
    </header>
    <div class="container">
        <div class="lewy">
            <h4>Uzytkownicy</h4>
<?php
$conn = mysqli_connect("localhost", "root", "", "dane4");
$conn->query("SET NAMES UTF8");
if (!$conn) {
    die("Connection failed");
}

$sql = "SELECT id, imie, nazwisko, rok_urodzenia, opis, zdjecie FROM osoby LIMIT 30;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $wiek = 2023 - $row["rok_urodzenia"];
        echo $row["id"] . ". " . $row["imie"] . " " . $row["nazwisko"] . ", " . $wiek . "<br>";
    }
}
?>
            <a href="settings.html">Inne ustawienia</a>
        </div>
        <div class="prawy">
            <h4>Podaj id uzytkownika</h4>
            <form method="post">
                <input type="number" name="number" id="">
                <button type="submit">ZOBACZ</button>
            </form>
            <hr>
            <?php
$conn = mysqli_connect("localhost", "root", "", "dane4");
$conn->query('SET NAMES UTF8');

if (!$conn) {
    die("Connection failed");
}

if (isset($_POST["number"])) {
    $number = $_POST["number"];
} else {
    $number = 1;
}

$sql = "SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, hobby.nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id = " . $number;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>{$row['imie']} {$row['nazwisko']}</h2><br>
        <img src=./{$row['zdjecie']}><br>
        Rok urodzenia: {$row['rok_urodzenia']} <br>
        Opis: {$row['opis']} <br>
        Hobby: {$row['nazwa']}
        ";
    }
}
?>
        </div>
    </div>
    <footer>
        Strone wykonal: 003
    </footer>
</body>
</html>