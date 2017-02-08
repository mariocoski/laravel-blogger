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
        // $admin = factory(App\Models\User::class)->create([
        //     'email' => 'admin@blogger.com',
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'display_name' => 'John Doe',
        //     'slug' => 'john-doe',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);
        // $admin->resolveRole(Role::admin()->id);

        $editor = factory(App\Models\User::class)->create([
            'email' => 'editor@blogger.com',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'slug' => 'jane-doe',
            'display_name' => 'Jane Doe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $editor->resolveRole(Role::editor()->id);

        $user = factory(App\Models\User::class)->create([
            'email' => 'user@blogger.com',
            'first_name' => 'Jack',
            'last_name' => 'Doe',
            'display_name' => 'Jack Doe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $user->resolveRole();

    }
}
