<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('order')->get();
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division' => 'nullable|string|in:BPH,Bidang Kader,Bidang Organisasi,Bidang RPK,Bidang Hikmah,Bidang TKK,Bidang SBO,Bidang Medkom',
            'position' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $division = $request->division;
                    if ($division === 'BPH') {
                        if (!in_array($value, ['Ketua Umum', 'Sekretaris Umum', 'Bendahara Umum'])) {
                            $fail('Jabatan tidak valid untuk divisi BPH.');
                        }
                    } elseif ($division) {
                        if (!in_array($value, ['Ketua Bidang', 'Sekretaris Bidang', 'Anggota'])) {
                            $fail('Jabatan tidak valid untuk bidang ini.');
                        }
                    }
                },
                function ($attribute, $value, $fail) use ($request) {
                    if ($value !== 'Anggota') {
                        $exists = \App\Models\Member::where('division', $request->division)
                            ->where('position', $value)
                            ->exists();
                        if ($exists) {
                            $fail("$value sudah ada di divisi ini.");
                        }
                    }
                }
            ],
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        Member::create($data);

        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'division' => 'nullable|string|in:BPH,Bidang Kader,Bidang Organisasi,Bidang RPK,Bidang Hikmah,Bidang TKK,Bidang SBO,Bidang Medkom',
            'position' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $division = $request->division;
                    if ($division === 'BPH') {
                        if (!in_array($value, ['Ketua Umum', 'Sekretaris Umum', 'Bendahara Umum'])) {
                            $fail('Jabatan tidak valid untuk divisi BPH.');
                        }
                    } elseif ($division) {
                        if (!in_array($value, ['Ketua Bidang', 'Sekretaris Bidang', 'Anggota'])) {
                            $fail('Jabatan tidak valid untuk bidang ini.');
                        }
                    }
                },
                function ($attribute, $value, $fail) use ($request, $member) {
                    if ($value !== 'Anggota') {
                        $exists = \App\Models\Member::where('division', $request->division)
                            ->where('position', $value)
                            ->where('id', '!=', $member->id)
                            ->exists();
                        if ($exists) {
                            $fail("$value sudah ada di divisi ini.");
                        }
                    }
                }
            ],
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::delete('public/' . $member->photo);
            }
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        $member->update($data);

        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        if ($member->photo) {
            Storage::delete('public/' . $member->photo);
        }
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
