<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable = ['cabin_id', 'customer','phone_number', 'start', 'end', 'price', 'notes', 'deleted_at', 'full_day_discount', 'schedule_id'];

    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table = "reservations";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    
    public function cabin(): BelongsTo
    {
        return $this->belongsTo(Cabin::class, 'cabin_id');
    }
}
