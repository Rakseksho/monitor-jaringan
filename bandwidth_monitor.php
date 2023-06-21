<?php
function getBandwidthSpeed($length, $time) {
    $speed = $length / $time; // Kecepatan bandwidth dalam bytes per detik

    return $speed;
}

$url = 'http://www.google.com';// URL Google.com
$startTime = microtime(true); // Waktu awal

// Mengambil konten halaman Google.com
$content = file_get_contents($url);

// Menghitung panjang konten yang diunduh
$length = strlen($content);

// Menunda eksekusi selama 1 detik (opsional)
sleep(1);

$endTime = microtime(true); // Waktu akhir
$time = $endTime - $startTime; // Waktu yang dibutuhkan dalam detik

$speed = getBandwidthSpeed($length, $time);

// Mengirim hasil ke sisi klien sebagai respon JSON
$response = array('speed' => $speed);
header('Content-Type: application/json');
echo json_encode($response);
?>
