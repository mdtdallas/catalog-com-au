<?php

// Ajax Class

class Ajax extends Controller
{
    public function index()
    {

        $data['title'] = "Ajax Page";

        $this->view('ajax', $data);
    }

    public function show_edit($user_id = null, $id = null)
    {
        $data['title'] = 'Ajax';
        $sponsor = new Sponsor();
        $council = new Council();
        $show = new Show();
        $data['sponsors'] = $sponsor->findAll();
        $data['councils'] = $council->findAll();
        $data['row'] = $show->first(['user_id' => $user_id, 'id' => $id]);
        $this->view('admin/shows/edit/'.$user_id. '/'.$id, $data);
    }
}
