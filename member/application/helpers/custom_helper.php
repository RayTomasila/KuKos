<?php
if (!function_exists('formatDateIndonesian')) {
    function formatDateIndonesian($date) {
        $months = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $timestamp = strtotime($date);
        $day = date('d', $timestamp);
        $month = $months[(int) date('m', $timestamp)];
        $year = date('Y', $timestamp);

        return "$day $month $year";
    }
}
