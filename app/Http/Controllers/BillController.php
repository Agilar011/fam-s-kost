<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Gate;



class BillController extends Controller
{

    public const BILL_ROUTE = [
        "index" => "bill.index",
        "store" => "bill.store",
        "create" => "bill.create",
        "show" => "bill.show",
        "edit" => "bill.edit",
        "update" => "bill.update",
        "delete" => "bill.destroy",
    ];

    public const BILL_VIEW = [
        "index" => "dashboard.bill.index",
        "create" => "dashboard.bill.create",
        "detail" => "dashboard.bill.detail",
        "edit" => "dashboard.bill.edit",
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Gate::denies('index-bill')) {
            abort(403, 'You do not have permission to access this page');
        }

        return view(BillController::BILL_VIEW["index"], [
            'bills' => Bill::with('price')->paginate(10),
            'bill_route' => BillController::BILL_ROUTE,
        ]);
    }

    public function create()
    {
        //
        return view(BillController::BILL_VIEW["create"], [
            'bill_route' => BillController::BILL_ROUTE,
            'price_route' => PriceController::PRICE_ROUTE,
            'prices' => Price::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(request $request)
    {
    //    $request->validate ([
    //         'name' => 'required',
    //         'month' => 'required',
    //         'year' => 'required',
    //         'total_price' => 'required',
    //     ]);

    //     $bill = new Bill;
    //     $bill->name = $request->get('name');
    //     $bill->month = $request->get('month');
    //     $bill->year = $request->get('year');
    //     $bill->total_price = $request->get('total_price');

    //     $price = new Price;
    //     $price->id = $request->get('total_month');

    //     $bill->price()->associate($price);

    //     $bill->save();

        $request->request->add(['status' => 'unpaid']);
        $bill = Bill::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $bill->id,
                'gross_amount' => $bill->total_price,
            ),
            'customer_details' => array(
                'name' => $request->name,
                'month' => $request->month,
                'year' => $request->year,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
       return view('dashboard.bill.paynow', compact('snapToken', 'bill'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $bill = Bill::findOrFail($request->order_id);
                $bill->status = 'paid';
                $bill->save();
            }
        }
    }


    public function show(Bill $bill)
    {
        //
        return view(BillController::BILL_VIEW["detail"], [
            'bill' => $bill,
            'bill_route' => BillController::BILL_ROUTE,
        ]);
    }



    public function destroy(Bill $bill)
    {
        //
        Bill::with('price')->find($bill->id)->delete();

        return redirect()->route('bill.index')->with('success', 'Bill deleted successfully.');
    }
}
