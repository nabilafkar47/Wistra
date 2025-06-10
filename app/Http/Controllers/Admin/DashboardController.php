<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $adminCount = User::where('role', 'admin')->count();
        $userCount = User::where('role', 'user')->count();
        $destinationCount = Destination::count();
        $destinationImageCount = Destination::count();
        $cityCount = City::count();
        $categoryCount = Category::count();
        $reviewCount = Review::count();
        $sliderCount = Slider::count();

        return view('admin.dashboard.index', compact(
            'adminCount',
            'userCount',
            'destinationCount',
            'destinationImageCount',
            'cityCount',
            'categoryCount',
            'reviewCount',
            'sliderCount',
        ));
    }
}
