<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function clientSummary(Client $client){
        $pdf = Pdf::loadView('pdf.client-summary',[
            'client'=>$client
        ]);

        return $pdf->stream();
    }
}
