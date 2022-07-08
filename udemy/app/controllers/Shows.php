<?php

// Shows Class

class Shows extends Controller
{
    public function index($id = null)
    {
        $show = new Show();
        $data['rows'] = $show->futureShows();
        $data ['title'] = "Shows Page";
        $data['row'] = $show->where(['id' => $id]);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $show->findAllLike($_POST);
            $this->view('shows', $data);
        }

        
        $this->view('shows', $data);
    }

}