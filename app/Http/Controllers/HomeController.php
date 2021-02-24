<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\RequestQuotes;
use App\Models\Reviews;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $vendor = Vendor::where('user_id', $user->id)->first();
        $ListingCount = Listing::where('vendor_id', $vendor->id)->count();
        $ReviewsCount = Reviews::where('vendor_id', $vendor->id)->count();
        $RequestQuotesCount = RequestQuotes::where('vendor_id', $vendor->id)->count();

        if (!$user) {
            return redirect()->back()->withErrors('Please Login to view dashboard.');
        }

        return view('home', [ 'user' => $user, 'ListingCount' => $ListingCount, 'ReviewsCount' => $ReviewsCount, 'RequestQuotesCount' => $RequestQuotesCount ]);
    }

    public function profile()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->withErrors('Please Login to view your profile.');
        }

        $Vendor = Vendor::where('user_id', $user->id)->get();

        return view('dashboard.profile', [
            'user' => $user,
            'vendor' => $Vendor
        ]);
    }
}
