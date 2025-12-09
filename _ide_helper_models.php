<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $nama
 * @property string $tipe
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Berita> $beritas
 * @property-read int|null $beritas_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Download> $downloads
 * @property-read int|null $downloads_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Galeri> $galeris
 * @property-read int|null $galeris_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AllKategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AllKategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AllKategori query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AllKategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AllKategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AllKategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AllKategori whereTipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AllKategori whereUpdatedAt($value)
 */
	class AllKategori extends \Eloquent {}
}

namespace App\Models{
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
	class Berita extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $judul
 * @property string|null $deskripsi
 * @property string|null $gambar
 * @property string $target_dana
 * @property string $dana_terkumpul
 * @property \Illuminate\Support\Carbon $batas_waktu
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Donatur> $donaturs
 * @property-read int|null $donaturs_count
 * @property-read mixed $days_left
 * @property-read mixed $status
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DonasiTransaksi> $transaksis
 * @property-read int|null $transaksis_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereBatasWaktu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereDanaTerkumpul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereTargetDana($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donasi whereUpdatedAt($value)
 */
	class Donasi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $donasi_id
 * @property int|null $user_id
 * @property string $jumlah
 * @property string|null $metode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Donasi $donasi
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi whereDonasiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi whereMetode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DonasiTransaksi whereUserId($value)
 */
	class DonasiTransaksi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $donasi_id
 * @property string $nama
 * @property float $jumlah
 * @property string|null $catatan
 * @property string|null $email
 * @property string|null $no_hp
 * @property string|null $metode_pembayaran
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Donasi $donasi
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereDonasiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereMetodePembayaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Donatur whereUpdatedAt($value)
 */
	class Donatur extends \Eloquent {}
}

namespace App\Models{
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
	class Download extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $judul
 * @property string $gambar
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Galeri whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Galeri extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $email
 * @property string $no_hp
 * @property string $nama
 * @property string $nisn
 * @property string $no_kk
 * @property string $nik
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $provinsi
 * @property string $kabupaten
 * @property string $kecamatan
 * @property string $kode_pos
 * @property string $detail_alamat
 * @property string $jenjang
 * @property string|null $program_tambahan
 * @property string|null $motivasi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereDetailAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereJenjang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereKodePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereMotivasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereNoKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereProgramTambahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereProvinsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Psb whereUpdatedAt($value)
 */
	class Psb extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

