<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\OrderItems;
use App\Models\PharmacyOrders;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $medicines = Inventory::all();
        return view('pharmacy.inventory', compact('medicines'));
    }

    public function invoiceData($order_id)
    {
        $orderData  =  PharmacyOrders::find($order_id);
        $orderitems  = OrderItems::where('order_id', $orderData->id)->get();

        $order = [];

        $order = $orderData;
        $order_items = $orderitems;
        // $medData = [];
        // foreach ($orderitems  as  $orderitem) {
        //     $medicine  = Inventory::where('id', $orderitem->medicine_id)->first();
        //     $medData[] = $medicine;
        // }$order_items
        // return response()->json($order_items);
        return view('pharmacy.billing', compact('orderData',  'order_items'));
    }
    public function insert(Request $request)
    {
        try {

            $validatedData  = $request->validate([
                'name' => 'required',
                'packing' => 'required',
                'batch_id' => 'required',
                'expiry_date' => 'required',
                'quantity' => 'required',
                'price' => 'required',

            ]);
            $medicine = Inventory::create([
                'name' => $validatedData['name'],
                'packing' => $validatedData['packing'],
                'batch_id' => $validatedData['batch_id'],
                'expiry_date' => $validatedData['expiry_date'],
                'quantity' => $validatedData['quantity'],
                'price' => $validatedData['price'],

            ]);

            return response()->json(['success' => true,  'message' =>  "Data add successfully"], 200);
        } catch (\Exception $e) {

            return response()->json(['success' => false,  'message' =>  $e->getMessage()], 500);
        }
    }

    public function medicine()
    {
        $medicine = Inventory::all();
        return view('pharmacy.invoice',  compact('medicine'));
    }
}
