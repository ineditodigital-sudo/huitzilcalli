<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['start_time', 'end_time', 'service_id', 'updated_at', 'deleted_at'];

    /**
     * The table associated with the model
     * 
     * @var string
     */
    protected $table = "schedules";

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

    public $relationships = array('Service');

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }


}
