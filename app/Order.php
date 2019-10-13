<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Order extends Model
{
    use HasStatuses;
    //
    const statuses=[
        1=>'下单',
        2=>'接单',
        3=>'发货',
        4=>'运送中',
        5=>'已送达'
    ];
    protected $fillable=[
        'orderNo','total','meta'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function getStatusKeyAttribute()
//    {
//        return array_search($this->status,self::statuses) ?? 0;
//
//    }

    public function getCnStatusAttribute()
    {
        return $this->status ? self::statuses[$this->status] : '尚未接单';

    }
}
