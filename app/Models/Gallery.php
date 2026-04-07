<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['cabin_id','route', 'size', 'width', 'height'];

    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table = "gallery";

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
        return $this->belongsTo(Cabin::class);
    }
}
