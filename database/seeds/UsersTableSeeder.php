<?php
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'email' => 'admin@blogger.com',
            'password' => bcrypt('password'),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'display_name' => 'John Doe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $admin = User::findByEmail('admin@blogger.com');
        $admin->toggleRoles([Role::user(), Role::editor(), Role::admin()]);

        DB::table('users')->insert([
            'email' => 'editor@blogger.com',
            'password' => bcrypt('password'),
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'display_name' => 'Jane Doe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $editor = User::findByEmail('editor@blogger.com');
        $editor->toggleRoles([Role::user(), Role::editor()]);

        DB::table('users')->insert([
            'email' => 'user@blogger.com',
            'password' => bcrypt('password'),
            'first_name' => 'Jack',
            'last_name' => 'Doe',
            'display_name' => 'Jack Doe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $user = User::findByEmail('user@blogger.com');
        $user->toggleRoles([Role::user()]);
    }
}
