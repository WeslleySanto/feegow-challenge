<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'specialty_id',
        'professional_id',
        'name',
        'cpf',
        'birthdate',
        'date_time'
    ];
}