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
        $personalInformations = PersonalInformation::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Personal information retrieved successfully.',
            'data' => $personalInformations,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        $personalInformation = PersonalInformation::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Personal information created successfully.',
            'data' => $personalInformation,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalInformation $personalInformation)
    {
        return response()->json([
            'success' => true,
            'message' => 'Personal information retrieved successfully.',
            'data' => $personalInformation,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalInformation $personalInformation)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:50',
            'email' => 'required|email|unique:personal_information,email,' . $personalInformation->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $personalInformation->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Personal information updated successfully.',
            'data' => $personalInformation,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalInformation $personalInformation)
    {
        $personalInformation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Personal information deleted successfully.',
        ], 200);
    }
}