<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit artikel']);
        Permission::create(['name' => 'hapus artikel']);
        Permission::create(['name' => 'publish artikel']);
        //Permission::create(['name' => 'edit private artikel']);
        Permission::create(['name' => 'edit artikel lain']);
        Permission::create(['name' => 'hapus artikel lain']);
        //Permission::create(['name' => 'publish artikel lain']);
        Permission::create(['name' => 'manage laman']);
        Permission::create(['name' => 'manage kategori']);
        Permission::create(['name' => 'manage tags']);
        Permission::create(['name' => 'manage sliders']);
        Permission::create(['name' => 'manage media']);
        Permission::create(['name' => 'manage menu']);
        Permission::create(['name' => 'manage pengaturan']);
        Permission::create(['name' => 'manage pengguna']);
        Permission::create(['name' => 'manage permission']);
        Permission::create(['name' => 'upload files']);
        Permission::create(['name' => 'manage galeri foto']);
        Permission::create(['name' => 'baca']);

        //$role = Role::create(['name' => 'Super Admin']);
        $role = Role::create(['name' => 'Administrator']);
        $role->givePermissionTo('edit artikel');
        $role->givePermissionTo('hapus artikel');
        $role->givePermissionTo('publish artikel');
        $role->givePermissionTo('edit artikel lain');
        $role->givePermissionTo('hapus artikel lain');
        $role->givePermissionTo('manage laman');
        $role->givePermissionTo('manage kategori');
        $role->givePermissionTo('manage tags');
        $role->givePermissionTo('manage sliders');
        $role->givePermissionTo('manage media');
        $role->givePermissionTo('manage pengaturan');
        $role->givePermissionTo('manage pengguna');
        $role->givePermissionTo('manage permission');
        $role->givePermissionTo('manage menu');
        $role->givePermissionTo('upload files');
        $role->givePermissionTo('manage galeri foto');
        $role->givePermissionTo('baca');

        $role = Role::create(['name' => 'Pelanggan']);
        $role->givePermissionTo('baca');

        $role = Role::create(['name' => 'Kontributor']);
        $role->givePermissionTo('baca');
        $role->givePermissionTo('edit artikel');
        $role->givePermissionTo('hapus artikel');

        $role = Role::create(['name' => 'Penulis']);
        $role->givePermissionTo('baca');
        $role->givePermissionTo('edit artikel');
        $role->givePermissionTo('hapus artikel');
        $role->givePermissionTo('publish artikel');
        $role->givePermissionTo('upload files');

        $role = Role::create(['name' => 'Editor']);
        $role->givePermissionTo('edit artikel');
        $role->givePermissionTo('hapus artikel');
        $role->givePermissionTo('publish artikel');
        $role->givePermissionTo('edit artikel lain');
        $role->givePermissionTo('hapus artikel lain');
        $role->givePermissionTo('manage laman');
        $role->givePermissionTo('manage kategori');
        $role->givePermissionTo('manage tags');
        $role->givePermissionTo('manage media');
        $role->givePermissionTo('upload files');
        $role->givePermissionTo('baca');

        $user = App\User::find(1);
        $user->assignRole('Administrator');
    }
}
