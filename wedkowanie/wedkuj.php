<!DOCTYPE html>
<!-- https://egzamin-informatyk.pl/arkusz-praktyczny-inf03-2022-06-01/ -->
<html lang="PL-pl">
<head>
    <meta charset="UTF-8">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div id="container">
    <div class="lewy">
        <div id="jeden">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol id="ol">
<?php
$conn = mysqli_connect("localhost", "root", "", "wedkowanie");
if (!$conn) {
die("Connection failed");
}
$sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;";
$result =  $conn->query($sql);

if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["nazwa"] . " pływa w rzece " . $row["akwen"] . "," . $row["wojewodztwo"] . "</li>";
        }
}
               ?>
            </ol>
        </div>
        <div id="dwa">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <thead>
                    <tr>
                        <td>L.p.</td>
                        <td>Gatunek</td>
                        <td>Występowanie</td>
                    </tr>
                    <?php
$conn = mysqli_connect("localhost", "root", "", "wedkowanie");
if (!$conn) {
die("Connection failed");
}
$sql = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
$result =  $conn->query($sql);

if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nazwa"] . "</td><td>" . $row["wystepowanie"] . "</td></tr>";
        }
}
               ?>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
    </div>  
    <div class="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt" download>Pobierz kwerendy</a>
    </div> 
    </div>
    
    
    <footer class="stopka"><p>Stronę wykonał: 001</p></footer>
</body>
</html>