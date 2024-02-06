<?php
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
        integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- <script src="./assets/js/qrcodejs/qrcode.js"></script> -->
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"
        type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.2.0/html5-qrcode.min.js"
        type="text/javascript"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="row p-2 no-print row-header" style="margin-top: 10px !important;;">
    <div class="col-12 text-center">

        <a href="/" class="btn btn-sm btn-outline-primary">Anasayfa</a>
        <?php
        if (isset($_SESSION) && isset($_SESSION["role"])) {
            ?>
            <a href="/buildings" class="btn btn-sm btn-outline-success">Bina Listesi</a>
            <?php
            if (isset($_SESSION["role"]) && $_SESSION["role"] == 'ADMIN') {
                ?>
                <a href="/new" class="btn btn-sm btn-outline-info">Yeni Bina Ekle</a>
                <?php
            }
            ?>
            <a href="/logout" class="btn btn-sm btn-outline-warning">Çıkış</a>
            <?php
        } else {
            ?>
            <a href="/login" class="btn btn-sm btn-outline-primary">Giriş</a>
            <?php
        }
        ?>
    </div>
</div>

<style type="text/css">
    @media print {
        .no-print, .no-print * {
            display: none !important;
        }
    }

    .row-header {
        display: flex;
        text-align: center;
        background-color: #efefef;
        margin-top: 3rem !important;
    }
</style>
