<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'sales';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PAYMENT_METHOD_SELECT = [
        'cash' => 'cash',
        'upi'  => 'upi',
    ];

    protected $fillable = [
    'client_name_id',
    'catergory_name_id',
    'product_id',      // foreign key
    'product_name',    // optional snapshot
    'price',
    'quantity',
    'total_amount',
    'sub_total',
    'discount',
    'tax_rate',
    'total_payable',
    'amount_payable',
    'payment_method',
    'created_at',
    'updated_at',
    'deleted_at',
];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function client_name()
    {
        return $this->belongsTo(Client::class, 'client_name_id');
    }

    public function catergory_name()
    {
        return $this->belongsTo(Category::class, 'catergory_name_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_name'); // rename column to 'product_id' ideally
    }
}
