<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'title', 'description', 'image'];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}

