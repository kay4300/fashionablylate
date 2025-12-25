<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail',
    ];
    public static $rules = array(
            "last_name" => ["required", "string", "max:8"],
            "first_name" => ["required", "string", "max:8"],
            "gender" => ["required", "in:1,2,3"],
            "email" => ["required", "string", "email"],
            "tel1" => ["required", "string", "max:3"],
            "tel2" => ["required", "string", "max:4"],
            "tel3" => ["required", "string", "max:4"],
            "address" => ["required"],
            "building" => ["nullable", "string", "max:255"],
            "category_id" => ["required", 'exists:categories,id'],
            "detail" => ["required", "string", "max:120"],
    );
    public function getDetail()
    {
        $txt = 'ID:' . $this->id . ' ' . $this->last_name . ' ' . $this->first_name .' ' . $this->gender . ' ' . $this->email . ' ' . $this->tel1 . ' ' . $this->tel2 . ' ' . $this->tel3 . ' ' . $this->address . ' ' . $this->building . ' ' . $this->category_id . ' ' .$this->detail;
        return $txt;
    }
    public function book()
    {
        return $this->hasOne('App\Models\Book');
    }
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
