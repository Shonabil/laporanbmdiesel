<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportSection extends Model
{
    protected $fillable = ['report_id', 'comment', 'image'];

public function report()
{
    return $this->belongsTo(Report::class, 'report_id');
}

}
