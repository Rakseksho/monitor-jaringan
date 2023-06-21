<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Monitor Kecepatan Bandwidth</title>
    	<link rel="icon" type="image/x-icon" href="img/favicon.ico" />
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	    <script>
	        $(document).ready(function() {
	            function measureBandwidth() {
	                var startTime, endTime;

	                // Membuat permintaan ke server
	                $.ajax({
	                    url: 'bandwidth_monitor.php',
	                    type: 'GET',
	                    dataType: 'json',
	                    beforeSend: function() {
	                        startTime = new Date().getTime(); // Waktu awal
	                    },
	                    success: function(response) {
	                        endTime = new Date().getTime(); // Waktu akhir

	                        var timeInSeconds = (endTime - startTime) / 1000; // Waktu yang dibutuhkan dalam detik
	                        var speedInKbps = response.speed * 8 / 1024; // Kecepatan bandwidth dalam kilobita per detik

	                        // Menampilkan hasil kecepatan bandwidth
	                        $('#kecepatan').val(speedInKbps.toFixed(2) + ' Kbps');
	                        $('#waktu').val(timeInSeconds.toFixed(2) + ' detik');

	                        // Memanggil kembali fungsi untuk mengukur kembali setelah jeda 1 detik
	                        setTimeout(measureBandwidth, 1000);
	                    }
	                });
	            }

	            measureBandwidth(); // Memulai pemantauan kecepatan bandwidth
	        });
	    </script>
	</head>
	<body class="bg-secondary">
		<nav class="navbar bg-light">
			<div class="container">
				<a class="navbar-brand py-3 fs-5 fw-bold">
					<img src="img/favicon.ico" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
					Monitor Kecepatan Bandwidth
				</a>
			</div>
		</nav>
		<div class="container">
			<div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Monitor Menggunakan Google.com</h3></div>
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <input name="kecepatan" class="form-control" id="kecepatan" type="text" placeholder="Kecepatan" autocomplete="off" readonly />
                                <label for="kecepatan">Kecepatan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="waktu" class="form-control" id="waktu" type="text" placeholder="Waktu" readonly />
                                <label for="waktu">Waktu</label>
                            </div>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="d-flex align-items-center justify-content-between small">
	                            <div class="text-muted">Copyright &copy; Irfan Alfianur 2023</div>
	                            <div>
	                                <a href="#">Privacy Policy</a>
	                                &middot;
	                                <a href="#">Terms &amp; Conditions</a>
	                            </div>
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>

		<script src="js/bootstrap.js"></script>
	</body>
</html>