<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sessiontest extends Model
{
    use HasFactory;

    // Define the table name if it differs from the plural form of the model name
    protected $table = 'sessiontest';

    // Allow mass assignment for these fields
    protected $fillable = ['nickname', 'age', 'point'];
}
