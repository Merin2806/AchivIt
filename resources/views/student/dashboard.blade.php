@php
    $totalSubmitted = Auth::user()->achievements()->count();
    $pendingCount = Auth::user()->achievements()->where('status', 'Pending')->count();
    $approvedCount = Auth::user()->achievements()->where('status', 'Approved')->count();
    $rejectedCount = Auth::user()->achievements()->where('status', 'Rejected')->count();
@endphp

<!-- Greeting Banner -->
<div class="greeting-card bg-gradient-to-r from-[#2563EB] via-[#1D4ED8] to-[#7C3AED] shadow-[0_10px_30px_rgba(37,99,235,0.25)] flex flex-col md:flex-row justify-between items-center gap-6 mb-6">
    <!-- Left info -->
    <div class="flex flex-col items-start text-left">
        <h2 class="text-[24px] font-extrabold text-white tracking-tight mb-2">
            Welcome, {{ explode(' ', Auth::user()->name)[0] }} 👋
        </h2>
        <p class="text-[14px] text-white/80 mb-6 max-w-[500px]">
            @if($pendingCount > 0)
                You have {{ $pendingCount }} submission@if($pendingCount != 1)s@endif pending review by faculty advisors. Keep up the great work!
            @else
                You have no pending submissions. Great job!
            @endif
        </p>
        <div class="flex flex-wrap gap-4 text-[13px] text-white/70 font-semibold">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/10 rounded-full">
                <!-- Cap icon -->
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                </svg>
{{ Auth::user()->department->name ?? 'Not Available' }}, S{{ Auth::user()->semester ?? 'N/A' }}
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/10 rounded-full">
                <!-- ID Card icon -->
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.333 0 4 .667 4 2v1H7v-1c0-1.333 2.667-2 4-2z"/>
                </svg>
                Roll No: {{ Auth::user()->roll_no ?? 'N/A' }}
            </span>
        </div>
    </div>

    <!-- Right illustration box -->
    <div class="w-[120px] h-[100px] rounded-2xl bg-white/10 flex items-center justify-center shrink-0 border border-white/10">
        <svg class="w-14 h-14 text-white/90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
        </svg>
    </div>
</div>

<!-- Stat Cards Grid -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <x-stat-card color="blue" number="{{ $totalSubmitted }}" label="Total Submitted">
        <x-slot name="icon">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
        </x-slot>
    </x-stat-card>

    <x-stat-card color="amber" number="{{ $pendingCount }}" label="Pending Review">
        <x-slot name="icon">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </x-slot>
    </x-stat-card>

    <x-stat-card color="green" number="{{ $approvedCount }}" label="Approved">
        <x-slot name="icon">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
            </svg>
        </x-slot>
    </x-stat-card>

    <x-stat-card color="red" number="{{ $rejectedCount }}" label="Rejected">
        <x-slot name="icon">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </x-slot>
    </x-stat-card>
</div>

<!-- Quick Action Banner -->
<div onclick="window.location='{{ route('student.submit') }}'" class="border-2 border-dashed border-[#BFDBFE] hover:border-[#2563EB] rounded-[24px] bg-white hover:bg-[#EFF6FF] hover:shadow-md transition-all p-5 flex items-center justify-between cursor-pointer mb-6 group">
    <div class="flex items-center gap-4 text-left">
        <span class="text-2xl shrink-0">🚀</span>
        <div>
            <h3 class="text-sm font-extrabold text-[#1E293B] leading-tight mb-0.5">Submit New Achievement</h3>
            <p class="text-[12px] text-[#64748B] font-medium leading-none">Upload documents and share your certificates with department HODs</p>
        </div>
    </div>
    <a href="{{ route('student.submit') }}" class="btn btn-primary btn-sm rounded-lg group-hover:scale-[1.02] transition-transform">
        Submit Now &rarr;
    </a>
</div>

<!-- Faculty Advisors Section -->
@php
    $facultyAssignments = \App\Models\FacultyAssignment::with('faculty')
        ->where('department_id', Auth::user()->department_id)
        ->get()
        ->groupBy('domain');
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    @foreach(['Academic', 'Extra-Curricular'] as $domain)
        @php
            $assignment = $facultyAssignments->get($domain)?->first();
            $faculty = $assignment?->faculty;
        @endphp
        <div class="bg-white border border-[#E2E8F0] rounded-[16px] p-5 shadow-sm">
            <div class="text-[11px] font-extrabold text-[#94A3B8] uppercase tracking-wider mb-3">
                {{ $domain }} Coordinator
            </div>
            @if($faculty)
                <div class="flex items-center gap-3 mb-3">
                    <x-avatar initials="{{ strtoupper(substr($faculty->name, 0, 2)) }}" color="blue-purple" size="md" />
                    <div class="flex flex-col text-left">
                        <span class="text-sm font-bold text-[#1E293B]">{{ $faculty->name }}</span>
                        <span class="text-xs text-[#64748B]">{{ $faculty->email }}</span>
                    </div>
                </div>
            @else
                <div class="text-sm text-[#64748B] font-medium">Not Assigned</div>
            @endif
        </div>
    @endforeach
</div>

<!-- Recent Submissions Table -->
<div class="table-container">
    <div class="table-header">
        <h3 class="text-[16px] font-bold text-[#1E293B]">Recent Submissions</h3>
        <a href="{{ route('student.history') }}" class="btn btn-ghost btn-sm rounded-lg">View All &rarr;</a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr>
                    <th>Achievement</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-semibold text-[#1E293B]">AWS Cloud Practitioner</td>
                    <td><span class="badge badge-blue">Certificate</span></td>
                    <td class="text-[#64748B]">12 Jun 2025</td>
                    <td><span class="badge badge-success">&#10003; Approved</span></td>
                    <td class="text-[#64748B] text-xs">Verified & approved</td>
                </tr>
                <tr>
                    <td class="font-semibold text-[#1E293B]">Smart India Hackathon Finalist</td>
                    <td><span class="badge badge-blue">Competition</span></td>
                    <td class="text-[#64748B]">08 Jun 2025</td>
                    <td><span class="badge badge-pending">&#9203; Pending</span></td>
                    <td class="text-[#94A3B8] text-xs italic">Awaiting review</td>
                </tr>
                <tr>
                    <td class="font-semibold text-[#1E293B]">React Native App Internship</td>
                    <td><span class="badge badge-blue">Internship</span></td>
                    <td class="text-[#64748B]">30 May 2025</td>
                    <td><span class="badge badge-success">&#10003; Approved</span></td>
                    <td class="text-[#64748B] text-xs">Internship completed successfully</td>
                </tr>
                <tr>
                    <td class="font-semibold text-[#1E293B]">Machine Learning Workshop</td>
                    <td><span class="badge badge-blue">Workshop/Seminar</span></td>
                    <td class="text-[#64748B]">24 May 2025</td>
                    <td><span class="badge badge-rejected">&#10005; Rejected</span></td>
                    <td class="text-[#EF4444] text-xs font-medium">Invalid certificate document</td>
                </tr>
                <tr>
                    <td class="font-semibold text-[#1E293B]">IEEE Blockchain Paper</td>
                    <td><span class="badge badge-blue">Paper Publication</span></td>
                    <td class="text-[#64748B]">10 May 2025</td>
                    <td><span class="badge badge-success">&#10003; Approved</span></td>
                    <td class="text-[#64748B] text-xs">Paper successfully verified</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
