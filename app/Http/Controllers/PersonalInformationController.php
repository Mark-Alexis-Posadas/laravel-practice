<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ===========================
        // API VERSION
        // ===========================
        //
        // $personalInformations = PersonalInformation::latest()->get();
        //
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Personal information retrieved successfully.',
        //     'data' => $personalInformations,
        // ], 200);

        // ===========================
        // BLADE VERSION
        // ===========================

        $personalInformations = PersonalInformation::latest()->paginate(2);

        return view(
            'personal-information.index',
            compact('personalInformations')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ===========================
        // API VERSION
        // ===========================
        //
        // $validated = $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'middle_name' => 'nullable|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'birthday' => 'required|date',
        //     'gender' => 'required|string|max:50',
        //     'email' => 'required|email|unique:personal_information,email',
        //     'phone' => 'required|string|max:20',
        //     'address' => 'required|string',
        // ]);
        //
        // $personalInformation = PersonalInformation::create($validated);
        //
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Personal information created successfully.',
        //     'data' => $personalInformation,
        // ], 201);
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:50',
            'email' => 'required|email|unique:personal_information,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        PersonalInformation::create($validated);

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Person added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalInformation $personalInformation)
    {
        // API Version
        //
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Personal information retrieved successfully.',
        //     'data' => $personalInformation,
        // ]);

        return view(
            'personal-information.show',
            compact('personalInformation')
        );
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, PersonalInformation $personalInformation)
    {
        // API Version
        //
        // $validated = ...
        // $personalInformation->update($validated);
        // return response()->json(...);

        // Blade version mamaya.
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(PersonalInformation $personalInformation)
    {
        // API Version
        //
        // $personalInformation->delete();
        //
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Deleted successfully.',
        // ]);

        $personalInformation->delete();

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Record deleted successfully.');
    }
}