<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public const PRICE_ROUTE = [
        "index" => "prices.index",
        "store" => "prices.store",
        "create" => "prices.create",
        "show" => "prices.show",
        "edit" => "prices.edit",
        "update" => "prices.update",
        "delete" => "prices.destroy",
    ];

    public const PRICE_VIEW = [
        "index" => "dashboard.price.index",
        "create" => "dashboard.price.create",
        "detail" => "dashboard.price.detail",
        "edit" => "dashboard.price.edit",
    ];

    public function index(Request $request)
    {
        //
        if (Gate::denies('index-price')) {
            abort(403, 'You do not have permission to access this page');
        }

        $prices = DB::table('price')
        ->when($request->input('search'), function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%');
        })
        ->paginate(5);
        return view('dashboard.price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(PriceController::PRICE_VIEW["create"], [
            'price_route' => PriceController::PRICE_ROUTE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        Price::create($request->all());

        return redirect()->route(PriceController::PRICE_ROUTE["index"])
            ->with('success', 'Price created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        //
        return view(PriceController::PRICE_VIEW["detail"], [
            'price' => $price,
            'price_route' => PriceController::PRICE_ROUTE,
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        //
        return view(PriceController::PRICE_VIEW["edit"], [
            'price' => $price,
            'price_route' => PriceController::PRICE_ROUTE,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        //
        $request -> validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $price->update($request->all());

        return redirect()->route(PriceController::PRICE_ROUTE["index"])
            ->with('success', 'Price updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $price = Price::find($id)->delete();

        return redirect()->route(PriceController::PRICE_ROUTE["index"])
            ->with('success', 'Price deleted successfully');
    }
}
