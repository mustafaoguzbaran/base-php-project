<?php
require_once "../database/conn.php";
//Update işlemi
if(isset($_POST['update-site'])){
    //Soldakiler headersettings tablosundaki sütun adın sağdakiler ise belirlediğimiz anahtarlarımız.
    $updateHeader = $conn -> prepare("UPDATE headersettings set
logo = :logo,
header_title = :header_title,
header_desc = :header_desc
where id = 1
");
    $kaydetUpdateHeader = $updateHeader -> execute(array(
        //Soldakiler anahtarlarımız sağdakiler ise formdan gelen verilerdir.
        'logo' => $_POST['logo'],
        'header_title' => $_POST['site_header_title'],
        'header_desc' => $_POST['site_header_desc']
    ));
}
if($kaydetUpdateHeader){
    Header("Location: http://localhost:8888/PHP-myBLOG/");
    exit;
}

?>