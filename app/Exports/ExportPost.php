<?php

namespace App\Exports;

use App\Models\PostModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPost implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected  $date;

    public function __construct($date)
    {
        $this->date = $date;
    }
    public function collection()
    {
        // Ambil hanya tanggal dari $this->date
        $formattedDate = Carbon::parse($this->date)->toDateString(); // Hasil: '2025-01-24'
        $posArchives = PostModel::onlyTrashed()
            ->with('files')
            ->select('caption', 'created_at', 'deleted_at')
            ->whereDate('deleted_at', $formattedDate)
            ->get()
            ->map(function ($item) {
                return [
                    'caption' => $item->caption,
                    'created_at' => Carbon::parse($item->created_at)->format('d-m-Y'),
                    'deleted_at' => Carbon::parse($item->deleted_at)->format('d-m-Y'),
                ];
            });
        // Log::info('Data Post Archives:', [
        //     'format date' => $formattedDate,
        //     'data' => $posArchives
        // ]);
        return $posArchives;
    }

    public function headings(): array
    {
        return [
            'caption',
            'created_at',
            'deleted_at'
        ];
    }
}
