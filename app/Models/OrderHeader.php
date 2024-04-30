<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderHeader extends Model
{
    use HasFactory;
    protected $table = 'orderheader';
    protected $primaryKey = 'OrderHeaderId';

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }
}
