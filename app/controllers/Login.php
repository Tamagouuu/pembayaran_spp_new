<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('/auth/index');
    }

    public function auth()
    {
        $dataUser = null;
        if (!$dataUser = $this->model('Petugas_model')->getPetugasByUsername($_POST['username'])) {
            if (!$dataUser = $this->model('Siswa_model')->getSiswaByUsername($_POST['username'])) {
                Flasher::setFlash('Username tidak ditemukan', 'danger');
                Helper::redirect('/login');
            }
        }

        if (!password_verify($_POST['password'], $dataUser['password'])) {
            Flasher::setFlash('Password yang  dimasukkan salah', 'danger');
            Helper::redirect('/login');
        }

        $_SESSION['is_loggedin'] = true;
        $_SESSION['username'] = $dataUser['username'];
        $_SESSION['role'] = $dataUser['role'];
        $_SESSION['id'] = $dataUser['id'];

        if ($dataUser['role'] == 'siswa') {
            Helper::redirect('/home');
        } else {
            Helper::redirect('/dashboard');
        }
    }
}
