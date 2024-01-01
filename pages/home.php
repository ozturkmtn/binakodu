<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Anasayfa</title>
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

    <style>
        h1 {
            text-align: center;
        }

        #reader {
            width: 500px;
        }

        .result {
            background-color: green;
            color: #fff;
            padding: 20px;
        }

        .row {
            display: flex;
            text-align: center;
            background-color: #efefef;
            margin-top: 3rem !important;
        }

        #reader__scan_region {
            background: white;
        }

    </style>
</head>
<body>
<?php //=$params['name']??'-';
include 'header.php';
?>

<!--<p style="padding:45px !important;">qrcode start</p>-->
<!--<div id="qrcode"></div>-->
<!--<p style="padding:45px !important;">qrcode ends</p>-->

<div class="row margi">
    <div class="col">
        <div style="padding:30px !important;">
            <button id="start_scan">QR Kod Oku</button>
            <button id="stop_scan">İptal</button>
        </div>
        <div id="reader" style="position: relative;margin: auto;"></div>

        <div class="" style="padding: 30px">
            <h4>QR Kodu Deşifresi</h4>
            <div id="scan_result">...</div>
        </div>
    </div>


</div>
<script type="text/javascript">
    // // Setting up Qr Scanner properties
    const html5QrCode = new Html5Qrcode("reader");
    const config = {fps: 10, qrbox: {width: 250, height: 250}};

    // // When scan is successful fucntion will produce data
    function onScanSuccess(qrCodeMessage,qrCodeResult) {

        $("#scan_result").html(qrCodeMessage);

        if (isValidUrl(qrCodeMessage)) {
            window.open(qrCodeMessage, '_self');
        }
    }
    // When scan is unsuccessful fucntion will produce error message
    // function onScanError(errorMessage) {
    //   // Handle Scan Error
    // }

    function isValidUrl(string) {
        try {
            if (string.search(window.location.href + 'building/') === -1) return false;
            new URL(string);
            return true;
        } catch (err) {
            return false;
        }
    }

    $(function () {
        $("#start_scan").on('click', function () {
            // If you want to prefer back camera
            html5QrCode.start({facingMode: "environment"}, config, onScanSuccess);
        });
        $("#stop_scan").on('click', function () {
            // If you want to prefer back camera
            html5QrCode.stop().then((ignore) => {
                // QR Code scanning is stopped.
                $("#scan_result").html('.._..');
            }).catch((err) => {
                // Stop failed, handle it.
            });
        });
    });
</script>
</body>

</html>