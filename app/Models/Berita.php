<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property int $id_berita
 * @property string $judul
 * @property string $slug
 * @property string $isi
 * @property string|null $gambar
 * @property bool $is_published
 * @property int|null $id_user
 * @property int|null $kategori_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AllKategori|null $kategori
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BeritaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereIdBerita($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Berita withoutTrashed()
 * @mixin \Eloquent
 */
class Berita extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'beritas';
    protected $primaryKey = 'id_berita';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'is_published',
        'id_user',
        'kategori_id', // tambahkan kategori_id
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul) . '-' . time();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke AllKategori
    public function kategori()
    {
        return $this->belongsTo(AllKategori::class, 'kategori_id');
    }
}
