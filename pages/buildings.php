<?php

?>
<!DOCTYPE html>
<html>
<head>
<title>Binalar</title>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
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
<div class="w-75 mx-auto">
    <div class="row p-3">
        <div class="col-12 text-center h4">
            Bina Listesi
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover text-sm">
                <thead>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-1">İl</th>
                    <th class="col-1">İlçe</th>
                    <th class="col-5">Adres</th>
                    <th class="col-1">Kontrol Tarihi</th>
                    <th class="col-1">Bina Durumu</th>
                    <th class="col-1">DASK Durumu</th>
                    <th class="col-1"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($params['buildings'] as $building) {?>
                    <tr>
                        <td><?=$building['id']??'0';?></td>
                        <td><?=$building['city']??'';?></td>
                        <td><?=$building['town']??'';?></td>
                        <td>
                            <?='Mahalle : '.$building['neighbourhood'].'<br/>';?>
                            <?='Cadde : '.$building['street'].'<br/>';?>
                            <?='Bina No : '.$building['building_no'].'<br/>';?>
                            <?='Adres : '.$building['address'].'<br/>';?>
                        </td>
                        <td><?=$binaKodu->dateFormat($building['report_date']);?></td>
                        <td><?=($building['health_status'] === null) ? '' : ( ($building['health_status'] == 1)?'Sağlam':'Uygun Değil' );?></td>
                        <td><?=($building['dask_status'] === null) ? '' : ( ($building['dask_status'] == 1)?'Evet':'Hayır' );?></td>
                        <td class="align-middle text-center">
                            <div class="d-grid gap-2 d-md-block">
                                <a href="/print/<?=$building['id']??'0';?>" id="qrcode_print" data-id="<?=$building['id']??'0';?>" class="btn btn-xs btn-outline-primary">Detay / Yazdır</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>

    .btn-xs {
        padding: .25rem .25rem;
        font-size: .6rem;
    }
</style>
<script type="text/javascript">
$(()=> {});
</script>

</body>

</html>
