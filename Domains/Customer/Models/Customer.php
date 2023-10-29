<?php

namespace Domains\Customer\Models;

use Domains\Customer\Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $casts = ['date_of_birth' => 'date:Y-m-d'];

    protected static function newFactory(): CustomerFactory
    {
        return CustomerFactory::new();
    }

}
