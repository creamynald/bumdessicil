<?php

if (!function_exists('formatRupiah')) {
    /**
     * Format number to Rupiah currency format without decimal points.
     *
     * @param float $amount
     * @return string
     */
    function formatRupiah($amount)
    {
        return 'Rp. ' . number_format($amount, 0, ',', '.');
    }
}
