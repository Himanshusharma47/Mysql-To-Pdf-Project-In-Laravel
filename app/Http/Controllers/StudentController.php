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
        
        // create new Tcpdf
        $pdf=new TCPDF();
        // Add page through Object
        $pdf->AddPage();
        $pdf->SetFont('dejavusans', '', 12);

        // Add column headings
        $pdf->Cell(30, 10, 'Id', 1);
        $pdf->Cell(30, 10, 'name', 1);
        $pdf->Cell(30, 10, 'age', 1);
        $pdf->Cell(30, 10, 'city', 1);
        $pdf->Ln(); 

        // Loop through the student data and add it to the PDF table
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