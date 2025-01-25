<?php

namespace App\Http\Controllers;

use App\Models\AuthUser;
use App\Models\AuthUserModel;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Flasher\Notyf\Prime\NotyfInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }

    public function registerProses(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'username' => 'required|max:255',
                'password' => 'required|min:8',
            ]);

            $AuthUser = new AuthUserModel();
            $AuthUser->username = $request->username;
            $AuthUser->password = Hash::make($request->password);
            $AuthUser->save();

            $Account = new UserModel();
            $Account->user_id = $AuthUser->id;
            $Account->bio = null;
            $Account->path_foto = null;
            $Account->save();

            DB::commit();
            return redirect()->route('login')
                ->with('success', 'Registration successful! Please login.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Registration error! Please login again.');
        }
    }

    public function loginProses(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        // Cek kredensial pengguna
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            return redirect()->route('account')->with('success', 'Login successful!');
        } else {
            // Jika login gagal, redirect kembali dengan pesan error
            return back()->with('error', 'Invalid username or password.')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Successfully Logout');
    }

    public function updateFoto(Request $request)
    {
        $request->validate(['File' => 'required|mimes:jpg,jpeg,png|max:2048']);

        $Account = UserModel::where('user_id', auth()->id())->first();

        if ($Account) {
            if ($Account->path_foto) {
                Storage::disk('public')->delete('foto/' . $Account->path_foto);
            }
            $File = $request->file('File');
            $path = $File->storeAs('foto', $File->getClientOriginalName(), 'public');

            $Account->nickname = Auth::user()->account->nickname;
            $Account->bio = Auth::user()->account->bio;
            $Account->path_foto = $File->getClientOriginalName();
            $Account->save();

            return response()->json([
                'success' => true,
                'message' => 'Foto succesfully updated!',
            ]);
        }
        return back()->with('error', 'Pengguna tidak ditemukan.');
    }

    public function update(Request $request)
    {
        $Account = AuthUserModel::where('id', auth()->id())->first();
        $User = UserModel::where('user_id', auth()->id())->first();

        $request->validate([
            'username' => 'required|max:255',
            'bio' => 'required|max:255',
        ]);

        $Account->username = $request->input('username');
        $User->bio = $request->input('bio');
        $Account->save();
        $User->save();

        return response()->json([
            'success' => true,
            'message' => 'Date succesfully updated!',
        ]);
    }
}
