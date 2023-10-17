<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Traits\Photo;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserCart;
use Illuminate\Http\Request;
use App\Http\Requests\FormRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    use Photo;
    public function get_login()
    {
        return view('User.Auth.login');
    }

    public function post_login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $checker_user = Auth::guard('web')->attempt(['email' => $req->email, 'password' => $req->password]);
        $checker_admin = Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password]);
        if ($checker_admin) {
            return redirect()->route('user.index');
        } elseif ($checker_user) {
            ($user = UserCart::first()) ? $user->update(['user_id' => Auth::id()]) : false;
            return redirect()->route('wellcome');
        } else {
            return view('User.Auth.login')->with('failed_login', 'The Email or Password Wrong !');
        }
    }
    public function get_register()
    {
        return view('User.Auth.register');
    }
    public function post_register(FormRegister $request)
    {
        if ($request->photo) {
            $photo = $this->save_photo('users_photos', $request->photo);
        } else {
            $photo = 'users_photos/Profile.png';
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'photo' => $photo,
        ]);
        notify()->success('Registeration is Success', 'Registeration');
        return view('User.Auth.login');
    }
    public function edit_register(FormRegister $request)
    {
        $user = User::find(Auth::guard('web')->id());

        if ($request->has('photo')) {
            $data = $this->UpdateDataWithPhoto($request, Auth::user(), 'users_photos');
            $user->update($data);
        } else {
            $user->update($request->all());
        }
        notify()->success('Updated Info Success !!', 'Updating');
        return redirect()->route('wellcome');
    }
    public function wellcome()
    {
        $popular_products = Product::inRandomOrder()->limit(8)->get();
        $new_added_products = Product::orderBy('id', 'desc')->limit(8)->get();
        $categories = Category::inRandomOrder()->limit(10)->get();
        return view('User.welcome', compact('popular_products', 'new_added_products', 'categories'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('wellcome');
    }
}
