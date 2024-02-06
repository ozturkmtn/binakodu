<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Yazdır</title>

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
