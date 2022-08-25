<?php
include 'domen/FrizerskiSalon.php';
include 'domen/Usluga.php';

if (isset($_GET['frizerski_salon']) && $_GET['frizerski_salon'] == 'prikaz') {
    echo json_encode(FrizerskiSalon::vratiSvePodatkeIzBaze());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'prikaz') {
    echo json_encode(Usluga::vratiSvePodatkeIzBaze());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'pretraga') {
    if (isset($_GET['tekst'])) {
        echo json_encode(Usluga::vratiPoNazivu($_GET['tekst']));
    }
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'sortAsc') {
    echo json_encode(Usluga::sortAsc());
}

if (isset($_GET['usluga']) && $_GET['usluga'] == 'sortDesc') {
    echo json_encode(Usluga::sortDesc());
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'usluga') {
    if (Usluga::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'frizerski_salon') {
    if (FrizerskiSalon::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}


?>