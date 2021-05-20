<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_users
 * @property DateTime $date_start
 * @property DateTime $date_end
 * @property string $type
 * @property int $nb_night
 * @property int $nb_children
 * @property DateTime $payment_date
 * @property int $price
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
}