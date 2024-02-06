<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Giriş</title>

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
            Giriş
        </div>
    </div>

    <form class="row g-3 p-2 row-header" method="POST" action="">
        <div class="col-md-6">
            <label for="city" class="form-label">Kullanıcı Adı</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı Adı" required>
        </div>
        <div class="col-md-6">
            <label for="town" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Şifre" required>
        </div>

        <div class="col-12 text-end pt-4">
            <button type="submit" class="btn btn-primary">Giriş</button>
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
