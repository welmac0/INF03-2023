<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <section class="baner1">
        <img src="zad5.png" alt="logo lotnisko">
    </section>
    <section class="baner2">
        <h1>Przyloty</h1>
    </section>
    <section class="baner3">
        <h3>Przydatne linki</h3>
        <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </section>
    <section class="glowny">
        <table>
            <tr>
                <td>Czas</td>
                <td>Kierunek</td>
                <td>Numer Rejsu</td>
                <td>Status</td>
            </tr>
            <!-- Skrypt 1 -->
            <?php
            $conn = mysqli_connect("localhost", "root", "", "egzamin");

            $query = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas;";
            $request = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_row($request)) {
                    echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>";
                }

            mysqli_close($conn);
            ?>
        </table>
    </section>
    <footer class="stopka1">
        <!-- Skrypt 2 -->
        <?php
            if (isset($_COOKIE['odwiedzenie'])) {
                echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
            } else {
                echo "<p><b>Dzien dobry! Strona lotniska uzywa ciasteczek</b></p>";
                setcookie('odwiedzenie', "odwiedzone", time()+7200);
            }
            ?>
    </footer>
    <footer class="stopka2">
        Autor: 04040801123
    </footer>
</body>
</html>