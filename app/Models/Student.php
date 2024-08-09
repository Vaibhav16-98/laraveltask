<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
       'name','class','admission_date','yearly_fees','class_teacher_id'
    ];

    public function teacher(){
        return $this->belongsTo(Tearcher::class , 'class_teacher_id');
    }
}
