<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name','status'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->name = htmlspecialchars($model->name);
        });
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'surveyId','id')->orderby('position');
    }

    public function getSurveyById($survey_id): Survey
    {
        $survey = $this->where('id',$survey_id)->firstorfail();
        return $survey;
    }
}
