<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnrollmentForm;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    /**
     * 
     */
    public function bankReceipt($slip)
    {
        $filepath = public_path("uploads\\slip\\{$slip}");
        return Response::download($filepath);
    }
}
