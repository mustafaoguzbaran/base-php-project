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
            //Soldakiler anahtarlarımız sağdakiler ise formdan gelen verilerdir.
            $updateHeader->bindParam(':logo', $_POST['logo']);
            $updateHeader->bindParam(':header_title', $_POST['site_header_title']);
            $updateHeader->bindParam(':header_desc', $_POST['site_header_desc']);
            $updateHeader->bindParam(':side_title', $_POST['side_title']);
            $updateHeader->bindParam(':side_desc', $_POST['side_desc']);
            $kaydetUpdateHeader = $updateHeader->execute();
        }
        if (isset($kaydetUpdateHeader)) {
            Header("Location: backoffice" );
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