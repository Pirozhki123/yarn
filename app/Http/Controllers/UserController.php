<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private  $viewInfo = [
        'key' => 'user',
        'name' => 'ユーザー',
        'route' => '/user',
    ];

    public function index()
    {
        return view('management.index', [
            'viewInfo' => $this->viewInfo,
            'viewItems' => User::all()->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.create', [
            'viewInfo' => $this->viewInfo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $viewItem = User::create([
            'number' => $request['number'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        return redirect()->route('user.show', ['id' => $viewItem['id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewItem = User::find($id);
        return view('management.show', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $viewItem = User::find($id);
        return view('management.edit', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $viewItem = User::where('id', $id)->update([
            'number' => $request->number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('user.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $viewItem = User::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return redirect()->route('user.index');
    }

    public function confirm(UserRequest $request, $id)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
