<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Accounts/Index', [
            'accounts' => Auth::user()->accounts()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Accounts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request)
    {
        $attributes = $request->validated();
        Auth::user()->accounts()->create($attributes);
        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        if(Auth::user()->cannot('update', $account)) {
            abort(401);    
        }

        return Inertia::render('Accounts/Edit', [
            'account' => $account,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, Account $account)
    {
        $attributes = $request->validated();
        $account->update($attributes);
        return redirect()->route('accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
