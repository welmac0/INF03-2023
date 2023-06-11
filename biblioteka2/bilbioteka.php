<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="baner">
        <h2>Miejska Biblioteka Publiczna w Ksiazkowicach</h2>
    </section>
    <section class="lewy">
        <h2>Dodaj czytelnika</h2>
        <form method="post">
            imie: <input type="text" name="imie" id="imie"><br>
            nazwisko: <input type="text" name="nazwisko" id="nazwisko"><br>
            rok urodzenia: <input type="number" name="rok" id="rok">
            <button type="submit">DODAJ</button>
        </form>
        <!-- Skrypt 1 -->
        <?php
        $conn = mysqli_connect("localhost", "root", "", "biblioteka2");
        $conn->query('SET NAMES UTF8');
        if (isset($_POST['imie']) and isset($_POST['nazwisko']) and isset($_POST['rok'])) {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            echo 'Czytelnik ' . $imie . ' ' . $nazwisko . ' zostal dodany do bazy';
            $rok = $_POST['rok'];
            $kod = substr($imie, 0, 2) . substr($rok, 2, 2) . substr($nazwisko, 0, 2);
            $kod = strtolower($kod);
            $zapytanie = "INSERT INTO czytelnicy (imie, nazwisko, kod) VALUES ('" . $imie . "', '" . $nazwisko ."', '" . $kod . "');";
            $query = mysqli_query($conn, $zapytanie);
        }
        mysqli_close($conn);
        ?>
        
    </section>
    <section class="srodkowy">
        <img src="biblioteka.png" alt="biblioteka">
        <h4>
            ul. Czytelnicza 25 <br>
            12-120 Ksiazkowice <br>
            tel.: 123123123 <br>
            e-mail: <a href="mailto:biuro@bib.pl">biuro@bib.pl</a>
        </h4>
    </section>
    <section class="prawy">
        <h3>Nasi czytelnicy</h3>
        <ul>
            <!-- skrypt 2 -->
        <?php
        $conn = mysqli_connect("localhost", "root", "", "biblioteka2");
        $zapytanie = "SELECT imie, nazwisko FROM czytelnicy;";
        $query = mysqli_query($conn, $zapytanie);
        while ($row = mysqli_fetch_row($query)) {
            echo "<li>" . $row[0] . " " . $row[1] ."</li>";
        }
        mysqli_close($conn);
        ?>
        </ul>
    </section>
    <footer>
        <p>Projekt witryny: 2842351762</p>
    </footer>
</body>
</html>