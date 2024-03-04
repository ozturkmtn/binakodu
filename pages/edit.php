<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Binalar</title>

    <style>

    </style>
</head>
<body>
<?php
include 'header.php';
?>

<div class="w-50 mx-auto">

    <div class="row p-3">
        <div class="col-12 text-center h4">
            Bina Bilgilerini Düzenle
        </div>
    </div>

    <?php
    if (!empty($params['building']['id'])) {?>
        <form class="row g-3 p-2 row-header" method="POST" action="/update">
            <input type="hidden" name="id" value="<?=$params['building']['id'];?>">
            <div class="col-md-6">
                <label for="city" class="form-label">Şehir</label>
                <input type="text" class="form-control" id="city" name="city" value="<?=$params['building']['city']??'-';?>" placeholder="Şehir">
            </div>
            <div class="col-md-6">
                <label for="town" class="form-label">İlçe</label>
                <input type="text" class="form-control" id="town" name="town" value="<?=$params['building']['town']??'-';?>" placeholder="İlçe">
            </div>
            <div class="col-md-6">
                <label for="neighbourhood" class="form-label">Mahalle</label>
                <input type="text" class="form-control" id="neighbourhood" name="neighbourhood" value="<?=$params['building']['neighbourhood']??'-';?>" placeholder="Mahalle">
            </div>
            <div class="col-md-6">
                <label for="street" class="form-label">Cadde</label>
                <input type="text" class="form-control" id="street" name="street" value="<?=$params['building']['street']??'-';?>" placeholder="Cadde">
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label">Adres</label>
                <input type="text" class="form-control" id="address" name="address" value="<?=$params['building']['address']??'-';?>" placeholder="Adres">
            </div>
            <div class="col-md-6">
                <label for="building_no" class="form-label">Bina No</label>
                <input type="text" class="form-control" id="building_no" name="building_no" value="<?=$params['building']['building_no']??'-';?>" placeholder="Bina No">
            </div>
            <div class="col-md-6">
                <label for="report_date" class="form-label">Kontrol Tarihi</label>
                <input type="text" class="form-control" id="report_date" name="report_date" value="<?=$binaKodu->dateFormat($params['building']['report_date']);?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="report_date" class="form-label">Müteahhit</label>
                <input type="text" class="form-control" id="contractor" name="contractor" value="<?=$params['building']['contractor']??'-';?>" placeholder="Müteahhit">
            </div>
            <div class="col-md-6">
                <label for="house_status" class="form-label">Ev Durumu</label>
                <select class="form-select" id="house_status" name="house_status">
                    <option>Seçiniz</option>
                    <option value="1" <?=$params['building']['house_status'] == 1 ? 'selected' : '';?>>Satılık</option>
                    <option value="2" <?=$params['building']['house_status'] == 2 ? 'selected' : '';?>>Kiralık</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="health_status" class="form-label">Bina Durumu</label>
                <select class="form-select" id="health_status" name="health_status">
                    <option>Seçiniz</option>
                    <option value="1" <?=$params['building']['health_status'] == 1 ? 'selected' : '';?>>Sağlam</option>
                    <option value="0" <?=$params['building']['health_status'] == 0 ? 'selected' : '';?>>Uygun Değil</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="dask_status" class="form-label">DASK Durumu</label>
                <select class="form-select" id="dask_status" name="dask_status">
                    <option>Seçiniz</option>
                    <option value="1" <?=$params['building']['dask_status'] == 1 ? 'selected' : '';?>>Evet</option>
                    <option value="0" <?=$params['building']['dask_status'] == 0 ? 'selected' : '';?>>Hayır</option>
                </select>
            </div>

            <div class="col-12 text-end pt-4">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
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

<style>
    .btn-xs {
        padding: .25rem .25rem;
        font-size: .6rem;
    }
</style>
<script type="text/javascript">
    $(() => {
        $( "#report_date" ).datepicker({
            dateFormat: 'dd/mm/yy'
        });

    });
</script>

</body>

</html>
