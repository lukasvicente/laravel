<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\MessagesEnum;
use App\Enums\RoleStatus;
use App\Role;

class RolesController extends Controller
{
    //
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function index()
    {

        $roles = $this->role->all();
        return view('vendor.adminlte.roles.index', compact('roles'));
    }

    public function create()
    {

        ////$status = Status::getKeys();
        return view('vendor.adminlte.roles.form', compact('status'));
    }

    public function store(Request $request)
    {

        try {
            $dateForm = $request->all();
            $validate = validator($dateForm, $this->role->rules);

            if ($validate->fails()) {
                return redirect()
                    ->route('roles.create')
                    ->withErrors($validate)
                    ->withInput();

            }

            $insert = $this->role->create($dateForm);

            $insert->save();

            if ($insert) {

                return redirect()->route('roles.index')->with('success', MessagesEnum::getValue('success'));
            } else {

                return redirect()->back();
            }

        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        try {
            $status = RoleStatus::getKeys();
            $role = $this->role->find($id);
            return view('vendor.adminlte.roles.form', compact('role', 'status'));
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            $dateForm = $request->all();

            $update = $this->role->findOrFail($id)->update($dateForm);
            if ($update)
                return redirect()->route('roles.index')->with('success', MessagesEnum::getValue('edit'));
            else
                return redirect()->route('roles.editar', $id);
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $roles = $this->role->findOrFail($id)->delete();
            $response = array('status' => 'success');
        } catch (Exception $e) {
            $response = array('status' => 'fail', 'error' => $e->getMessage());
        }
        return response()->json($response);
    }


}
