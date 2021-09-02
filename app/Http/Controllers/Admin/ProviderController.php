<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        $provider = Provider::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_name' => $request->user_name,
        ]);
        return redirect(route('admin.index'))->with('status','Provider added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $provider = Provider::find($id);
        if ($provider)
            return view('admin.provider.edit' ,compact('provider'));
        return redirect()->back()->with('status','something want wrong');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $provider = Provider::find($id);
        if ($provider){
            $provider->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password == null ? $provider->password : bcrypt($request->password),
                'user_name' => $request->user_name,
            ]);
        }
        return redirect(route('admin.index'))->with('status','Provider update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $provider = Provider::find($id);
        if($provider) {
            $provider->delete();
            return redirect()->back()->with('status','provider deleted');
        }
        return redirect()->back()->with('status','something want wrong');
    }
}
