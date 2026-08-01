<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        $totalPeople = PersonalInformation::count();
        $totalMale = PersonalInformation::where('gender', 'Male')->count();
        $totalFemale = PersonalInformation::where('gender', 'Female')->count();
        $totalDeleted = PersonalInformation::onlyTrashed()->count();
        $recentStudents = PersonalInformation::latest()->take(6)->get();

        return view('pages.dashboard', compact(
            'totalPeople',
            'totalMale',
            'totalFemale',
            'totalDeleted',
            'recentStudents'
        ));
    }

    public function students()
    {
        $students = PersonalInformation::latest()->paginate(10);

        return view('pages.students', compact('students'));
    }

    public function courses()
    {
        $courses = [
            ['name' => 'Computer Science', 'code' => 'CS101', 'students' => 128],
            ['name' => 'Business Administration', 'code' => 'BA205', 'students' => 94],
            ['name' => 'Information Technology', 'code' => 'IT310', 'students' => 78],
            ['name' => 'Mechanical Engineering', 'code' => 'ME220', 'students' => 52],
            ['name' => 'Psychology', 'code' => 'PSY110', 'students' => 64],
        ];

        return view('pages.courses', compact('courses'));
    }

    public function subjects()
    {
        $subjects = [
            ['name' => 'Mathematics', 'code' => 'MATH101', 'credits' => 3],
            ['name' => 'Algorithms', 'code' => 'CS201', 'credits' => 4],
            ['name' => 'Microeconomics', 'code' => 'ECON101', 'credits' => 3],
            ['name' => 'Database Systems', 'code' => 'IT215', 'credits' => 4],
            ['name' => 'English Communication', 'code' => 'ENG102', 'credits' => 2],
        ];

        return view('pages.subjects', compact('subjects'));
    }

    public function instructors()
    {
        $instructors = [
            ['name' => 'Dr. Amina Yusuf', 'department' => 'Computer Science', 'email' => 'amina.yusuf@example.edu'],
            ['name' => 'Prof. James Okoro', 'department' => 'Business Administration', 'email' => 'james.okoro@example.edu'],
            ['name' => 'Dr. Priya Singh', 'department' => 'Information Technology', 'email' => 'priya.singh@example.edu'],
            ['name' => 'Eng. Michael Ade', 'department' => 'Mechanical Engineering', 'email' => 'michael.ade@example.edu'],
        ];

        return view('pages.instructors', compact('instructors'));
    }

    public function enrollments()
    {
        $enrollments = [
            ['student' => 'Aisha Bello', 'program' => 'Computer Science', 'status' => 'Active', 'date' => '2026-06-10'],
            ['student' => 'David Nwosu', 'program' => 'Business Administration', 'status' => 'Active', 'date' => '2026-05-04'],
            ['student' => 'Grace Okafor', 'program' => 'Information Technology', 'status' => 'Pending', 'date' => '2026-07-01'],
            ['student' => 'Ibrahim Musa', 'program' => 'Mechanical Engineering', 'status' => 'Active', 'date' => '2026-04-18'],
            ['student' => 'Chinelo Eze', 'program' => 'Psychology', 'status' => 'Completed', 'date' => '2026-03-22'],
        ];

        return view('pages.enrollments', compact('enrollments'));
    }

    public function reports()
    {
        $reportCards = [
            ['title' => 'Enrollment Growth', 'value' => '12.4%', 'description' => 'Increase in registrations over the last month.'],
            ['title' => 'Student Retention', 'value' => '87%', 'description' => 'Students continuing from previous term.'],
            ['title' => 'Course Completion', 'value' => '74%', 'description' => 'Courses finished on schedule.'],
        ];

        return view('pages.reports', compact('reportCards'));
    }
}
