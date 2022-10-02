<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChairController extends Controller
{
    public function index()
    {
        return Inertia::render('Chairs/Index', ['chairs' => Chair::all()]);
    }

    public function select(Request $request)
    {
        $order_id = $request->query('order_id');
        $coupons_count = Coupon::where('order_id', $order_id)->count();

        return Inertia::render('Chairs/Select', [
            'orderId' => intval($order_id),
            'couponsCount' => $coupons_count,
            'chairs' => Chair::all()
        ]);
    }

    public function occupy(Request $request)
    {
        $order_id = $request->query('order_id');
        $selected_chairs = $request->input('selectedChairs');

        $chairs_query = Chair::whereIn('id', $selected_chairs);
        $chairs_query->update(['order_id' => $order_id]);
        $chairs = $chairs_query->get();
        $coupons = Coupon::where('order_id', $order_id)->get();

        for ($i = 0; $i < sizeof($chairs); $i++) $coupons[$i]->update(['chair_id' => $chairs[$i]->id]);

        return redirect(route('dashboard'))
            ->with('notice', 'Compra registrada exitosamente.');
    }
}
