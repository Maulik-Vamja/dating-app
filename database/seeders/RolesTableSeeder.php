<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $roles = [
            [
                "section_id"            =>  1,
                "title"                 =>  "Dashboard",
                "route"                 =>  "admin.dashboard.index",
                "params"                =>  NULL,
                "icon"                  =>  "fas fa-home",
                "image"                 =>  NULL,
                "icon_type"             =>  "icon", // icon or image
                "allowed_permissions"   =>  "access",
                "sequence"              =>  1,
                "is_active"             =>  1,
                "created_at"            =>  now()->addSeconds(1),
                "updated_at"            =>  now()->addSeconds(1),
            ],
            [
                "section_id"            =>  2,
                "title"                 =>  "Escorts Management",
                "route"                 =>  "admin.escorts.index",
                "params"                =>  NULL,
                "icon"                  =>  "fas fa-users",
                "image"                 =>  NULL,
                "icon_type"             =>  "icon", // icon or image
                "allowed_permissions"   =>  "access,view,add,edit,delete",
                "sequence"              =>  1,
                "is_active"             =>  1,
                "created_at"            =>  now()->addSeconds(2),
                "updated_at"            =>  now()->addSeconds(2),
            ],
            [
                "section_id"            =>  3,
                "title"                 =>  "Role Management",
                "route"                 =>  "admin.roles.index",
                "params"                =>  NULL,
                "icon"                  =>  "fas fa-briefcase",
                "image"                 =>  NULL,
                "icon_type"             =>  "icon", // icon or image
                "allowed_permissions"   =>  "access,add,edit,delete",
                "sequence"              =>  1,
                "is_active"             =>  1,
                "created_at"            =>  now()->addSeconds(3),
                "updated_at"            =>  now()->addSeconds(3),
            ],
            [
                "section_id"            =>  4,
                "title"                 =>  "CMS Pages",
                "route"                 =>  "admin.pages.index",
                "params"                =>  NULL,
                "icon"                  =>  "fas fa-book",
                "image"                 =>  NULL,
                "icon_type"             =>  "icon", // icon or image
                "allowed_permissions"   =>  "access,edit",
                "sequence"              =>  1,
                "is_active"             =>  1,
                "created_at"            =>  now()->addSeconds(4),
                "updated_at"            =>  now()->addSeconds(4),
            ],
            [
                "section_id"            =>  5,
                "title"                 =>  "Settings",
                "route"                 =>  "admin.settings.index",
                "params"                =>  NULL,
                "icon"                  =>  "fas fa-cog",
                "image"                 =>  NULL,
                "icon_type"             =>  "icon", // icon or image
                "sequence"              =>  1,
                "is_active"             =>  1,
                "allowed_permissions"   =>  "access",
                "created_at"            =>  now()->addSeconds(5),
                "updated_at"            =>  now()->addSeconds(5),
            ],
            [
                "section_id"            =>  6,
                "title"                 =>  "Blog Management",
                "route"                 =>  "admin.blogs.index",
                "params"                =>  NULL,
                "icon"                  =>  "fas fa-list",
                "image"                 =>  NULL,
                "icon_type"             =>  "icon", // icon or image
                "sequence"              =>  1,
                "is_active"             =>  1,
                "allowed_permissions"   =>  "access,add,edit,delete,view",
                "created_at"            =>  now()->addSeconds(5),
                "updated_at"            =>  now()->addSeconds(5),
            ],
            [
                "section_id"                => 7,
                "title"                     => "App Update Setting",
                "route"                     => "admin.update-settings.index",
                "params"                    => NULL,
                "icon"                      => "fa fa-cog",
                "image"                     => NULL,
                "icon_type"                 => "icon",
                "sequence"                  => 1,
                "is_active"                 => 0,
                "allowed_permissions"       => "access,edit",
                "created_at"                => \Carbon\Carbon::now(),
                "updated_at"                => \Carbon\Carbon::now(),
            ],
            [
                "section_id"                => 8,
                "title"                     => "Verification Request",
                "route"                     => "admin.verification-requests.index",
                "params"                    => NULL,
                "icon"                      => "fa fa-cog",
                "image"                     => NULL,
                "icon_type"                 => "icon",
                "sequence"                  => 1,
                "is_active"                 => 1,
                "allowed_permissions"       => "access,add,edit,delete,view",
                "created_at"                => \Carbon\Carbon::now(),
                "updated_at"                => \Carbon\Carbon::now(),
            ],
        ];

        Role::insert($roles);

        if (!empty(get_permissions("admin"))) {
            Admin::where(["id" => 1])->update(["permissions" => serialize(get_permissions("admin"))]);
        }
    }
}
