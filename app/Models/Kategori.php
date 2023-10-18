<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rooms;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = [
        'nama_kategori',
        'status'
    ];
    protected $primaryKey = "id";
    public function Rooms()
    {
        return $this->hasMany(Rooms::class, 'id');
    }

}
