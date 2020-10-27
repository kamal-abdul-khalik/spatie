<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    public static function defaultPermissions()
    {
        return [

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_permissions',
            'add_permissions',
            'edit_permissions',
            'delete_permissions',

            'view_assigns',
            'add_assigns',
            'edit_assigns',
            'delete_assigns',

            'view_permissionUsers',
            'add_permissionUsers',
            'edit_permissionUsers',
            'delete_permissionUsers',

            'view_posts',
            'add_posts',
            'edit_posts',
            'delete_posts',

            'view_categories',
            'add_categories',
            'edit_categories',
            'delete_categories',

            'view_tags',
            'add_tags',
            'edit_tags',
            'delete_tags',
        ];
    }
}
