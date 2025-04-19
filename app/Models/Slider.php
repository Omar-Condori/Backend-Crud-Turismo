<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'imagen',
        'titulo',
        'descripcion',
        'orden',
        'enlace',
        'estado',
        'autoplay',
        'intervalo',
        'loop'
    ];

    /**
     * Los atributos que deben convertirse a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'estado' => 'boolean',
        'autoplay' => 'boolean',
        'loop' => 'boolean',
        'orden' => 'integer',
        'intervalo' => 'integer',
    ];
}