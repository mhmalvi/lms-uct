<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentForm;
use PDF;
use Illuminate\Http\Request;

class PDFGenerateController extends Controller
{
    public $data;

   

    public function generatePDF($form_id)
    {
        $item         = EnrollmentForm::find($form_id);
        $formData     = json_decode(json_encode($item->form_data, true));  
        $formObject   = json_decode($formData);
        $data['data'] = $formObject;
        
        $pdf = PDF::loadView('pages.pdfgenerate', $data);
        // $pdf->setPaper('A4','landscape');
        return $pdf->download('enrollmentform.pdf');
    }
}
