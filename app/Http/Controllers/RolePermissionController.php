<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RolePermissionController extends Controller
{
    public function index(): View
    {
        $matrix = [
            'admin' => ['Manage products', 'Manage employees', 'Manage users', 'Add credits', 'View customers', 'View roles/permissions'],
            'employee' => ['Manage products', 'Add credits', 'View customers'],
            'customer' => ['View products', 'Purchase products', 'View own account and purchases'],
        ];

        return view('admin.roles_permissions', ['matrix' => $matrix]);
    }
}
