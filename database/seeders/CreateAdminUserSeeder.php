<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Zaineb', 
            'email' => 'admin@gmail.com',
            'phone' => '50123321',
            'address' => 'Sahloul',
            'birthday' => '1992-08-04',
            'job_id' => '1',
            'password' => bcrypt('123456')
        ]);
      
        $role = Role::create(['name' => 'Rh']);
        $role->givePermissionTo('user-list','user-create','user-edit','user-delete');
        $user->givePermissionTo('user-list','user-create','user-edit','user-delete');
        $user->assignRole([$role->id]);
    }
}