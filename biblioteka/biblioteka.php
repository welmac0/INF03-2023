<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="baner">
        <h2>Miejska Biblioteka Publiczna
w Książkowicach</h2>
    </section>
    <div class="lewy">
        <h3>W naszych zbiorach znajdziesz dziela nastepujacych autorow:</h3>
        <ul>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "biblioteka");

        $zapytanie = "SELECT imie, nazwisko FROM autorzy;";
        $query = mysqli_query($conn, $zapytanie);
        while ($row = mysqli_fetch_row($query)) {
            echo "<li>" . $row[0] . " " . $row[1] ."</li>";
        }

        mysqli_close($conn);
        ?>
        </ul>
    </div>
    <div class="srodkowy">
        <h3>Dodaj nowego czytelnika</h3>
        <form method="post">
            <label for="imie">imie</label><input type="text" name="imie" id="imie"><br>
            <label for="nazwisko">nazwisko</label><input type="text" name="nazwisko" id="nazwisko"><br>
            <label for="dataur">rok urodzenia</label><input type="number" name="dataur" id="dataur"><br>
            <button type="submit">DODAJ</button>
        </form>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "biblioteka");

        if(isset($_POST["imie"]) and $_POST["nazwisko"] && $_POST["dataur"] ) {
            echo "Czytelnik: " . $_POST["imie"] . " " . $_POST["nazwisko"] . " zostal dodany do bazy danych";
            $dwaLI = substr($_POST["imie"], 0, 2);
            $dwaLN = substr($_POST["nazwisko"], 0, 2);
            $dwaOR = substr($_POST["dataur"], 2, 2);
            $result = strtoupper($dwaLI . $dwaLN . $dwaOR);
            $imie = $_POST['imie'];
            $nazwisko = $_POST["nazwisko"];
            $zapytanie = "INSERT INTO czytelnicy(imie, nazwisko, kod) VALUES ('$imie', '$nazwisko', '$result');";
            //echo $zapytanie;
            mysqli_query($conn, $zapytanie);
        } else {
            echo '';
        }

        mysqli_close($conn);
        ?>
    </div>
    <div class="prawy">
        <img src="biblioteka.png" alt="ksiazki">
        <h4>ul. Czytelnicza 25 <br> 12-120 Ksiazkowice <br> tel.:123123123 <br> e-mail: <a href="mailto:biuro@biblioteka.pl"></a>biuro@biblioteka.pl</h4>
    </div>
    <footer>
        <p>Projekt strony: 012354372</p>
    </footer>
</body>
</html>