<?php

namespace App\Http\Controllers;

use App\Models\Invoices_Detail;
use Illuminate\Http\Request;
use App\Models\Invoices;
use App\Models\Invoices_Attachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use File;
use DB;

class InvoicesDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices_Detail $invoices_Detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        $invoices = Invoices::where('id',$id)->first();
        $getId = DB::table('notifications')->where('data->id', $id)->where('notifiable_id', $user)->pluck('id')->first();
        DB::table('notifications')->where('id', $getId)->where('notifiable_id', $user)->update(['read_at'=>now()]);
        $details = Invoices_Detail::where('id_Invoice',$id)->get();
        $attachment = Invoices_Attachment::where('invoice_id',$id)->get();
        return view('invoices.invoices_details', compact('invoices','details','attachment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoices_Detail $invoices_Detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $invoices = Invoices_Attachment::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function get_file($invoice_number,$file_name)
    {
    $st="Attachments";
    $pathToFile = public_path($st.'/'.$invoice_number.'/'.$file_name);
    return response()->download($pathToFile);
    }
    public function open_file($invoice_number,$file_name)
    {
    $st="Attachments";
    $pathToFile = public_path($st.'/'.$invoice_number.'/'.$file_name);
    return response()->file($pathToFile);
    }
}

