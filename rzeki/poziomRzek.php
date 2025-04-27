<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <section id="headerlewo">
            <img src="obraz1.png" alt="Mapa Polski">
        </section>
        <section id="headerprawo">
            <h1>Rzeki w wojewodztwie dolnoslaskim</h1>
        </section>
    </header>
    <nav>
        <form action="poziomRzek.php" method="post">
            <label class="option">
                <input type="radio" name="wybor" value="wszystkie" checked>
                Wyszystkie
            </label>
            <label class="option">
                <input type="radio" name="wybor" value="ostrzegawczy">
                Ponad stan ostrzegawczy
            </label>
            <label class="option">
                <input type="radio" name="wybor" value="alarmowy">
                ponad stan alarmowy
            </label>
            <input type="submit" name="pokaż" value="pokaż">
        </form>

    </nav>
    <main>
        <section id="lewo">
            <h3>Stany na dzien 2022-05-05</h3><br>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "","rzeki");

                if(!isset($_POST['pokaż'])){
                    $query = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05'";
                    $zapytanie1 = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($zapytanie1)){
                        echo"<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        </tr>";
                    }
                }
                else{
                    switch($_POST['wybor']){
                        case "ostrzegawczy":
                            $query = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy JOIN pomiary on wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanOstrzegawczy;";
                            break;
                        case "alarmowy":
                            $query = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy JOIN pomiary on wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanAlarmowy;";
                            break;
                        default:
                            $query = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru='2022-05-05'";
                            break;
                    }       
                    $zapytanie1 = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($zapytanie1)){
                        echo"<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        </tr>";
                    }
                }
                ?>
            </table>
        </section>
        <section id="prawo">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzerzen o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach”</li>
            </ul>
            <h3>Średnie stany wód</h3>
            <a href="https://komunikaty.p">Dowiedz się więcej</a>
            <img src="obraz2.jpg" alt="Rzeka" id="obraz2">
        </section>
    </main>
    <footer>
        <p>strzone wykonal skiba</p>
    </footer>
</body>
</html>