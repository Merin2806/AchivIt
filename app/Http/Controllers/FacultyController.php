<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FacultyController extends Controller
{
    /**
     * Display the faculty dashboard.
     */
    public function dashboard(): View
    {
        $pendingAchievements = Achievement::with([
            'student.department',
            'category'
        ])
        ->where('faculty_id', auth()->id())
        ->where('status', 'Pending')
        ->latest()
        ->paginate(5);

        $approvedCount = Achievement::where('faculty_id', auth()->id())->where('status', 'Approved')->count();

        $pendingCount = Achievement::where('faculty_id', auth()->id())->where('status', 'Pending')->count();

        $rejectedCount = Achievement::where('faculty_id', auth()->id())->where('status', 'Rejected')->count();

        return view('faculty.dashboard', compact('pendingAchievements', 'pendingCount', 'approvedCount', 'rejectedCount'));
    }

    /**
     * Display the submission review page.
     */
    public function review(Request $request): View
    {
        $achievement = Achievement::with(['student.department', 'category'])->findOrFail($request->query('id'));

        return view('faculty.review', compact('achievement'));
    }

    /**
     * Process the submission review (Approve / Reject).
     */
    public function processReview(Request $request, $id): RedirectResponse
    {
        $achievement = Achievement::findOrFail($id);

        if ($achievement->status !== 'Pending') {
            return redirect()->route('faculty.dashboard')
                ->with('error', 'Only Pending achievements may be reviewed.');
        }

        $action = $request->input('action');
        $remark = $request->input('remark');

        if ($action === 'approve') {
            $achievement->status = 'Approved';
            $achievement->reviewed_at = now();
            $achievement->remark = $remark;
            $achievement->save();

            return redirect()->route('faculty.dashboard')
                ->with('success', 'Achievement approved successfully.');
        } elseif ($action === 'reject') {
            if (empty($remark)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Remarks are required for rejecting an achievement.');
            }

            $achievement->status = 'Rejected';
            $achievement->reviewed_at = now();
            $achievement->remark = $remark;
            $achievement->save();

            return redirect()->route('faculty.dashboard')
                ->with('success', 'Achievement rejected successfully.');
        }

        return redirect()->route('faculty.dashboard');
    }
}
