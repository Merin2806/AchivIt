@php
    $student_name = $achievement->student->name;
    $roll_no = $achievement->student->roll_no;
    $initials = strtoupper(substr($student_name, 0, 2));

    $colors = ['blue-purple', 'green-emerald', 'red-orange', 'amber-orange', 'cyan'];
    $avatar_color = $colors[$achievement->id % count($colors)];

    $title = $achievement->title;
    $category = $achievement->category->category_name;
    $domain = $achievement->category->domain;
    $description = $achievement->description ?? 'Successfully completed the activity and submitted the required documents for verification.';
    $filename = $achievement->certificate ? basename($achievement->certificate) : (str_replace(' ', '_', $title) . '_Certificate.pdf');

    $dept = $achievement->student->department->name ?? 'Department';
    $role = auth()->user()->faculty_role ?? 'Faculty';

    $academicYear = '-';
    if ($achievement->student->year) {
        $yearNum = (int)$achievement->student->year;
        $suffix = match($yearNum) {
            1 => 'st',
            2 => 'nd',
            3 => 'rd',
            4 => 'th',
            default => ''
        };
        $academicYear = $yearNum . $suffix . ' Year';
        if ($achievement->student->batch) {
            $academicYear .= ' (' . $achievement->student->batch . ')';
        }
    }

    $previousApprovalsCount = $achievement->student->achievements()->where('status', 'Approved')->count();

    $pendingList = App\Models\Achievement::where('faculty_id', auth()->id())
        ->where('status', 'Pending')
        ->latest()
        ->pluck('id')
        ->toArray();
    $currentIndex = array_search($achievement->id, $pendingList);
    $totalPending = count($pendingList);
    $currentPosition = $currentIndex !== false ? ($currentIndex + 1) : 1;
    if ($currentIndex === false) {
        $totalPending = $totalPending > 0 ? ($totalPending + 1) : 1;
    }
