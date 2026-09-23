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

    public function description()
    {
        return "Common name: " . $this->commonName .
            "<br>Latin name: " . $this->latinName;
    }
}