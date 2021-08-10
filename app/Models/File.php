<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'ext', 'size', 'user_id', 'url', 'created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    function get_size() {
        $sz = 'BKMGTP';
        $factor = floor((strlen($this->size) - 1) / 3);
        return number_format($this->size / pow(1024, $factor),2) . @$sz[$factor];
    }
}
