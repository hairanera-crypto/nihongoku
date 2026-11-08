<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Question;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'materialCount' => Material::count(),
            'questionCount' => Question::count(),
            'userCount' => User::count(),
            'recentMaterials' => Material::latest()->limit(5)->get(),
        ]);
    }
}