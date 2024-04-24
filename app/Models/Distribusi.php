<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    public function penerima()
    {
        return $this->belongsTo(Penerima::class, 'id_penerima');
    }
}
