<?php

namespace Mobar\Models;

use Mobar\Database\Connection;

class Settings extends Connection
{
    public function siteSettings()
    {
        global $conn;
//Update işlemi
        if (isset($_POST['update-site'])) {
            //Soldakiler headersettings tablosundaki sütun adın sağdakiler ise belirlediğimiz anahtarlarımız.
            $updateHeader = $this->conn->prepare("UPDATE sitesettings set
            logo = :logo,
            header_title = :header_title,
            header_desc = :header_desc,
            side_title = :side_title,
            side_desc = :side_desc
            where id = 1
");
            $kaydetUpdateHeader = $updateHeader->execute(array(
                //Soldakiler anahtarlarımız sağdakiler ise formdan gelen verilerdir.
                'logo' => $_POST['logo'],
                'header_title' => $_POST['site_header_title'],
                'header_desc' => $_POST['site_header_desc'],
                'side_title' => $_POST['side_title'],
                'side_desc' => $_POST['side_desc']
            ));
        }
        if (isset($kaydetUpdateHeader)) {
            Header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    public function settingsFetch($fetchDatabase)
    {
        $fetch = $this->conn->prepare(
            "SELECT * FROM sitesettings"
        );
        $fetch->execute();
        $fetchSettings = $fetch->fetch(\PDO::FETCH_ASSOC);
        return $fetchSettings[$fetchDatabase];

    }
}