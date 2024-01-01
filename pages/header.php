<?php
?>
<div class="row p-2 no-print row-header" style="margin-top: 10px !important;;">
    <div class="col-12 text-center">
        <a href="/" class="btn btn-sm btn-outline-primary">Anasayfa</a>
        <a href="/buildings" class="btn btn-sm btn-outline-success">Bina Listesi</a>
        <a href="/new" class="btn btn-sm btn-outline-info">Yeni Bina Ekle</a>
    </div>
</div>

<style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
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
