<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
    public function show()
    {
        return view("page.fitur.qrcode.show");
    }
    public function generate(Request $request)
    {
        $attr = $request->validate([
            "qrcode" => "required"
        ]);
        return  QrCode::encoding('UTF-8')->size(500)->generate($attr["qrcode"]);

        // return view("page.fitur.qrcode.generate", [
        //     "qrcode" => $attr["qrcode"]
        // ]);
    }
}
