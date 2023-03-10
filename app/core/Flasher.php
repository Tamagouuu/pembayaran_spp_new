<?php

class Flasher
{
    public static function setFlash($pesan, $type)
    {
        $_SESSION['flash'] = ['pesan' => $pesan, 'type' => $type];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show">
            <span> ' . $_SESSION['flash']['pesan'] . '</span>
            <button type="button" class="close" data-dismiss="alert">x</button>
            </div>';
            unset($_SESSION['flash']);
        }
    }
}
