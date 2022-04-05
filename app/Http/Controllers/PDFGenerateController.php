<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PDFGenerateController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ibm.vic.edu.au',
            'date' => date('m/d/Y')
        ];

        // dd($data);
          
        $pdf = PDF::loadView('pages.pdfgenerate', $data);
    
        return $pdf->download('uctlms.pdf');
    }
}
