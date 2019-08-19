<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sound extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sounds';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'enabled',
        'title',
        'file',
        'sort_order',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'enabled'       => 'boolean',
        'title'         => 'string',
        'file'          => 'string',
        'sort_order'    => 'integer',
    ];

    /**
     * Define the date field.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Scope enabled sounds.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnabledSounds($query)
    {
        return $query->where('enabled', 1);
    }

    /**
     * Scope sorted sounds.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSortedSounds($query, $order = 'asc')
    {
        return $query->orderBy('sort_order', $order);
    }
}
