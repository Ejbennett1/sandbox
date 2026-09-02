<?php

class instrument {
    // class properties
    public string $name;
    public string $tuning;
    public string $cost = 100;

    // class methods
    public function play(): void
    {
        echo("The {$this->name} is playing. <br>");
    }

    public function showTuning (): void
    {
        echo("The {$this->name} is tuned to {$this->tuning}.<br>");
    }
}

$fiddle = new instrument();
$fiddle->name = "Fiddle";
$fiddle->tuning = "G-D-A-E";

// Create another instance of the instrument class
$guitar = new instrument();
$guitar ->name = "Lowden Guitar";
$guitar->tuning = "D-A-D-G-A-D";

//echo "The {$fiddle->name} is tuned to {$fiddle->tuning}.<br>";
//echo "The {$guitar->name} is tuned to {$guitar->tuning}.<br>";

$fiddle->play();
$fiddle->showTuning();
$guitar->play();
$guitar->showTuning();