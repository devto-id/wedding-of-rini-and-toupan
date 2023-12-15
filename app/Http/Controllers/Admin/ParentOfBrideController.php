<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListViewRequest;
use App\Models\ParentsOfBrides;
use App\Utilities\AppUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParentOfBrideController extends Controller
{
    public function index(ListViewRequest $request)
    {
        $query = ParentsOfBrides::query();

        return view('admin.parent.index', [
            'list_view' => AppUtility::listView($query, $request),
            'parentsOfBrides' => ParentsOfBrides::all(),
        ]);
    }

    public function create()
    {
        return view('admin.parent.form');
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'name_dad_of_bride' => 'required',
            'name_mom_of_bride' => 'required',
            'name_dad_of_groom' => 'required',
            'name_mom_of_groom' => 'required',
        ]);

        $parentOfBride = ParentsOfBrides::create($validated);

        return redirect(route('admin.parent.index'))->with('message', [
            ['success', 'Data saved successfully.']
        ]);
    }


    public function edit(ParentsOfBrides $parentOfBride)
    {
        return view('admin.parent.form', [
            'data' => $parentOfBride
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'name_dad_of_bride' => 'required',
            'name_mom_of_bride' => 'required',
            'name_dad_of_groom' => 'required',
            'name_mom_of_groom' => 'required',
        ]);

        $parentOfBride = ParentsOfBrides::find($id);

        if (!$parentOfBride) {
            return redirect(route('admin.parent.index'))->with('message', [
                ['error', 'Data not found.']
            ]);
        }

        $parentOfBride->update($validated);

        return redirect(route('admin.parent.index'))->with('message', [
            ['success', 'Data saved successfully.']
        ]);
    }


    public function destroy(ParentsOfBride $parentOfBride)
    {
        $parentOfBride->delete();

        return redirect(route('admin.parent.index'))->with('message', [
            ['success', 'Data deleted successfully.']
        ]);
    }
}

