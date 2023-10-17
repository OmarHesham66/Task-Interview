<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = UserOrder::get();
        return view('Admin.Order.order', compact('orders'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserOrder $order)
    {
        $enum = ['Pending', 'Shiping', 'Complete', 'Cancel'];
        return view('Admin.Order.Crud-Order.edit', compact('order', 'enum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserOrder $order)
    {
        $request->validate([
            'status_order' => 'required',
        ]);
        $order->update($request->all());
        notify()->success('Updated Option Success !!', 'Updating');
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserOrder $order)
    {
        $order->delete();
        notify()->success('Deleted Order Success !!', 'Deleting');
        return redirect()->route('order.index');
    }
}
