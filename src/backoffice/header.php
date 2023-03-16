<?php
use Mobar\Models\Settings;
//Bu değişken çalışılan dosyanın bulunduğu konumu gösterir. str_replace(değiştirilen kelime, değiştirilecek kelime, metnin tümü) parametreleri bu şekildedir.
$base_path = str_replace($_SERVER['DOCUMENT_ROOT'], null, dirname(__FILE__));
require "../../vendor/autoload.php";
$protocol = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? "https" : "http";
$base_link = $protocol . "://" . $_SERVER['HTTP_HOST'] . $base_path;
$base_main = "http://" . $_SERVER['HTTP_HOST'] . "/PHP-myBLOG";
$fetchData = new Settings()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../web/ui/styles/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $base_link ?>"><?php echo $fetchData -> settingsFetch('logo'); ?><b>BackOffice</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_main ?>">Siteyi Görüntüle</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_link ?>">Genel Ayarlar</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_link . "/add.php" ?>">İçerik Ekle</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_link . "/addcategory.php" ?>">Kategori Ekle</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_link . "/contentlist.php" ?>">Eklenen İçerikleri Düzenle</a></li>
            </ul>
        </div>
    </div>
</nav>