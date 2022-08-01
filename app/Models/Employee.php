<?php
 
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','phone','address','job','birthday','teamleader'];



    /* add relation  */
    public function job()
    {
        return $this->belongsto(Job::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
 
