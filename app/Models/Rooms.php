<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kamar',
        'harga',
        'tipe_kamar',
        'status',
        'status_kamar'
    ];
    protected $primaryKey = 'id';
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id');
    }
}
