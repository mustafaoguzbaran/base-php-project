<?php
use Mobar\Models\Settings;
use Mobar\Models\User;

//Bu değişken çalışılan dosyanın bulunduğu konumu gösterir. str_replace(değiştirilen kelime, değiştirilecek kelime, metnin tümü) parametreleri bu şekildedir.
$base_path = str_replace($_SERVER['DOCUMENT_ROOT'], null, dirname(__FILE__));
$fetchData = new Settings();
$user = new User();
session_start();
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
    <link href="public/assets/css/styles.css" rel="stylesheet" />
</head>
<body>
<?php ?>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="anasayfa"><?php echo $fetchData -> settingsFetch('logo') ?><?php if(isset($_SESSION['username']) == null){
            echo "";
                }else{
            echo "<b> BackOfffice</b>";
            } ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if(isset($_SESSION['username']) == null){?>
                    <li class="nav-item"><a class="nav-link" href="anasayfa">Anasayfa</a></li>;
                    <li class="nav-item"><a class="nav-link" href="login">Giriş Yap</a></li>;
                    <li class="nav-item"><a class="nav-link" href="register">kayıt Ol</a></li>;
                <?php }else{ ?>
                    <li class="nav-item"><a class="nav-link" href="backoffice">Genel Ayarlar</a></li>
                    <li class="nav-item"><a class="nav-link" href="add"">İçerik Ekle</a></li>
                    <li class="nav-item"><a class="nav-link" href="addcategory">Kategori Ekle</a></li>
                    <li class="nav-item"><a class="nav-link" href="contentlist">Eklenen İçerikleri Düzenle</a></li>
                    <li class="nav-item"><a class="nav-link" href="anasayfa"><?php if(isset($_SESSION['username']) == null){
                                echo "";
                            }else{
                                echo $_SESSION['username'];
                            } ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="?islem=cikis">Çıkış Yap</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder"><?php echo $fetchData ->settingsFetch('header_title') ?></h1>
            <p class="lead mb-0"><?php echo $fetchData ->settingsFetch('header_desc') ?></p>
        </div>
    </div>
</header>
<?php $user->logout() ?>
