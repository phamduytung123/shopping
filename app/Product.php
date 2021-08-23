<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // thuộc tính không được phép insert, không có gì là tất cả đc insert
    // fillable là field đc insert vào trong hệ thống
    protected $guarded;

    public function productImage() {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function tags() {
        /*  ts1: bảng liên kết,
            ts2: bảng trung gian
            ts3: khóa liên kết
            ts4: khóa liên kết
        */
        return $this
            ->belongsToMany(Tag::class,'product_tags','product_id','tag_id')
            ->withTimestamps();
    }
}
