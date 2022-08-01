<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'Projects';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'leader','owner','deadline'];


    public function employee(){

        return $this->hasMany(Employee::class);
    }
}



