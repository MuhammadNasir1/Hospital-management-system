<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $medicines = Inventory::all();
        return view('pharmacy.inventory', compact('medicines'));
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
}
