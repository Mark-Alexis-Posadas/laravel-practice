<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use App\Exports\PersonalInformationExport;
use App\Imports\PersonalInformationImport;
use App\Http\Requests\StorePersonalInformationRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;
use Maatwebsite\Excel\Facades\Excel;

class PersonalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPeople = PersonalInformation::count();

        $totalMale = PersonalInformation::where('gender', 'Male')->count();

        $totalFemale = PersonalInformation::where('gender', 'Female')->count();

        $totalDeleted = PersonalInformation::onlyTrashed()->count();

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

        $deletedPeople = PersonalInformation::onlyTrashed()
            ->latest()
            ->get();

        return view(
            'personal-information.index',
            compact(
                'personalInformations',
                'deletedPeople',
                'totalPeople',
                'totalMale',
                'totalFemale',
                'totalDeleted'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonalInformationRequest $request)
    {
        PersonalInformation::create($request->validated());

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Person added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalInformation $personalInformation)
    {
        return view(
            'personal-information.show',
            compact('personalInformation')
        );
    }

    /**
     * Update the specified resource.
     */
    public function update(
        UpdatePersonalInformationRequest $request,
        PersonalInformation $personalInformation
    ) {
        $personalInformation->update($request->validated());

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(PersonalInformation $personalInformation)
    {
        $personalInformation->delete();

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Record deleted successfully.');
    }

    public function export()
    {
        return Excel::download(
            new PersonalInformationExport(),
            'personal-information.xlsx'
        );
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(
            new PersonalInformationImport(),
            $request->file('file')
        );

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Excel imported successfully.');
    }

    public function restore($id)
    {
        PersonalInformation::onlyTrashed()
            ->findOrFail($id)
            ->restore();

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Person restored successfully.');
    }

    public function forceDelete($id)
    {
        PersonalInformation::onlyTrashed()
            ->findOrFail($id)
            ->forceDelete();

        return redirect()
            ->route('personal-information.index')
            ->with('success', 'Person permanently deleted.');
    }
}
