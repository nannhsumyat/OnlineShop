<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\PaymentUpdateRequest;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('id', 'DESC')->paginate(8);
        //var_dump('payments');
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payments = Payment::all();
        return view('admin.payments.create', compact('payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $payments = Payment::create($request->all());

        $file_name = time().'.'.$request->logo->extension();
        $upload = $request->logo->move(public_path('images/payment/'),$file_name);

        if($upload){
            $payments->logo="/images/payment/".$file_name;
        }
        $payments->save();
        return redirect()->route('backend.payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::find($id);
        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentUpdateRequest $request, string $id)
    {
        $payment = Payment::find($id);
        $payment->update($request->all());
        if($request->hasFile('logo')){
           $file_name = time().'.'.$request->logo->extension();
            $upload = $request->logo->move(public_path('images/payment/'),$file_name);

        if($upload){
            $payment->logo="/images/payment/".$file_name;
        }
        else{
            $payment->logo = $request->old_image;
        }
        }
        $payment->save();
        return redirect()->route('backend.payments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //echo "<h1>$id</h1>";
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('backend.payments.index');
    }
}
