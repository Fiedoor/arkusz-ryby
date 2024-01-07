<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>

<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <main>
        <div id="lewy1">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');
                $q1 = "SELECT nazwa,akwen,wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id=lowisko.Ryby_id WHERE rodzaj=3;";
                $res1 = mysqli_query($conn, $q1);
                foreach ($res1 as $row) {
                    echo "<li>" . $row['nazwa'] . " pływa w rzece " . $row['akwen'] . ", " . $row['wojewodztwo'] . "</li>";
                }
                ?>
            </ol>
        </div>
        <div id="lewy2">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                $q2 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia=1;";
                $res2 = mysqli_query($conn, $q2);
                foreach ($res2 as $row) {
                    echo "<tr>";
                    foreach ($row as $r) {
                        echo "<td>" . $r . "</td>";
                    }
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
        <div id="prawy">
            <img src="ryba1.jpg" alt="Sum">
            <br>
            <a href="kwerendy.txt" download>Pobierz kwerendy</a>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: NR ARKUSZA</p>
    </footer>
</body>

</html>