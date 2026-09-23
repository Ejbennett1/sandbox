<?php

class Bird
{
    public $commonName;
    public $latinName;

    public function __construct($args = [])
    {
        $this->commonName = $args['commonName'] ?? '';
        $this->latinName = $args['latinName'] ?? '';
    }
}

$bird1 = new Bird([
    'commonName' => 'Acadian Flycatcher',
    'latinName' => 'Turdus migratorius'
]);

$bird2 = new Bird([
    'commonName' => 'Eastern Towhee',
    'latinName' => 'Pipilo erythrophthalmus'
]);

echo "Common name: " . $bird1->commonName;
echo "<br>";
echo "Latin name: " . $bird1->latinName;
echo "<br>";
echo "-------------------------------------";
echo "<br>";

echo "Common name: " . $bird2->commonName;
echo "<br>";
echo "Latin name: " . $bird2->latinName;