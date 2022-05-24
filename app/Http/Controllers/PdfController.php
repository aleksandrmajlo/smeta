<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Carbon;
class PdfController extends Controller
{
    public function create(Request $request)
    {
        $name_pdf = time() . '.pdf';
        $link = env('APP_URL') . '/pdf/' . $name_pdf;
//        $html = view($template, [
//
//        ]);
        $innerHtml=$request->html;// полученный хтмл

        $css=file_get_contents(public_path().'/css/pdf.css');
        $pdfpage=file_get_contents(public_path().'/pdf.html');
        $pdfpage=str_replace('@h_t_m_l@',$innerHtml,$pdfpage);
        $pdfpage=str_replace('@c_s_s@',$css,$pdfpage);
        // <div class="PochogNaves"></div> - вместо этого похожие
        //************************************************************************************
        $dompdf = new \Dompdf\Dompdf([
            'defaultFont' => 'DejaVu Serif',
//            'defaultFont' => 'Montserrat',
            "default_media_type" => "screen",
            "dpi" => 96,
        ]);
        $dompdf->loadHtml($pdfpage);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        \Storage::disk('pdf')->put($name_pdf, $dompdf->output());
//        $dompdf->stream($name_pdf);
        return response()->json([
            'link'=>$link
        ]);
    }
}
