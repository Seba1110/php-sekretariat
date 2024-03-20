<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <div id="lewy">
        <h1>Akta Pracownicze</h1>
        <?php
        $conn = mysqli_connect("localhost","root", "", "baza");
        $zapytanie1 = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id=2;";
        $result = mysqli_query($conn,$zapytanie1);
        while($row = mysqli_fetch_array($result)){
            $rodo = ($row[5] == 1) ? 'podpisano' : 'niepodpisano';
            $badania = ($row[6] == 1) ? 'aktualne' : 'nieaktualne';

            echo "
            <h3>dane</h3>
            <p>$row[1] $row[2]</p>$rodo = ($row[5] == 1) ? 'podpisano' : 'niepodpisano';
            $badania = ($row[6] == 1) ? 'aktualne' : 'nieaktualne';
            <hr/>
            <h3>adres</h3>
            <p>$row[3]</p>
            <p>$row[4]</p>
            <hr/>
            <p>RODO: $rodo</p>
            <p>Badania: $badania</p>";
            
        }
        ?>
        <hr>
        <h3>Dokumenty pracownika</h3>
        <a href="cv.txt">Pobierz</a>
        <h1>Liczba zatrudnionych pracownikow</h1>
        <?php
            $conn = mysqli_connect("localhost","root", "", "baza");
            $zapytanie2 = "SELECT COUNT(*) FROM PRACOWNICY;";
            $result = mysqli_query($conn,$zapytanie2);
            $row = mysqli_fetch_array($result);
            echo "
                <p>$row[0]</p>
            ";
        ?>
    </div>
    
    <div id="prawy">
    
        <?php
        $zapytanie3 = "SELECT id,imie,nazwisko FROM pracownicy WHERE id=2;";
        $result = mysqli_query($conn,$zapytanie3);
        while($row = mysqli_fetch_array($result)){
            
            echo "<img src='$row[0].jpg' alt='pracownik'>
                  <h2>$row[1] $row[2]</h2>";
        }

        $zapytanie4 = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM pracownicy, stanowiska WHERE pracownicy.stanowiska_id = stanowiska.id AND pracownicy.id = 2;";
        $result2 = mysqli_query($conn, $zapytanie4);
        while ($row = mysqli_fetch_array($result2)) {
            echo "<h4>$row[1]</h4>
                  <h5>$row[2]</h5>";
        }

        mysqli_close($conn);
        ?>
        
    </div>
    <div id="stopka">
        Autorem aplikacji jest: 0000000000
        <ul>
            <li> Skontaktuj się</li>
            <li> Poznaj naszą firmę</li>
        </ul>
    </div>
</body>
</html>

