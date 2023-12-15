<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListViewRequest;
use App\Models\ProfileBrides;
use App\Utilities\AppUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileBrideController extends Controller
{
    public function index(ListViewRequest $request)
    {
        $query = ProfileBrides::query();

        return view('admin.profileBride.index', [
            'list_view' => AppUtility::listView($query, $request),
            'profileBrides' => ProfileBrides::all(),
        ]);
    }

    public function create()
    {
        return view('admin.profileBride.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo_groom' => 'required|image|mimes:jpeg,png,jpg,gif',
            'photo_bride' => 'required|image|mimes:jpeg,png,jpg,gif',
            'first_name_bride' => 'required',
            'last_name_bride' => 'required',
            'first_name_groom' => 'required',
            'last_name_groom' => 'required',
            'son_of' => 'required',
            'daughter_of' => 'required',
            'ig_groom' => 'required',
            'ig_bride' => 'required',
        ]);

        if ($request->hasFile('photo_groom')) {
            $imagePath = $request->file('photo_groom')->store('profile-photos', 'public');
            $validated['photo_groom'] = $imagePath;
        }

        if ($request->hasFile('photo_bride')) {
            $imagePath = $request->file('photo_bride')->store('profile-photos', 'public');
            $validated['photo_bride'] = $imagePath;
        }

        ProfileBrides::create($validated);

        return redirect(route('admin.profileBride.index'))->with('message', [
            ['success', 'Data saved successfully.']
        ]);
    }

    public function edit(ProfileBrides $profileBride)
    {
        return view('admin.profileBride.form', [
            'data' => $profileBride
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'photo_groom' => 'image|mimes:jpeg,png,jpg,gif',
            'photo_bride' => 'image|mimes:jpeg,png,jpg,gif',
            'first_name_bride' => 'required',
            'last_name_bride' => 'required',
            'first_name_groom' => 'required',
            'last_name_groom' => 'required',
            'son_of' => 'required',
            'daughter_of' => 'required',
            'ig_groom' => 'required',
            'ig_bride' => 'required',
        ]);

        $profileBride = ProfileBrides::find($id);

        if (!$profileBride) {
            return redirect(route('admin.profileBride.index'))->with('message', [
                ['error', 'Profile not found.']
            ]);
        }

        if ($request->hasFile('photo_groom')) {
            $imagePath = $request->file('photo_groom')->store('profile-photos', 'public');
            $validated['photo_groom'] = $imagePath;

            if ($profileBride->photo_groom) {
                Storage::disk('public')->delete($profileBride->photo_groom);
            }
        } else {
            $validated['photo_groom'] = $profileBride->photo_groom;
        }

        if ($request->hasFile('photo_bride')) {
            $imagePath = $request->file('photo_bride')->store('profile-photos', 'public');
            $validated['photo_bride'] = $imagePath;

            if ($profileBride->photo_bride) {
                Storage::disk('public')->delete($profileBride->photo_bride);
            }
        } else {
            $validated['photo_bride'] = $profileBride->photo_bride;
        }

        $profileBride->update($validated);

        return redirect(route('admin.profileBride.index'))->with('message', [
            ['success', 'Data saved successfully.']
        ]);
    }

    public function destroy(ProfileBrides $profileBride)
    {
        $profileBride->delete();

        return redirect(route('admin.profileBride.index'))->with('message', [
            ['success', 'Data deleted successfully.']
        ]);
    }
}
