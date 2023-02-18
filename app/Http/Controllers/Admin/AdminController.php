<?php

namespace App\Http\Controllers\Admin;

use App\Auction;
use App\Goods;
use App\Officer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users    = User::all();
        $goodies  = Goods::all();
        $auctions = Auction::all();
        $officers = Officer::all();

        return view('admin.index', [
            'users'    => $users,
            'goodies'  => $goodies,
            'auctions' => $auctions,
            'officers' => $officers
        ]);
    }

    public function profile()
    {
        $goodies           = Goods::all();
        $auctions          = Auction::all();
        $users             = User::all();

        return view('admin.profile', [
            'goodies'           => $goodies,
            'auctions'          => $auctions,
            'users'             => $users
        ]);
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'avatar'       => 'mimes:jpg,png,jpeg|max:2048',
            'first_name'   => 'required|string',
            'last_name'    => 'required|string',
            'email'        => 'required|email',
            'phone_number' => 'required|numeric',
            'description'  => 'required'
        ]);

        $officer = Officer::find(Auth::user()->id);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        if (!$request->avatar) {
            $data['avatar'] = $officer->avatar;
        } else {
            $data['avatar'] = $request->avatar;
            $data['avatar'] = time() . '_' . Auth::user()->name . '.' . $request->file('avatar')->extension();
            $request->file('avatar')->move(public_path('usersFile'), $data['avatar']);
        }

        Storage::delete('usersFile/' . $officer->avatar);
        $officer->update($data);

        return redirect('/admin/profile/')->with('status', 'Profil berhasil diperbarui!');
    }
}
