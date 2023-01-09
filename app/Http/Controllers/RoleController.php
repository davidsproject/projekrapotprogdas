<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = Role::latest()->get();
      $title = "Role Index";

      return view('role.index', compact('title', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Role Create";

        return view('role.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'namarole' => 'required',
          'deskripsirole' => 'required'
        ]);

        Role::create([
          'namarole' => $request->get('namarole'),
          'deskripsirole' => $request->get('deskripsirole')
        ]);

        return redirect()->back()->with('message', 'Role Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $title = "Role Edit";
        return view('role.edit', compact('role', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'namarole' => 'required|min:1',
          'deskripsirole' => 'required|min:1'
        ]);

        $role = Role::find($id);
        $role->namarole = $request->get('namarole');
        $role->deskripsirole = $request->get('deskripsirole');
        $role->save();

        return redirect()->route('role.index')->with('message', 'Role Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('role.index')->with('message', 'Role Berhasil Dihapus');
    }
}
