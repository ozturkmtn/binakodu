<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Yazdır</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    </style>
</head>
<body>
<?php
include 'header.php';
?>

    <div class="mx-auto" style="width: 350px;">
        <h1 class="py-5">Bina QR Kodu</h1>
        <div id="qrcode" class="mx-auto" style="width: 350px;"></div>

        <?php
        if (!empty($params['building']['id'])) {?>
        <div class="py-4">
            <div><strong>İl:</strong> <?=$params['building']['city']??'-';?></div>
            <div><strong>İlçe:</strong> <?=$params['building']['town']??'-';?></div>
            <div><strong>Mahalle:</strong> <?=$params['building']['neighbourhood']??'-';?></div>
            <div><strong>Cadde / Sokak:</strong> <?=$params['building']['street']??'-';?></div>
            <div><strong>Bina No:</strong> <?=$params['building']['building_no']??'-';?></div>
            <div><strong>Adres:</strong> <?=$params['building']['address']??'-';?></div>
            <div><strong>Kontrol Tarihi:</strong> <?=$binaKodu->dateFormat($params['building']['report_date']);?></div>
            <div><strong>Bina Durumu:</strong> <?=($params['building']['health_status'] === null) ? '-' : ( ($params['building']['health_status'] == 1)?'Sağlam':'Uygun Değil' );?></div>
            <div><strong>DASK Durumu:</strong> <?=($params['building']['dask_status'] === null) ? '-' : ( ($params['building']['dask_status'] == 1)?'Evet':'Hayır' );?></div>
        </div>
        <?php
        } else {
        ?>
        <div class="py-4">
            <span class="h4">Kayıt Bulunamadı</span>
        </div>
        <?php
        }
        ?>
    </div>
    <script type="text/javascript">

        $(function (){
            new QRCode(document.getElementById("qrcode"), "<?=BASE_URL ."building/". $params['building']['id']??'0';?>");
        });


    </script>
</body>

</html>
