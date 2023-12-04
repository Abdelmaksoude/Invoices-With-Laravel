<?php

namespace App\Http\Controllers;

use App\Models\Invoices_Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InvoicesAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();

        $attachments =  new Invoices_Attachment();
        $attachments->file_name = $file_name;
        $attachments->invoice_number = $request->invoice_number;
        $attachments->invoice_id = $request->invoice_id;
        $attachments->Created_by = Auth::user()->name;
        $attachments->save();

        // move pic
        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachments/'. $request->invoice_number), $imageName);

        session()->flash('Add', 'تم اضافة المرفق بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices_Attachment $invoices_Attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices_Attachment $invoices_Attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoices_Attachment $invoices_Attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices_Attachment $invoices_Attachment)
    {
        //
    }
}
