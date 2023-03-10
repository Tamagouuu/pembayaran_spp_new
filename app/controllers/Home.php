<?php

class Home extends Controller
{
    public function index()
    {
        echo $this->model('Kelas_model')->index();
    }
}
