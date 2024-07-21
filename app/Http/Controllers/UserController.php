<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public const USER_ROUTE = [
        "index" => "users.index",
        "store" => "users.store",
        "create" => "users.create",
        "show" => "users.show",
        "edit" => "users.edit",
        "update" => "users.update",
        "delete" => "users.destroy",
    ];

    public const USER_VIEW = [
        "index" => "dashboard.user.index",
        "create" => "dashboard.user.create",
        "detail" => "dashboard.user.detail",
        "edit" => "dashboard.user.edit",
    ];


    public function index(Request $request)
    {
        if (Gate::denies('index-user')) {
            abort(403, 'You do not have permission to access this page');
        }

        $users = DB::table('users')
        ->when($request->input('search'), function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%');
        })
        ->paginate(5);
        return view('dashboard.user.index', compact('users'));
        // return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(UserController::USER_VIEW["create"], [
            'title' => 'Tambah User',
            'users_route' => UserController::USER_ROUTE
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ruleData = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
        ];

        $valdiateData = $request->validate($ruleData);

        User::create($valdiateData);

        return redirect()->route(UserController::USER_ROUTE["index"])->with('success', 'User berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view(UserController::USER_VIEW["detail"], [
            'title' => "Detail User $user->name",
            'user' => $user,
            'users_route' => UserController::USER_ROUTE,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view(UserController::USER_VIEW["edit"], [
            'title' => 'Edit User',
            'user' => $user,
            'users_route' => UserController::USER_ROUTE,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $ruleData = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ];

        if ($request->input('password')) {
            $ruleData['password'] = 'required|min:8';
        }

        $valdiateData = $request->validate($ruleData);

        if ($request->input('password')) {
            $valdiateData['password'] = bcrypt($request->input('password'));
        }

        $user->update($valdiateData);

        return redirect()->route(UserController::USER_ROUTE["index"])->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        User::find($user->id)->delete();
        return redirect()->route(UserController::USER_ROUTE["index"])->with('success', 'User berhasil dihapus');
    }
}
