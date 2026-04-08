<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cabin extends Model
{
    use HasFactory;

    protected $fillable = ['name','description', 'capacity', 'color', 'precio1', 'precio2', 'entrada', 'salida', 'lat', 'lng', 'slug', 'active', 'deleted_at', 'service_id'];

    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table = "cabins";

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

    public $relationships = array('Amenitie', 'Gallery', 'Reservation', 'DisableDays');

    public function amenities(): HasMany{
        return $this->hasMany(Amenitie::class);
    }

    public function gallery(): HasMany{
        return $this->hasMany(Gallery::class);
    }
    
    public function reservations(): HasMany{
        return $this->hasMany(Reservation::class);
    }
    
    public function disableDays(): HasMany{
        return $this->hasMany(DisableDay::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

}
