<?php

namespace App\Exports;

use App\Models\ResponsList;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Reader\Xls\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class responsListsExport implements FromView
{
    protected $responid;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($responid)
    {
        $this->responid = $responid;
    }
    public function view(): View
    {
        return view('page.fitur.listmi.response.export', [
            'respons' => ResponsList::where("idlist", $this->responid)->get()
        ]);
    }
}
