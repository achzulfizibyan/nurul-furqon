<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $judul
 * @property string $file
 * @property int|null $kategori_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AllKategori|null $kategori
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Download extends Model
{
    protected $fillable = ['judul', 'file', 'kategori_id'];

    // Relasi ke AllKategori
    public function kategori()
    {
        return $this->belongsTo(AllKategori::class, 'kategori_id');
    }
}
