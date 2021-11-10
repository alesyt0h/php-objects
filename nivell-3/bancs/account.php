<?php

class Account {

    public function __construct(
        private int | string $compte,
        private string $nom,
        private string $cognoms,
        private float $saldo
    ){ }

    public function deposit($amount){
        if(!is_numeric($amount) || $amount <= 0){
            echo "<span class=\"e-text\">Debes de introducir algún valor!</span>";
            return;
        }

        $this->saldo += $amount;
    }

    public function withdraw($amount){

        if(!is_numeric($amount) || $amount <= 0){
            echo "<span class=\"e-text\">Debes de introducir algún valor!</span>";
            return;
        } else if ($amount > $this->saldo){
            echo "<span class=\"e-text\">No puedes retirar mas saldo del que tienes!</span>";
            return;
        }

        $this->saldo -= $amount;
    }

    public function getName(){ return $this->nom; }
    public function getSurname(){ return $this->cognoms; }
    public function getAccNumber(){ return $this->compte; }
    public function getBalance(){ return number_format($this->saldo, 0, ",", "."); }

}

$customer = new Account(123523, 'Juan Carlos','Rodríguez', 3000);

if (isset($_POST['deposit'])){
    $customer->deposit($_POST['deposit']);
} else if (isset($_POST['withdraw'])){
    $customer->withdraw($_POST['withdraw']);
}

?>