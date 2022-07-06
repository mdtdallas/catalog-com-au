<?php

// Home Class

class Home extends Controller
{
    public function index()
    {
        $show = new Show();
        $data['rows'] = $show->futureShows();
        $data ['title'] = "Home Page";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $show->findAllLike($_POST);
            
            $this->view('shows', $data);
        }

        
        $this->view('home', $data);
    }

}