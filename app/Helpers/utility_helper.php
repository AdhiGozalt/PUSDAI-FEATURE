<?php 
function alert() {
	if (session('error')) {
		echo '
		<div class="alert p-3 alert-danger">
			<b>Gagal</b> '.session('error').'
		</div>
		';
	}

	if (session('success')) {
		echo '
		<div class="alert p-3 alert-success">
			<b>Berhasil</b> '.session('success').'
		</div>
		';
	}
}

function format_date($date) {
    $month = array (
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode(' ', $date);
    $dateparts = explode('-', $split[0]);
    return $dateparts[2] . ' ' . $month[(int)$dateparts[1]] . ' ' . $dateparts[0];
}

function format_time($date) {
    $split = explode(' ', $date);
    $timeparts = explode(':', $split[1]);
    $hours = (int)$timeparts[0];
    $minutes = (int)$timeparts[1];
    $seconds = (int)$timeparts[2];
    
    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}