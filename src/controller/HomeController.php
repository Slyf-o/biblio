<?php

class HomeController {
    private $twig;
    
    public function __construct($twig) {
        $this->twig = $twig;
    }
    
    public function index() {

        echo $this->twig->render('home.html.twig', [
            'title' => 'Boutique Pop-up lumineuse',
            'lang' => 'fr',
        ]);
    }
}