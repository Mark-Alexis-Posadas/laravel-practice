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

        $query = PersonalInformation::query();

        if (request()->filled('search')) {

            $search = request('search');

            $query->where(function ($q) use ($search) {

                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }


        if (request()->filled('gender')) {

            $query->where('gender', request('gender'));
        }


        if (request()->filled('sort')) {

            switch (request('sort')) {

                case 'id_asc':
                    $query->orderBy('id', 'asc');
                    break;

                case 'id_desc':
                    $query->orderBy('id', 'desc');
                    break;

                case 'first_name_asc':
                    $query->orderBy('first_name', 'asc');
                    break;

                case 'first_name_desc':
                    $query->orderBy('first_name', 'desc');
                    break;

                case 'birthday_asc':
                    $query->orderBy('birthday', 'asc');
                    break;

                case 'birthday_desc':
                    $query->orderBy('birthday', 'desc');
                    break;

                default:
                    $query->latest();
                    break;
            }
        } else {

            $query->latest();
        }


        $personalInformations = $query
            ->paginate(10)
            ->withQueryString();

        return view(
            'personal-information.index',
            compact('personalInformations')
        );

        // $personalInformations = PersonalInformation::latest()->paginate(2);

        // return view(
        //     'personal-information.index',
        //     compact('personalInformations')
        // );
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

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Record updated successfully.');
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
