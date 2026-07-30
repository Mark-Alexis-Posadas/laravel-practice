<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use App\Imports\PersonalInformationImport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Http\Requests\StorePersonalInformationRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;


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
        $people = PersonalInformation::orderBy('id')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers
        $headers = [
            'ID',
            'First Name',
            'Middle Name',
            'Last Name',
            'Birthday',
            'Gender',
            'Email',
            'Phone',
            'Address',
        ];

        $column = 'A';

        foreach ($headers as $header) {
            $sheet->setCellValue($column . '1', $header);
            $column++;
        }

        $row = 2;

        foreach ($people as $person) {

            $sheet->setCellValue("A{$row}", $person->id);
            $sheet->setCellValue("B{$row}", $person->first_name);
            $sheet->setCellValue("C{$row}", $person->middle_name);
            $sheet->setCellValue("D{$row}", $person->last_name);
            $sheet->setCellValue("E{$row}", $person->birthday);
            $sheet->setCellValue("F{$row}", $person->gender);
            $sheet->setCellValue("G{$row}", $person->email);
            $sheet->setCellValue("H{$row}", $person->phone);
            $sheet->setCellValue("I{$row}", $person->address);

            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'I') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(
            function () use ($writer) {
                $writer->save('php://output');
            },
            'personal-information.xlsx',
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]
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
