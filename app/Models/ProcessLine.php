<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessLine extends Model
{
    use HasFactory;
    protected $table = 'process_lines';
    protected $primaryKey = 'LineID';
    public $incrementing = false;
    protected $fillable = ['LineID', 'LaneName'];
    public $timestamps = false;
}
