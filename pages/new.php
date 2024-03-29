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

    <?php
    if (isset($params['building'])) { ?>
        <div class="row p-3">
            <?php
            if (!empty($params['building']['id'])) { ?>
                <div class="alert alert-success ">Kaydedildi.</div>
                <?php
            } else {
                ?>
                <div class="alert alert-warning">Hata Oluştu.</div>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>

    <div class="row p-3">
        <div class="col-12 text-center h4">
            Yeni Bina Ekle
        </div>
    </div>

    <form class="row g-3 p-2 row-header" method="POST" action="">
        <div class="col-md-6">
            <label for="city" class="form-label">Şehir</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Şehir">
        </div>
        <div class="col-md-6">
            <label for="town" class="form-label">İlçe</label>
            <input type="text" class="form-control" id="town" name="town" placeholder="İlçe">
        </div>
        <div class="col-md-6">
            <label for="neighbourhood" class="form-label">Mahalle</label>
            <input type="text" class="form-control" id="neighbourhood" name="neighbourhood" placeholder="Mahalle">
        </div>
        <div class="col-md-6">
            <label for="street" class="form-label">Cadde</label>
            <input type="text" class="form-control" id="street" name="street" placeholder="Cadde">
        </div>
        <div class="col-md-12">
            <label for="address" class="form-label">Adres</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Adres">
        </div>
        <div class="col-md-6">
            <label for="building_no" class="form-label">Bina No</label>
            <input type="text" class="form-control" id="building_no" name="building_no" placeholder="Bina No">
        </div>
        <div class="col-md-6">
            <label for="report_date" class="form-label">Kontrol Tarihi</label>
            <input type="text" class="form-control" id="report_date" name="report_date" readonly>
        </div>
        <div class="col-md-6">
            <label for="report_date" class="form-label">Müteahhit</label>
            <input type="text" class="form-control" id="contractor" name="contractor" placeholder="Müteahhit">
        </div>
        <div class="col-md-6">
            <label for="house_status" class="form-label">Ev Durumu</label>
            <select class="form-select" id="house_status" name="house_status">
                <option>Seçiniz</option>
                <option value="1" selected>Satılık</option>
                <option value="2">Kiralık</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="health_status" class="form-label">Bina Durumu</label>
            <select class="form-select" id="health_status" name="health_status">
                <option>Seçiniz</option>
                <option value="1" selected>Sağlam</option>
                <option value="0">Uygun Değil</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="dask_status" class="form-label">DASK Durumu</label>
            <select class="form-select" id="dask_status" name="dask_status">
                <option>Seçiniz</option>
                <option value="1" selected>Evet</option>
                <option value="0">Hayır</option>
            </select>
        </div>

        <div class="col-12 text-end pt-4">
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div>
    </form>

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
