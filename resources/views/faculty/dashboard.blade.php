<x-faculty-layout>
    @section('top-bar-left')
        <h2 class="text-[16px] font-extrabold text-[#1E293B] tracking-tight">
            {{ Auth::user()->faculty_role === 'Student Activity Coordinator' ? 'Student Activity Coordinator Dashboard' : 'Academic Coordinator Dashboard' }}
        </h2>
    @endsection

    <div class="max-w-[1200px] mx-auto text-left flex flex-col gap-6">
<!-- Greeting Banner -->
        <div class="greeting-card bg-gradient-to-r from-[#1E293B] to-[#1D4ED8] shadow-[0_10px_30px_rgba(30,41,59,0.2)] flex flex-col md:flex-row justify-between items-center gap-6 p-[28px] md:px-[32px]">
            <div class="flex flex-col items-start text-left">
                <h2 class="text-[20px] font-extrabold text-white tracking-tight mb-1 flex items-center gap-2">
                    Welcome, {{ Auth::user()->name }} 👋
                </h2>
                <div class="text-[14px] text-white/80 font-semibold mb-1">
                    {{ Auth::user()->faculty_role ?? 'Faculty' }}
                </div>
                <div class="text-[13px] text-white/70">
                    {{ Auth::user()->department?->name ?? 'Department' }}
                </div>
            </div>
            <!-- Large cap icon -->
            <div class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center shrink-0 border border-white/10">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                </svg>
            </div>
        </div>

        <!-- 3-Column Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <x-stat-card color="amber" number="{{ $pendingCount }}" label="Pending Reviews">
                <x-slot name="icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </x-slot>
            </x-stat-card>

            <x-stat-card color="green" number="{{ $approvedCount }}" label="Approved Today">
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

        <!-- Pending Submissions Table -->
        <div class="table-container">
            <div class="table-header flex-col sm:flex-row gap-4">
                <div class="flex flex-col text-left">
                    <h3 class="text-base font-bold text-[#1E293B]">Pending Submissions</h3>
                    <p class="text-xs text-[#64748B] mt-0.5">{{ $pendingCount }} achievements awaiting your review</p>
                </div>
                
                <!-- Table controls -->
                <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto sm:justify-end">
                    <div class="relative w-full sm:w-[200px]">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#94A3B8]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search student name..." class="w-full pl-9 pr-3 py-1.5 border border-[#E2E8F0] rounded-lg text-sm bg-white focus:outline-none focus:border-[#2563EB]">
                    </div>

                    <select class="py-1.5 px-3 border border-[#E2E8F0] rounded-lg text-sm bg-white focus:outline-none focus:border-[#2563EB]">
                        <option value="">All Categories</option>
                        <option value="Internship">Internship</option>
                        <option value="Certificate">Certificate</option>
                        <option value="Competition">Competition</option>
                    </select>
                </div>
            </div>

            <!-- Table content -->
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Achievement</th>
                            <th>Category</th>
                            <th>Submitted On</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendingAchievements as $achievement)
                            @php
                                $colors = ['blue-purple', 'green-emerald', 'red-orange', 'amber-orange', 'cyan'];
                                $avatarColor = $colors[$achievement->id % count($colors)];
                            @endphp
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <x-avatar initials="{{ strtoupper(substr($achievement->student->name, 0, 2)) }}" color="{{ $avatarColor }}" />
                                        <div class="flex flex-col text-left">
                                            <span class="font-bold text-[#1E293B] text-[13px]">{{ $achievement->student->name }}</span>
                                            <span class="text-[11px] text-[#64748B]">{{ $achievement->student->roll_no }} • Sem {{ $achievement->student->semester }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-semibold text-[#1E293B]">{{ $achievement->title }}</td>
                                <td><span class="badge badge-blue">{{ $achievement->category->category_name }}</span></td>
                                <td class="text-[#64748B]">{{ $achievement->achievement_date->format('d M Y') }}</td>
                                <td><span class="badge badge-pending">&#9203; {{ $achievement->status }}</span></td>
                                <td>
                                    <a href="{{ route('faculty.review', ['id' => $achievement->id]) }}" class="btn btn-primary btn-sm rounded-lg py-1 px-3 text-xs flex items-center gap-1">
                                        <span>Review</span>
                                        <span>&rarr;</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-10 text-gray-500">
                                    No pending submissions.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            <div class="pagination">
                {{ $pendingAchievements->links() }}
            </div>
        </div>
    </div>
</x-faculty-layout>
