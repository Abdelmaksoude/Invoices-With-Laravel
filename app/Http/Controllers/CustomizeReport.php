<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Invoices;

class CustomizeReport extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('reports.customize_reports', compact('sections'));
    }
    public function Search_customers(Request $request)
    {
        // في حالة البحث بدون التاريخ
            if ($request->Section && $request->product && $request->start_at =='' && $request->end_at=='') {
                $invoices = Invoices::select('*')->where('section_id','=',$request->Section)->where('product','=',$request->product)->get();
                $sections = Section::all();
                return view('reports.customize_reports',compact('sections'))->withDetails($invoices);
            }
          // في حالة البحث بتاريخ
            else
            {
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $invoices = Invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('section_id','=',$request->Section)->where('product','=',$request->product)->get();
                $sections = Section::all();
                return view('reports.customize_reports',compact('sections'))->withDetails($invoices);
            }
    }
}
