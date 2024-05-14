<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index(){
        $role = Role::all();
        // $lastRole = Role::select('id')->orderBy('id', 'desc')->first();
        // $id = $lastRole->id + 1;
        // dd($role);
        return view('admin.role.index', compact('role'));
    }

    public function update_role(Request $request, $id)
    {
        $rules = ['level' => 'required'];
        $messages = ['level.required' => 'Level tidak boleh kosong!'];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $role = Role::findOrFail($id);
        $role->level = $request->level;
        $role->save();

        return redirect()->back()->with('success', 'Role berhasil diperbarui');
    }

    public function delete_role($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back()->with('success', 'Role berhasil dihapus');

    }


}
