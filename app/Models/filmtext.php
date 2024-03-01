<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filmtext extends Model
{

    use HasFactory;

    protected $primaryKey = 'film_id';

    protected $fillable = [
        'film_id',
        'description',
    ];


    public function film_text_to_film()
    {
        return $this ->hasOne(film::class);
    }

}
