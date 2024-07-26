<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\PharmacyOrders;
use Illuminate\Http\Request;

class PharmacyOrdersController extends Controller
{
    public function insert(Request $request)
    {

        try {


            $validateDate = $request->validate([
                'customer_name' => 'required',
                'customer_phone' => 'required',
                'payment_type' => 'required',
                'date' => 'required',
                'total_amount' => 'required',
                'discount' => 'required',
                'paid_amount' => 'required',
                'change' => 'required',
                'grand_total' => 'required',

                'medicine_id' => 'required',
                'quantity' => 'required',
            ]);
            $user_id  = session('user_det')['user_id'];
            $order =  PharmacyOrders::create([
                'user_id'  =>  $user_id,
                'customer_name' =>  $validateDate['customer_name'],
                'customer_phone' =>  $validateDate['customer_phone'],
                'payment_type' =>  $validateDate['payment_type'],
                'date' =>  $validateDate['date'],
                'total_amount' =>  $validateDate['total_amount'],
                'discount' =>  $validateDate['discount'],
                'paid_amount' =>  $validateDate['paid_amount'],
                'change' =>  $validateDate['change'],
                'grand_total' =>  $validateDate['grand_total'],

            ]);
            $medicines = $request->input('medicine_id');
            foreach ($medicines as  $i => $medicine) {
                $order_items  = OrderItems::create([
                    'order_id' => $order->id,
                    'medicine_id' => $validateDate['medicine_id'][$i],
                    'quantity' =>  $validateDate['quantity'][$i],
                ]);
                $order_items->save();
            }

            return response()->json(['success'  => true,  'message' => "Data add successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['success'  => false,  'message' => $e->getMessage()], 500);
        }
    }
}
