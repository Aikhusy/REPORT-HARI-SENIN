<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilQuery extends Model
{
    use HasFactory;

    protected $table = 'get_query_table';

    protected $fillable = ['result_name', 'query_result'];
}
