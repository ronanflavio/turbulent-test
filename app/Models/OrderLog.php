<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    use HasFactory;

    protected $table = 'johnnyorderlog';

    protected $casts = [
        'time_created' => 'datetime:Y-m-d H:i:s'
    ];

    public static function tableName()
    {
        return (new self())->getTable();
    }
}
