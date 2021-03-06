<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function sportsProjectile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\SportsProjectile');
    }

    public function muscleGroup(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\MuscleGroup');
    }

    public function muscles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\Muscle', 'exercises_muscles', 'exercise_id', 'muscle_id');
    }

    public function exercisesGroups(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\ExercisesGroup', 'exercises_group_exercises', 'exercise_id', 'exercise_group_id')
            ->withPivot('id', 'approaches', 'repetition', 'weight', 'order_ege');
    }
}
