<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog_date extends Model
{
    use HasFactory;

    protected $table = 'dog_date';

    protected $fillable = [
      'dog_id','age', 'image', 'weight', 'coeffcient', 'food',
    ];

    public function dog()
    {
      return $this->belongsTo(Dog::class, 'dog_id');
    }


}
