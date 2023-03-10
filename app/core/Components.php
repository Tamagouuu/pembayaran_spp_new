<?php


class Components
{
    public static function heading($title, $url = null)
    {
        if ($url) {
            return "
            <div class=\"mb-3\">
                <h1 class=\"h3 mb-2 text-gray-800 font-weight-bold\">{$title}</h1>
                <a href= " . BASEURL . '/dashboard' . $url . " class=\"btn btn-success btn-icon-split\">
                    <span class=\"icon text-white-50\">
                        <i class=\"fas fa-plus\"></i>
                    </span>
                    <span class=\"text\">Tambah Data</span>
                </a>
            </div>
        ";
        } else {
            return "
            <div class=\"mb-3\">
                <h1 class=\"h3 mb-2 text-gray-800 font-weight-bold\">{$title}</h1>
            </div>
        ";
        }
    }

    public static function deleteButton($url)
    {
        return '
        <form action=' . BASEURL . '/dashboard' . $url . ' class="d-inline" method="POST">
            <button type="submit" onclick="return confirm(`Yakin mau dihapus?`)" class="btn btn-danger btn-circle btn-sm">
                <i class="fas fa-trash"></i>
            </button>
        </form>
        ';
    }

    public static function editButton($url)
    {
        return '
        <a href=" ' . BASEURL . '/dashboard' . $url . '" class="btn btn-warning btn-circle btn-sm">
            <i class="fas fa-pencil-alt"></i>
        </a>
        ';
    }
}
