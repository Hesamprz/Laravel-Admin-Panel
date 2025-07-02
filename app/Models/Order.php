<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'status', 'total_price'];    
    public function user()    {
        return $this->belongsTo(User::class);    }
    
=======
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];
>>>>>>> 78e72bb29cdbc01d296492136d2e3612c6e96224

}