<?php

namespace App\Http\Controllers;

use App\Models\FileModel;
use App\Models\PostModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $posts = PostModel::with('files')
            ->where('user_id', $user->id)->get();

        // Log::info('Posts', [
        //     'info' => $posts
        // ]);

        return view('profil-page-instagram', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    public function editAccount()
    {
        $user = auth()->user();
        return view('account-edit', ['user' => $user]);
    }

    public function post()
    {
        return view('post');
    }

    public function postProcess(Request $request)
    {
        DB::beginTransaction();
        $Account = UserModel::where('user_id', auth()->id())->first();
        $path = public_path('storage/file');
        $messages = [
            'File.*.mimes' => 'Cannot save file, file must be format (JPG,PNG,JPEG,MP4,MOV)',
            'File.*.max' => 'Cannot save file, file must be greater than 150MB'
        ];

        $fileId = [];
        $request->validate([
            'File.*' => 'required|mimes:jpg,png,jpeg,mp4,mov|max:18750',
            'caption' => 'required|max:255',
        ], $messages);
        foreach ($request->file('File') as $file) {
            $file->move($path, $file->getClientOriginalName());
            $File = new FileModel();
            $File->name_file = $file->getClientOriginalName();
            $File->save();

            $fileId[] = $File->id;
        }

        $Post = new PostModel();
        $Post->user_id = $Account->id;
        $Post->file_id = $fileId[0];
        $Post->like = null;
        $Post->comment = null;
        $Post->caption = $request->input('caption');
        $Post->thumbnail = $request->file('File')[0]->getClientOriginalName();
        $Post->extension = $file->getClientOriginalExtension();

        $Post->save();
        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Post Successfully Created!'
        ]);
    }

    public function delete($id)
    {
        Log::info('id post', [
            'id' => $id
        ]);
        $post = PostModel::find($id);
        Log::info('id post', [
            'id' => $post
        ]);
        $post->delete();
        return back();
    }
}
