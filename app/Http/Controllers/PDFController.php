<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()

    {

        // $data = [
        //     'title' => 'Salary Slip',
        //     'date' => Carbon::now(),
        // ];

        $pdf = \PDF::loadView('pdf.pdf');
        return $pdf->download('salary_slip.pdf');

    }
}
