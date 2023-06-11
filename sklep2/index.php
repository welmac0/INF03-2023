<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section class="baner">
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </section>
    <section class="lewy">
        <h3>Ceny wybranych artykulow w hurtowni:</h3>
        <!-- skrypt 1 -->
        <table>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "sklep2");
        $conn->query('SET NAMES UTF8;');

        $zapytanie = "SELECT nazwa, cena FROM towary LIMIT 4";

        $query = mysqli_query($conn, $zapytanie);

        while ($row = mysqli_fetch_row($query)) {
            echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>";
        }

        mysqli_close($conn)
        ?>
        </table>
    </section>
    <section class="srodkowy">
        <h3>Ile beda kosztowac twoje zakupy?</h3>
        <form method="post">
            <label for="artykuly">
                wybierz artykul
            </label>
            <select name="artykuly" id="artykuly">
                <option value="Zeszyt 60 kartek">zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartki">zeszyt 32 kartki</option>
                <option value="Cyrkiel">cyrkiel</option>
                <option value="Linijka 30 cm">linijka 30 cm</option>
                <option value="Ekierka">ekiera</option>
                <option value="Linijka 50 cm">linijka 50 cm</option>
            </select> <br>
            <label for="liczba">liczba sztuk:</label><input type="number" name="liczba" id="liczba"> <br>
            <button type="submit">OBLICZ</button>
        </form>
        <!-- skrypt 2 -->
        <?php
        if (isset($_POST['artykuly']) && isset($_POST['liczba'])) {
            $artykul = $_POST['artykuly'];
            $liczba = $_POST['liczba'];
            $zapytanie = "SELECT cena FROM towary WHERE nazwa LIKE '" . $artykul ."';";
            $conn = mysqli_connect("localhost", "root", "", "sklep2");
            $conn->query('SET NAMES UTF8');
            $query = mysqli_query($conn, $zapytanie);
            $result = mysqli_fetch_row($query);
            $cena = $result[0];
            $odp = round($cena * $liczba, 1);
            echo 'cena: ' . $odp ;
            mysqli_close($conn);
        }
        ?>
    </section>
    <section class="prawy">
        <img src="zakupy2.png" alt="hurtownia">
        <h3>Kontakt</h3>
        <p>telefon: <br>
        111222333 <br>
    e-mail: <br>
<a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
    </section>
    <footer>
        <h4>Witryne wykonal 2348762318</h4>
    </footer>
</body>
</html>