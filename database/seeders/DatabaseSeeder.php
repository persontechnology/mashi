<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $this->call(TipoCreditoSeeder::class);  
        
        foreach (['Admin','Socio'] as $nombreRol) {
            Role::updateOrCreate(['name'=>$nombreRol]);
        }

        $email_admin=config('app.email_admin');
        $password_admin=config('app.password_admin');
        $user=User::where('email',$email_admin)->first();
        if(!$user){
            $user=new User();
            $user->email=$email_admin;
            $user->password=Hash::make($password_admin);
            $user->email_verified_at=Carbon::now();
            $user->estado=true;
            $user->save();
        }
        $user->syncRoles(Role::all());
    }
}
