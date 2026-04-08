<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Amenitie extends Model
{
    use HasFactory;

    protected $fillable = ['cabin_id', 'title','specifications', 'icon', 'deleted_at'];

    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table = "amenities";

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

    /**
     * Get the cabins that owns the amenitie.
     */
    public function cabin(): BelongsTo
    {
        return $this->belongsTo(Cabin::class);
    }
}
