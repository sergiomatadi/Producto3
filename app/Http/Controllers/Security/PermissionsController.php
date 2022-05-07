<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;


class PermissionsController extends Controller
{
    public function index(){
        $permissions = Permission::select('id','name')->get();
        return Inertia::render('');
    }
}
