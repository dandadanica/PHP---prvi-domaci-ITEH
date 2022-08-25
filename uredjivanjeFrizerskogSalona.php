<?php
include 'domen/FrizerskiSalon.php';

if (isset($_POST['frizerski_salon_naziv'])) {
    $frizerski_salon = new FrizerskiSalon();
    $frizerski_salon->setFrizerski_salon_naziv($_POST['frizerski_salon_naziv']);
    $frizerski_salon->save();
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
            $.get("kontroler.php", {auto_servis: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        ispis = '';
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<div class="blog_grid">' +
                                    '<p>' + podaci[i].frizerski_salon_naziv + '</p>' +
                                    '<ul class="links">' +
                                    '<li><button type="button" onclick="obrisi(' + podaci[i].frizerski_salon_id + ')" >Obrisi</button></li>' +
                                    '</ul>' +
                                    '</div>';
                        }
                        ;
                        $('#firme').html(ispis);
                    });


            function obrisi(id) {
                $.get('kontroler.php',
                    {obrisi: 'frizerski_salon', id: id})
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
                <h1 class="text-center" class="title-header"> Informacije o frizerskim salonima </h1>
                <a href="index.php">< Povratak na pocetnu</a>
            </section>
        </div>
    </div>

    <div class="container">
        <div id="content_left">
            <h1 class="text-center">Unos frizerskog salona</h1>

            <div class="box">

                <p>






                
                <form class="form-group"  action="" method="POST" name="unos" >
                    <p>Naziv frizerskog salona</p>
                    <input class="form-control" type="text" name="frizerski_salon_naziv" >
                    <p></p><br><br>
                    <button type="submit" class="form-control" class="btn btn-danger">Zapamti</button>
                </form>  





                </p>
            </div>
            <div class="row">
                <div class="col-md-8" id="firme">
                </div>
            </div>
        </div>
    </div>
    