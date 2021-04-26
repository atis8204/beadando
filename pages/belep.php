<?php
    if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
        try {
            // Kapcsolódás
            $dbh = new PDO('mysql:host=localhost;dbname=login', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // Felhsználó keresése
            $sqlSelect = "select id, csaladi, utonev from azonositas where username = :bejelentkezes and password = :jelszo";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            if($row) {
                $_SESSION['csn'] = $row['csaladi']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['felhasznalo'];
            }
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }
    else {
        header("Location: .");
    }
?>