@endphp
<x-faculty-layout>
    @section('top-bar-left')
        <a href="{{ route('faculty.dashboard') }}" class="btn btn-ghost btn-sm rounded-lg shrink-0">
            <!-- Back Arrow icon -->
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Back</span>
        </a>
        <h2 class="text-[16px] font-extrabold text-[#1E293B] tracking-tight ml-2 hidden sm:inline">Review Submission</h2>
        <span class="badge badge-pending ml-2">&#9203; Pending Review</span>
    @endsection

    <div class="max-w-[1100px] mx-auto text-left flex flex-col gap-4">
        
        <!-- Utility row above layout -->
        <div class="flex justify-between items-center text-xs font-semibold text-[#64748B] mb-2">
            <span>Reviewing <strong class="text-[#1E293B]">{{ $currentPosition }} of {{ $totalPending }}</strong> pending submissions</span>
            <div class="flex gap-2">
                @if($currentIndex !== false && $currentIndex > 0)
                    <a href="{{ route('faculty.review', ['id' => $pendingList[$currentIndex - 1]]) }}" class="btn btn-ghost btn-sm rounded-lg py-1 px-3 text-xs bg-white flex items-center">&larr; Previous</a>
                @else
                    <button disabled class="btn btn-ghost btn-sm rounded-lg py-1 px-3 text-xs bg-white opacity-50 cursor-not-allowed">&larr; Previous</button>
                @endif

                @if($currentIndex !== false && $currentIndex < $totalPending - 1)
                    <a href="{{ route('faculty.review', ['id' => $pendingList[$currentIndex + 1]]) }}" class="btn btn-ghost btn-sm rounded-lg py-1 px-3 text-xs bg-white flex items-center">Next &rarr;</a>
                @else
                    <button disabled class="btn btn-ghost btn-sm rounded-lg py-1 px-3 text-xs bg-white opacity-50 cursor-not-allowed">Next &rarr;</button>
                @endif
            </div>
        </div>

        <!-- 2-Column Review Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 review-layout">
            
            <!-- Left Column: Student info, details, decision -->
            <div class="flex flex-col gap-4">
                
                <!-- Panel: Review Information -->
                <div class="card-elevated p-6 flex flex-col">
                    <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider mb-4 block">Review Information</span>
                    
                    <div class="flex flex-col divide-y divide-[#E2E8F0] text-sm">
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Department</span>
                            <span class="font-bold text-[#1E293B]">{{ $dept }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Reviewer Role</span>
                            <span class="font-bold text-[#1E293B]">{{ $role }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Achievement Domain</span>
                            <span class="font-bold text-[#1E293B]">{{ $domain }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Category</span>
                            <span class="font-bold text-[#1E293B]">{{ $category }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Panel 1: Student Information -->
                <div class="card-elevated p-6 flex flex-col">
                    <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider mb-4 block">Student Information</span>
                    
                    <!-- Highlighted student summary row -->
                    <div class="flex items-center gap-4 bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 mb-4">
                        <x-avatar initials="{{ $initials }}" color="{{ $avatar_color }}" />
                        <div class="flex flex-col text-left">
                            <span class="text-base font-extrabold text-[#1E293B]">{{ $student_name }}</span>
                            <span class="text-xs text-[#64748B] font-semibold mt-0.5">Roll No: {{ $roll_no }} • Sem {{ $achievement->student->semester ?? 'N/A' }}</span>
                            <span class="text-[11px] text-[#94A3B8] font-bold uppercase mt-0.5 tracking-wider">{{ $dept }} Department</span>
                        </div>
                    </div>

                    <!-- Details rows -->
                    <div class="flex flex-col divide-y divide-[#E2E8F0] text-sm">
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Email Address</span>
                            <span class="font-bold text-[#1E293B]">
                                {{ $achievement->student->email ?? '-' }}
                            </span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Phone Number</span>
                            <span class="font-bold text-[#1E293B]">{{ $achievement->student->phone ?? '-' }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Academic Year</span>
                            <span class="font-bold text-[#1E293B]">
                                {{ $academicYear }}
                            </span>
                        </div>
                        <div class="py-3 flex justify-between items-center">
                            <span class="text-[#64748B] font-medium">Previous Approvals</span>
                            <span class="font-extrabold text-[#22C55E] bg-[#F0FDF4] px-2.5 py-0.5 rounded-full border border-[#DCFCE7] text-xs">{{ $previousApprovalsCount }} approved</span>
                        </div>
                    </div>
                </div>

                <!-- Panel 2: Achievement Details -->
                <div class="card-elevated p-6 flex flex-col">
                    <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider mb-4 block">Achievement Details</span>
                    
                    <div class="flex flex-col divide-y divide-[#E2E8F0] text-sm mb-4">
                        <div class="py-3 flex justify-between items-start gap-4">
                            <span class="text-[#64748B] font-medium shrink-0">Title</span>
                            <span class="font-bold text-[#1E293B] text-right">{{ $title }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Category</span>
                            <span class="badge badge-blue">{{ $category }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Date of Achievement</span>
                            <span class="font-bold text-[#1E293B]">{{ $achievement->achievement_date->format('d M Y') }}</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Submitted On</span>
                            <span class="text-[#64748B] font-medium">{{ $achievement->created_at->format('d M Y, h:i A') }}</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-start">
                        <span class="text-xs font-bold text-[#64748B] mb-2">Description</span>
                        <div class="w-full bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 text-xs text-[#64748B] leading-relaxed text-left">
                            {{ $description }}
                        </div>
                    </div>
                </div>

                <!-- Panel 3: Decision Card -->
                <div class="card-elevated p-6 flex flex-col">
                    <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider mb-4 block">Your Decision</span>
                    
                    <form action="{{ route('faculty.review.submit', $achievement->id) }}" method="POST" class="flex flex-col text-left">
                        @csrf
                        <div class="form-group">
                            <label for="remarks">Remarks / Feedback (Required for Rejection)</label>
                            <textarea id="remarks" name="remark" rows="3" placeholder="Write review comments or reason for rejection...">{{ old('remark') }}</textarea>
                        </div>

                        <!-- 2-column actions -->
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <button type="submit" name="action" value="reject" class="btn btn-danger w-full rounded-lg py-2.5 flex items-center justify-center gap-1.5 font-bold">
                                <span>✕</span> Reject
                            </button>
                            <button type="submit" name="action" value="approve" class="btn btn-success w-full rounded-lg py-2.5 flex items-center justify-center gap-1.5 font-bold">
                                <span>✓</span> Approve
                            </button>
                        </div>

                        <!-- Warning Callout Box -->
                        <div class="border border-[#FFFBEB] bg-[#FFFBEB] rounded-xl p-3 flex gap-2 text-left">
                            <span class="text-base shrink-0">⚠️</span>
                            <span class="text-[11px] text-[#B45309] font-medium leading-normal">
                                This action is final. The student will be notified immediately via college email.
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column: Tall Document Preview Card -->
            <div class="card-elevated p-6 flex flex-col h-full justify-between">
                <div>
                    <!-- Header Row -->
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider">Document Preview</span>
                        
                        <div class="flex gap-1.5">
                            @if($achievement->certificate)
                                <a href="{{ asset('storage/'.$achievement->certificate) }}" download class="btn btn-ghost btn-sm rounded-lg p-1.5 text-xs bg-white shrink-0" title="Download Certificate">
                                    <!-- Download icon -->
                                    <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </a>
                                <a href="{{ asset('storage/'.$achievement->certificate) }}" target="_blank" class="btn btn-ghost btn-sm rounded-lg p-1.5 text-xs bg-white shrink-0" title="View Certificate">
                                    <!-- Open External icon -->
                                    <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            @else
                                <button disabled class="btn btn-ghost btn-sm rounded-lg p-1.5 text-xs bg-white shrink-0 opacity-50 cursor-not-allowed" title="No Certificate Uploaded">
                                    <!-- Download icon -->
                                    <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                </button>
                                <button disabled class="btn btn-ghost btn-sm rounded-lg p-1.5 text-xs bg-white shrink-0 opacity-50 cursor-not-allowed" title="No Certificate Uploaded">
                                    <!-- Open External icon -->
                                    <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>

                    <!-- Mock PDF Viewer -->
                    <div class="doc-preview-inner rounded-xl overflow-hidden border border-[#E2E8F0] shadow-sm mb-4">
                        <!-- Toolbar strip -->
                        <div class="h-10 bg-[#F8FAFC] border-b border-[#E2E8F0] px-4 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <!-- Red PDF logo -->
                                <span class="w-6 h-6 rounded bg-[#FEF2F2] border border-[#FEE2E2] flex items-center justify-center text-[#EF4444] text-[10px] font-extrabold">PDF</span>
                                <span class="text-xs font-bold text-[#1E293B] truncate max-w-[180px]">{{ $filename }}</span>
                            </div>
                            <span class="text-[10px] text-[#64748B] font-semibold">Page 1 of 1</span>
                        </div>

                        <!-- Document Body (Mock certificate) -->
                        <div class="p-8 flex-1 bg-[#F8FAFC] flex items-center justify-center">
                            <!-- Paper inside -->
                            <div class="w-full max-w-[340px] bg-white border border-[#E2E8F0] rounded shadow-md p-6 doc-lines-bg relative aspect-[1.41] flex flex-col justify-between">
                                <!-- Border border -->
                                <div class="absolute inset-1.5 border border-[#BFDBFE] rounded"></div>
                                
                                <!-- Certificate Header -->
                                <div class="flex flex-col items-center mt-2 relative z-10">
                                    <!-- Gold/Amber circular trophy badge -->
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#FEF3C7] to-[#FDE68A] border border-[#F59E0B] flex items-center justify-center shadow-sm text-xl mb-2">
                                        🏆
                                    </div>
                                    <!-- Thick dark placeholder line -->
                                    <div class="w-32 h-2.5 bg-[#1E293B] rounded-full mb-1.5"></div>
                                    <!-- Thin muted placeholder line -->
                                    <div class="w-24 h-1.5 bg-[#94A3B8] rounded-full"></div>
                                </div>

                                <!-- Body lines -->
                                <div class="flex flex-col gap-1.5 px-4 my-2 relative z-10">
                                    <div class="w-full h-1 bg-[#E2E8F0] rounded-full"></div>
                                    <div class="w-4/5 h-1 bg-[#E2E8F0] rounded-full mx-auto"></div>
                                    <div class="w-5/6 h-1 bg-[#E2E8F0] rounded-full mx-auto"></div>
                                    <div class="w-2/3 h-1 bg-[#E2E8F0] rounded-full mx-auto"></div>
                                </div>

                                <!-- Footer blocks (Signature stamps) -->
                                <div class="flex justify-between items-end px-2 mb-1 relative z-10">
                                    <!-- Signature Block -->
                                    <div class="flex flex-col items-center">
                                        <div class="w-10 h-3 bg-[#DBEAFE] rounded-full mb-1"></div>
                                        <div class="w-8 h-1 bg-[#E2E8F0] rounded-full"></div>
                                    </div>
                                    <!-- Stamp Block -->
                                    <div class="flex flex-col items-center">
                                        <div class="w-10 h-3 bg-[#DBEAFE] rounded-full mb-1"></div>
                                        <div class="w-8 h-1 bg-[#E2E8F0] rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2x2 Grid of Metadata Tiles -->
                <div class="grid grid-cols-2 gap-3 text-left">
                    <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-3.5 flex flex-col justify-center">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-0.5">File Type</span>
                        <span class="text-xs font-bold text-[#1E293B]">PDF Document</span>
                    </div>

                    <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-3.5 flex flex-col justify-center">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-0.5">File Size</span>
                        <span class="text-xs font-bold text-[#1E293B]">1.24 MB</span>
                    </div>

                    <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-3.5 flex flex-col justify-center">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-0.5">Uploaded On</span>
                        <span class="text-xs font-bold text-[#1E293B]">{{ $achievement->created_at->format('d M Y') }}</span>
                    </div>

                    <div class="bg-[#F0FDF4] border border-[#DCFCE7] rounded-xl p-3.5 flex flex-col justify-center text-[#22C55E]">
                        <span class="text-[10px] font-extrabold text-[#16A34A] uppercase tracking-wider block mb-0.5">SHA256 Signature</span>
                        <span class="text-xs font-bold">&check; Authentic</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-faculty-layout>
