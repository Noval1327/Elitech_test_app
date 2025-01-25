<?php

namespace App\Http\Controllers;

use App\Exports\ExportPost;
use App\Models\PostModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ArchivesController extends Controller
{
    public function index()
    {
        $post = PostModel::with('files')->onlyTrashed()->get();
        return view('archives', [
            'posts' => $post
        ]);
    }

    public function restore($id)
    {

        $data = PostModel::onlyTrashed()->find($id);
        $data->restore();
        return redirect()->route('archives')->with('success', 'Data Successfully Restored!');
    }

    public function exportExcel($date)
    {
        return Excel::download(new ExportPost($date), 'Archives.xlsx');
    }

    public function exportPdf($date)
    {
        $formattedDate = Carbon::parse($date)->toDateString(); // Hasil: '2025-01-24'
        $posts = PostModel::onlyTrashed()->whereDate('deleted_at', $formattedDate)
            ->with('files')
            ->get();
        return view('exports.post', [
            'posts' => $posts,
        ]);
    }

    public function delete($id)
    {
        Log::info('berhasil delete permanen');
        $post = PostModel::onlyTrashed()->find($id);
        $post->forceDelete();

        return redirect()->back();
    }
}
