<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 29,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 33,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 34,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 35,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 36,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 37,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 38,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 39,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 40,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 41,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 42,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 43,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 44,
                'title' => 'task_create',
            ],
            [
                'id'    => 45,
                'title' => 'task_edit',
            ],
            [
                'id'    => 46,
                'title' => 'task_show',
            ],
            [
                'id'    => 47,
                'title' => 'task_delete',
            ],
            [
                'id'    => 48,
                'title' => 'task_access',
            ],
            [
                'id'    => 49,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 50,
                'title' => 'client_create',
            ],
            [
                'id'    => 51,
                'title' => 'client_edit',
            ],
            [
                'id'    => 52,
                'title' => 'client_show',
            ],
            [
                'id'    => 53,
                'title' => 'client_delete',
            ],
            [
                'id'    => 54,
                'title' => 'client_access',
            ],
            [
                'id'    => 55,
                'title' => 'product_create',
            ],
            [
                'id'    => 56,
                'title' => 'product_edit',
            ],
            [
                'id'    => 57,
                'title' => 'product_show',
            ],
            [
                'id'    => 58,
                'title' => 'product_delete',
            ],
            [
                'id'    => 59,
                'title' => 'product_access',
            ],
            [
                'id'    => 60,
                'title' => 'category_create',
            ],
            [
                'id'    => 61,
                'title' => 'category_edit',
            ],
            [
                'id'    => 62,
                'title' => 'category_show',
            ],
            [
                'id'    => 63,
                'title' => 'category_delete',
            ],
            [
                'id'    => 64,
                'title' => 'category_access',
            ],
            [
                'id'    => 65,
                'title' => 'sale_create',
            ],
            [
                'id'    => 66,
                'title' => 'sale_edit',
            ],
            [
                'id'    => 67,
                'title' => 'sale_show',
            ],
            [
                'id'    => 68,
                'title' => 'sale_delete',
            ],
            [
                'id'    => 69,
                'title' => 'sale_access',
            ],
            [
                'id'    => 70,
                'title' => 'payment_create',
            ],
            [
                'id'    => 71,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 72,
                'title' => 'payment_show',
            ],
            [
                'id'    => 73,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 74,
                'title' => 'payment_access',
            ],
            [
                'id'    => 75,
                'title' => 'service_create',
            ],
            [
                'id'    => 76,
                'title' => 'service_edit',
            ],
            [
                'id'    => 77,
                'title' => 'service_show',
            ],
            [
                'id'    => 78,
                'title' => 'service_delete',
            ],
            [
                'id'    => 79,
                'title' => 'service_access',
            ],
            [
                'id'    => 80,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
