<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';

    protected $fillable = [
        'test_number',
        'virtual_ccu',
        'test_time',
        'success_rate',
        'error_rate',
        'max_tps',
        'request_per_minute',
        'total_request',
        'http_codes',
        'total_errors',
        'labels',
        'values',
    ];

    protected $casts = [
        'http_codes' => 'array',
        'total_errors' => 'array',
        'labels' => 'array',
        'values' => 'array',
    ];

    public static function storeData($data)
    {
        $data['labels'] = $data['labels'] ?? [];
        $data['values'] = $data['values'] ?? [];

        return static::create($data);
    }

    public function updateData($data)
    {
        $this->labels = $data['labels'] ?? [];
        $this->values = $data['values'] ?? [];

        $this->update($data);
    }
}