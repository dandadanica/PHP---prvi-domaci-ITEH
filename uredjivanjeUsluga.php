<?php

include 'domen/Usluga.php';

if (isset($_POST['usluga_naziv'])) {

    $usluga = new Usluga();
    $usluga->setUsluga_naziv($_POST['usluga_naziv']);
    $usluga->setUsluga_cena($_POST['usluga_cena']);
    $usluga->setUsluga_opis($_POST['usluga_opis']);
    $usluga->setFrizerski_salon_id($_POST['frizerski_salon_id']);


    $usluga->save();
}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Frizerski saloni</title>
        <meta charset="UTF-8">

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>


        <script src="//cdn.ckeditor.com/4.5.5/basic/ckeditor.js"></script>

        <script>
            $.get("kontroler.php", {usluga: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        ispis = '';
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<div class="blog_grid">' +
                                    '<p>' + podaci[i].usluga_naziv + ' - ' + podaci[i].usluga_opis + '</p>' +
                                    '<ul class="links">' +
                                    '<li><button type="button" onclick="obrisi(' + podaci[i].usluga_id + ')" >Obrisi</button></li>' +
                                    '</ul>' +
                                    '</div>';
                        }
                        ;
                        $('#firme').html(ispis);
                    });

            $.get("kontroler.php", {frizerski_salon: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<option  value=' + podaci[i].frizerski_salon_id + '>' + podaci[i].frizerski_salon_naziv + '</option>';
                        }
                        ;
                        $('#saloni').html(ispis);
                    });


            function obrisi(id) {
                $.get('kontroler.php',
                        {obrisi: 'usluga', id: id})
                        .done(function (data) {
                            if (data == 'OK') {
                                location.reload();
                            } else {
                                alert('Greska');
                            }
                        });
            }

        </script>

    <div class="about">
        <div class="container">
            <section class="title-section">
                <h1 class="text-center" class="title-header"> Informacije o uslugama </h1>
                <a href="index.php">< Povratak na pocetnu</a>
            </section>
        </div>
    </div>

    <div class="container">
        <div id="content_left">
            <h1 class="text-center">Unos usluga</h1>

            <div class="box">

                <p>
                <form class="form-group"  action="" method="POST" name="unos" >
                    <p>Naziv usluge</p>
                    <input class="form-control" type="text" name="usluga_naziv" >
                    <p>Salon u kome je dostupna usluga</p>
                    <select class="form-control" id="saloni" name="frizerski_salon_id">
                    </select>
                    <p>Opis</p>
                    <textarea name="usluga_opis"></textarea> 
                    <script>
                        CKEDITOR.replace('usluga_opis');
                    </script>
                    <p>Cena</p>
                    <input type="text" class="form-control" name="usluga_cena" >
                    <p></p><br><br>
                    <button type="submit" class="form-control" class="btn btn-danger">Zapamti</button>

                </form>             
                </p>
            </div>
            
            <div class="row">
                <div class="col-md-6" id="firme">
                </div>
            </div>
        </div>
    </div>

?>