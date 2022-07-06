<?php

// Sexes Class

class Sexes extends Controller
{
    public function index()
    {
        
        $data ['title'] = "Sexes Page";
        
        $this->view('page', $data);
    }

}