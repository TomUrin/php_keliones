<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country as C;
use App\Models\Hotel as H;
use App\Models\User as U;


class Order extends Model
{
    use HasFactory;
    const STATUSES = [
        1 => 'Pending',
        2 => 'Approved',
        3 => 'Cancelled'
    ];

    public function country()
    {
        return $this->belongsTo(C::class, 'country_id', 'id');
    }
    public function hotel()
    {
        return $this->belongsTo(H::class, 'hotel_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(U::class, 'user_id', 'id');
    }
}
