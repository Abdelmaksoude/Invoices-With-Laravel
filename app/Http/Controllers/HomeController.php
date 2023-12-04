<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chartjs = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 350, 'height' => 100])
        ->labels(['الفواتير المدفوعه', 'الفواتير الغير مدفوعه', 'الفواتير المدفوعه جزئيا'])
        ->datasets([
            [
                "label" => "الفواتير المدفوعه",
                'backgroundColor' => ['#435334'],
                'data' => [round((Invoices::where('Value_Status',1)->count() / Invoices::count())*100)]
            ],
            [
                "label" => "الفواتير الغير مدفوعه",
                'backgroundColor' => ['#BB2525'],
                'data' => [round((Invoices::where('Value_Status',2)->count() / Invoices::count())*100)]
            ],
            [
                "label" => "الفواتير المدفوعه جزئيا",
                'backgroundColor' => ['#FD8D14'],
                'data' => [round((Invoices::where('Value_Status',3)->count() / Invoices::count())*100)]
            ]
        ])
        ->options([]);

        $chartjs2 = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['الفواتير المدفوعه', 'الفواتير الغير مدفوعه', 'الفواتير المدفوعه جزئيا'])
        ->datasets([
            [
                'backgroundColor' => ['#435334', '#BB2525', '#FD8D14'],
                'hoverBackgroundColor' => ['#435334', '#BB2525', '#FD8D14'],
                'data' => [round((Invoices::where('Value_Status',1)->count() / Invoices::count())*100) , round((Invoices::where('Value_Status',2)->count() / Invoices::count())*100) , round((Invoices::where('Value_Status',3)->count() / Invoices::count())*100)]
            ]
        ])
        ->options([]);

        return view('home', compact('chartjs','chartjs2'));
    }
}
