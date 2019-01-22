<?php

namespace App\Http\Controllers;

use App\Enums\MessagesEnum;
use App\Enums\UserStatus;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $user;

    public function __construct(User $users)
    {
        $this->user = $users;
        $this->middleware('auth');
    }

    public function index()
    {
        $users = $this->user->all();
        return view('vendor.adminlte.users.index', compact('users'));
    }
    public function create()
    {

        ////$status = Status::getKeys();
        return view('vendor.adminlte.users.form', compact('status'));
    }

    public function store(Request $request)
    {

        try {

            $dateForm = $request->all();
            $validate = validator($dateForm, $this->user->rules);

            if ($validate->fails()) {
                return redirect()
                    ->route('users.create')
                    ->withErrors($validate)
                    ->withInput();

            }

            $insert = $this->user->create($dateForm);

            $insert->password = bcrypt($request->password);
            $insert->save();

            if ($insert) {

                return redirect()->route('users.index')->with('success', MessagesEnum::getValue('success'));
            } else {

                return redirect()->back();
            }

        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $status = UserStatus::getKeys();
            $user = $this->user->find($id);
            return view('vendor.adminlte.users.form', compact('user', 'status'));
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            $dateForm = $request->all();

            $update = $this->user->findOrFail($id)->update($dateForm);
            if ($update)
                return redirect()->route('users.index')->with('success', MessagesEnum::getValue('edit'));
            else
                return redirect()->route('users.editar', $id);
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->user->findOrFail($id)->delete();
            $response = array('status' => 'success');
        } catch (Exception $e) {
            $response = array('status' => 'fail', 'error' => $e->getMessage());
        }
        return response()->json($response);
    }


}
