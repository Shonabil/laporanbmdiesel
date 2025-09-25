<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'repair_order_no',
        'customer',
        'unit_model',
        'qty',
        'location',
        'document_no',
        'document_date',
        'brand',
        'engine',
        'part_no_unit',
        'serial_no_unit',
        'warranty',
        'gambar',
        'comment', // 🔹
    ];


    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
    public function sections()
    {
        return $this->hasMany(ReportSection::class, 'report_id');
    }
}
