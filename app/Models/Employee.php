<?php
 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','password','phone','address','job','birthday','teamleader'];



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
 
