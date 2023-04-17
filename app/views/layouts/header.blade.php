<!--Bu değişken çalışılan dosyanın bulunduğu konumu gösterir. str_replace(değiştirilen kelime, değiştirilecek kelime, metnin tümü) parametreleri bu şekildedir.-->
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
    <link href="{{PUBLIC_PATH}}/css/styles.css" rel="stylesheet" />
</head>
<body>
<?php $fetchSettings = new \Models\Settings(); ?>

        <!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><?php echo $fetchSettings->fetch()['logo'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if($_SESSION['username'] == false)
                    <li class="nav-item"><a class="nav-link" href="/">Anasayfa</a></li>;
                    <li class="nav-item"><a class="nav-link" href="/login">Giriş Yap</a></li>;
                    <li class="nav-item"><a class="nav-link" href="/register">kayıt Ol</a></li>;
                @else
                    <li class="nav-item"><a class="nav-link" href="/">Anasayfa</a></li>;
                    <li class="nav-item"><a class="nav-link" href="/backoffice/">Genel Ayarlar</a></li>
                    <li class="nav-item"><a class="nav-link" href="/backoffice/addpost">İçerik Ekle</a></li>
                    <li class="nav-item"><a class="nav-link" href="/backoffice/addcategory">Kategori Ekle</a></li>
                    <li class="nav-item"><a class="nav-link" href="/backoffice/editpost">Eklenen İçerikleri Düzenle</a></li>
                    <li class="nav-item"><a class="nav-link" href="/"><?php if($_SESSION['username'] == null) {echo "";}else{echo $_SESSION['username'];} ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="cikis">Çıkış Yap</a></li>
                @endif





            </ul>
        </div>
    </div>
</nav>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder"><?php echo $fetchSettings->fetch()['header_title'] ?></h1>
            <p class="lead mb-0"><?php echo $fetchSettings->fetch()['header_desc'] ?></p>
        </div>
    </div>
</header>
