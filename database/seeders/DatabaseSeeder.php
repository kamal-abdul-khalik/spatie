<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Role, Permission, User};
use Laravolt\Indonesia\Seeds\{CitiesSeeder, VillagesSeeder, DistrictsSeeder, ProvincesSeeder};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Dengan melakukan db:seed, maka seluruh data dalam database akan di hapus !')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Semua data dalam database terhapus.");
        }

        // Seed the default permissions
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        $this->command->info('Perizinan default di tambahkan.');

        // Confirm roles needed
        if ($this->command->confirm('Buat peran baru untuk pengguna, default peran adalah super admin dan penulis? [Y|N]', true)) {

            // Ask for roles from input
            $input_roles = $this->command->ask('Inputkan peran, pisahkan dengan simbol koma.', 'contoh:superadmin,penulis');

            // Explode roles
            $roles_array = explode(',', $input_roles);

            // add roles
            foreach ($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);

                if ($role->name == 'superadmin') {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('super admin telah memilik semua akses');
                } else {
                    // for others by default only read access
                    $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
                }

                // create one user for each role
                $this->createUser($role);
            }

            $this->command->info('Peran ' . $input_roles . ' sukses ditambahkan');
        } else {
            Role::firstOrCreate(['name' => 'penulis']);
            $this->command->info('Menambahkan peran default untuk peran penulis.');
        }

        $this->call([
            CategorySeeder::class,
            TagsSeeder::class,
        ]);
    }


    /**
     * Create a user with given role
     *
     * @param $role
     */
    private function createUser($role)
    {
        $user = User::factory()->create();
        $user->assignRole($role->name);

        if ($role->name == 'superadmin') {
            $this->command->info('Ini adalah informasi login dari super admin: ');
            $this->command->warn('Email: ' . $user->email);
            $this->command->warn('Username: ' . $user->username);
            $this->command->warn('Password: password');
        }
    }
}
