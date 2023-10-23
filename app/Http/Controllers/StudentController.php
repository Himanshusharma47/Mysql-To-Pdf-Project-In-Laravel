<?php

namespace App\Http\Controllers;
use TCPDF;
use Illuminate\Http\Request;
use App\Models\Students;
class StudentController extends Controller
{
    public function display(){
        $students=Students::all();
        return view('PdfExport',compact('students'));
    }

    public function export(Request $request){
        $data=Students::all();
        $pdf=new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('dejavusans', '', 12);//optional
        // Add column headings
        $pdf->Cell(30, 10, 'Id', 1);
        $pdf->Cell(30, 10, 'name', 1);
        $pdf->Cell(30, 10, 'age', 1);
        $pdf->Cell(30, 10, 'city', 1);
        $pdf->Ln(); 

        foreach ($data as $row) {
            $pdf->Cell(30, 10, $row->id, 1);
            $pdf->Cell(30, 10, $row->name, 1);
            $pdf->Cell(30, 10, $row->age, 1);
            $pdf->Cell(30, 10, $row->city, 1);
            $pdf->Ln(); 
        }
        return $pdf->Output('student.pdf','I');
    }
}