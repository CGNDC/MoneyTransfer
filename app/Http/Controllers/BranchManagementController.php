<?php

namespace App\Http\Controllers;

use App\Models\tbl_branch_profile;
use Illuminate\Http\Request;

class BranchManagementController extends Controller
{
    public function create()
    {
        $branches = tbl_branch_profile::all();
        return view('BranchManagement.register', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required|string|max:255',
            'country_iso_code' => 'nullable|string|max:255',
        ]);

        tbl_branch_profile::create([
            'branch_name' => $request->branch_name,
            'branch_code' => $this->generateRandomCode(),
            'country_iso_code' => $request->country_iso_code,
        ]);
        return redirect()->route('dashboard')->with('success', 'Branch created successfully.');
    }

    public function delete($id){
        $branch = tbl_branch_profile::findOrFail($id);
        $branch->delete();
        return redirect()->route('BranchManagement');
    }

    public function update(Request $request, $id){
        $branch = tbl_branch_profile::findOrFail($id);
        $branch->update([
            'branch_name' => $request->branch_name,
            'country_iso_code' => $request->country_iso_code,
        ]);
        return redirect()->route('BranchManagement');
    }

    public function edit($id){
        $branch = tbl_branch_profile::findOrFail($id);
        return view('BranchManagement.edit', compact('branch'));
    }
    

    private function generateRandomCode()
    {
        return substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
    }
}
