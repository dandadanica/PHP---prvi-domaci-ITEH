<?php

class FrizerskiSalon {

    public $frizerski_salon_id = 0;
    public $frizerski_salon_naziv = '';

    public function getFrizerski_salon_id() {
        return $this->frizerski_salon_id;
    }

    public function getFrizerski_salon_naziv() {
        return $this->frizerski_salon_naziv;
    }

    public function setFrizerski_salon_id($frizerski_salon_id) {
        $this->frizerski_salon_id = $frizerski_salon_id;
    }

    public function setFrizerski_salon_naziv($frizerski_salon_naziv) {
        $this->frizerski_salon_naziv = $frizerski_salon_naziv;
    }

    public static function vratiSvePodatkeIzBaze() {
        include 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT * FROM frizerski_salon');
        $frizerskiSalonNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $frizerski_salon = new FrizerskiSalon();
            $frizerski_salon->setFrizerski_salon_id($red['frizerski_salon_id']);
            $frizerski_salon->setFrizerski_salon_naziv($red['frizerski_salon_naziv']);
            array_push($frizerskiSalonNiz, $frizerski_salon);
        }
        return $frizerskiSalonNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO frizerski_salon (frizerski_salon_naziv)
            VALUES ('$this->frizerski_salon_naziv')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($frizerski_salon_id) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM frizerski_salon WHERE frizerski_salon_id=' . $frizerski_salon_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

}

?>