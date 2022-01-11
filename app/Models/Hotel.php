<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property string $id
 * @property string $name
 * @property string $description
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotel';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    protected static function booted()
    {
        static::creating(function ($hotel) {
            $hotel->id = (string) Str::uuid();
        });
    }
}
