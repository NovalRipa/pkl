<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = ['nama','harga', 'total', 'deskripsi', 'cover'];

    //membuat relasi one to many dengan model "produk"
    public function produk()
    {
        //data Model 'destinasi' bisa dimiliki oleh Model 'Author'
        //melalui fk "produk-id"
        return $this->belongsTo('App\Models\produk', 'nama');
    }
    public function image()
    {
        if ($this->cover && file_exists(public_path('image/produk/' .$this->cover))){
            return asset('image/produk/' .$this->cover);
        } else {
            return asset('image/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('image/produk/' . $this->cover))) {
            return unlink(public_path('image/produk/' . $this->cover));
        }
    }
}
