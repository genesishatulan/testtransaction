<?php

namespace App\Modules\Transtest\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;
// use App\Modules\Transtest\Models\Account;
use App\Modules\Transtest\Models\Account;
use App\Modules\Transtest\Models\UserInfo;

class TransactiontestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::getOrPaginate();

            return $accounts;

        // DB::transaction(function () {

        //     $accounts = Account::getOrPaginate();

        //     return $accounts;

        // });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = DB::transaction(function (){
                $acc = Account::create([
                    'username' => request('username'),
                    'password' => request('password'),
                    
                ]);
                $userinfo = UserInfo::create([
                    'fname' => request('fname'),
                    'mname' => request('mname'),
                    'lname' => request('lname'),
                    'account_id' => $acc->id,
                ]);
            });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Account::findOrFail($id)->with('userinfo')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = DB::transaction(function() use ($request, $id) {
            $acc = Account::find($id);
            $acc->update($request->all());

            $userinfo = UserInfo::where('account_id', $id);
            $userinfo->update([
                'fname' => request('fname'),
                'mname' => request('mname'),
                'lname' => request('lname')
            ]);
        });
        return response()->json(Account::with('userinfo')->first());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acc = Account::findOrFail($id)->delete();

    }
}
