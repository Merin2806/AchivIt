<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAchievementRequest;
use App\Models\Achievement;
use App\Models\Category;
use App\Models\FacultyAssignment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AchievementController extends Controller
{
    /**
     * Display a listing of the user's achievements.
     */
    public function index(): View
    {
        $achievements = auth()->user()->achievements()->with('category')->latest()->paginate(10);
        return view('student.history', compact('achievements'));
    }

    /**
     * Show the form for creating a new achievement.
     */
    public function create(): View
    {
        $categories = Category::orderBy('domain')->orderBy('category_name')->get();
        return view('student.submit', compact('categories'));
    }

    /**
     * Store a newly created achievement in storage.
     */
    public function store(StoreAchievementRequest $request): RedirectResponse
    {   
        // Get the authenticated student
        $student = auth()->user();
        
        // Retrieve the category to get the domain
        $category = Category::findOrFail($request->category_id);
        
        // Get student's department
        $departmentId = $student->department_id;

        // Find the faculty assignment for this department and domain
        $facultyAssignment = FacultyAssignment::where('department_id', $departmentId)
            ->where('domain', $category->domain)
            ->first();
    
        $facultyId = $facultyAssignment?->faculty_id;
        
        // Handle file upload
        $certificatePath = null;
        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $fileName = time() . '_' . $student->id . '_' . $file->getClientOriginalName();
            $certificatePath = $file->storeAs('achievements', $fileName, 'public');
 
        }

        // Create the achievement record
        Achievement::create([
            'student_id' => $student->id,
            'faculty_id' => $facultyId,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'organization' => $request->organization,
            'description' => $request->description,
            'achievement_date' => $request->achievement_date,
            'certificate' => $certificatePath,
            'status' => 'Pending',
            'remark' => null,
            'reviewed_at' => null,
        ]);
    

        return redirect()->route('dashboard')
            ->with('success', 'Achievement submitted successfully and sent to your faculty advisor.');
    }
}
