<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationProfileController extends Controller
{
    public function edit()
    {
        $profile = OrganizationProfile::firstOrNew();
        return view('admin.organization-profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vision' => 'nullable|string',
            'mission' => 'nullable|array',
            'mission.*' => 'string|max:255',
            'logo' => 'nullable|image|max:2048',
            'history' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'video_url' => 'nullable|url',
        ]);

        $profile = OrganizationProfile::firstOrNew();

        $data = $request->except(['logo', 'mission']);
        $data['mission'] = array_values(array_filter($request->input('mission', []), function ($value) {
            return !is_null($value) && $value !== '';
        }));

        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::delete('public/' . $profile->logo);
            }
            $data['logo'] = $request->file('logo')->store('organization', 'public');
        }

        $profile->fill($data);
        $profile->save();

        return redirect()->route('admin.organization-profile.edit')->with('success', 'Profil organisasi berhasil diperbarui.');
    }
}
