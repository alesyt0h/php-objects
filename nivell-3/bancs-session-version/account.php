<?php

class Account {

    private float $balance;

    public function __construct(
        private int | string $compte,
        private string $nom,
        private string $cognoms,
        private float $saldoInicial
    ){
        session_start();
        $this->balance = (isset($_SESSION['balance'])) ? $_SESSION['balance'] : floatval($saldoInicial);
    }

    public function deposit($amount){
        
        if(!is_numeric($amount) || $amount <= 0){
            echo "<span class=\"e-text\">Debes de introducir algún valor!</span>";
            return;
        }
        
        if (!isset($_SESSION['balance'])){
            $_SESSION['balance'] = $this->balance + $amount;
        } else {
            $_SESSION['balance'] += $amount;
        }

        $this->balance = $_SESSION['balance'];
    }

    public function withdraw($amount){

        if(!is_numeric($amount) || $amount <= 0){
            echo "<span class=\"e-text\">Debes de introducir algún valor!</span>";
            return;
        } else if ($amount > $this->balance){
            echo "<span class=\"e-text\">No puedes retirar mas saldo del que tienes!</span>";
            return;
        }

        if (!isset($_SESSION['balance'])){
            $_SESSION['balance'] = $this->balance - $amount;
        } else {
            $_SESSION['balance'] -= $amount;
        }

        $this->balance = $_SESSION['balance'];
    }

    public function reset(){
        $_SESSION['balance'] = $this->saldoInicial;
        $this->balance = $_SESSION['balance'];
    }

    public function getName(){ return $this->nom; }
    public function getSurname(){ return $this->cognoms; }
    public function getAccNumber(){ return $this->compte; }
    public function getBalance(){ return number_format($this->balance, 0, ",", "."); }

}

$customer = new Account(123523, 'Juan Carlos','Rodríguez', 3000);

if (isset($_POST['deposit'])){
    $customer->deposit($_POST['deposit']);
} else if (isset($_POST['withdraw'])){
    $customer->withdraw($_POST['withdraw']);
}

if (isset($_GET['reset'])) {
    $customer->reset();
}

?>