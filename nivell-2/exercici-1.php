<?php

class PokerDice {

    private $diceSides = array("AS", "K", "Q", "7", "8");
    private static $throws = 0;

    public function throw(){
        $this->shapeName( array_rand($this->diceSides, 1) );
        static::$throws += 1;
    }

    private function shapeName($key){
        echo "Shape is: " . $this->diceSides[$key] . "\r\n";
    }

    public static function getTotalThrows(){
        echo "Total throws: " . static::$throws;
    }

}

$dado1 = new PokerDice();
$dado1->throw();

$dado2 = new PokerDice();
$dado2->throw();

$dado3 = new PokerDice();
$dado3->throw();

$dado4 = new PokerDice();
$dado4->throw();

$dado5 = new PokerDice();
$dado5->throw();

PokerDice::getTotalThrows();

?>