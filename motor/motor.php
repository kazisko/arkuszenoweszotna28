<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
    <img src="motor.png" alt="motocykl" id="motor">
</head>
<body>
    <header>
        <h1>motocykle moja pasja</h1>
    </header>
    <main>
        <section id="lewo">
            <h2>gdzie pojechac?</h2>
            <dl>
                <?php
                $conn = mysqli_connect("localhost","root","","motory");                
                $q = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM wycieczki JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;";
                $zapytanie = mysqli_query($conn, $q);
                while($row = mysqli_fetch_array($zapytanie)){
                    echo"<dt>$row[0], rozpoczyna sie w $row[2], <a href='$row[3].jpg'>zobacz zdjecie</a></dt><dd>$row[1]</dd>"; 
                }
                ?>
            </dl>
        </section>
        <section id="prawo">
            <section id="prawogora">
                <h2>co kupic?</h2><br>
                <ol>
                    <li>Honda</li>
                    <li>yamaha</li>
                    <li>honda 2</li>
                    <li>honda 3</li>
                    <li>bmw</li>
                </ol>
            </section>
            <section id="prawodol">
                <h2>statystyki</h2>
                <p>Wpisanych wycieczek:<?php
                $q2 = "SELECT COUNT(*) FROM wycieczki;";
                $zapytanie2 = mysqli_query($conn,$q2);
                $row = mysqli_fetch_array($zapytanie2);
                echo $row[0];
                ?></p>
                <p>uzytkownikow forum: 200</p>
                <p>przeslanych zdjec: 1300</p>
            </section>
        </section>
    </main>
    <footer>
        strone wykonal skiba
    </footer>
</body>
</html>