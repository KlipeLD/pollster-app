<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title','questionId','value'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'questionId')->orderby('value') ;
    }

    public function getOptionById($option_id): Option
    {
        $option = $this->where('id',$option_id)->firstorfail();
        return $option;
    }
}
