<x-faculty-layout>
    @section('top-bar-left')
        <h2 class="text-[16px] font-extrabold text-[#1E293B] tracking-tight">Faculty Dashboard</h2>
    @endsection

    <div class="max-w-[1200px] mx-auto text-left flex flex-col gap-6">
        <!-- Greeting Banner -->
        <div class="greeting-card bg-gradient-to-r from-[#1E293B] to-[#1D4ED8] shadow-[0_10px_30px_rgba(30,41,59,0.2)] flex flex-col md:flex-row justify-between items-center gap-6 p-[28px] md:px-[32px]">
            <div class="flex flex-col items-start text-left">
                <h2 class="text-[20px] font-extrabold text-white tracking-tight mb-2 flex items-center gap-2">
                    Welcome, Dr. Priya 👩‍🏫
                </h2>
                <p class="text-[14px] text-white/80 max-w-[500px]">
                    You have <strong class="text-white">8 pending submissions</strong> awaiting your evaluation in the Computer Science department.
                </p>
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
            <x-stat-card color="amber" number="8" label="Pending Reviews">
                <x-slot name="icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </x-slot>
            </x-stat-card>

            <x-stat-card color="green" number="14" label="Approved Today">
                <x-slot name="icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </x-slot>
            </x-stat-card>

            <x-stat-card color="red" number="3" label="Rejected">
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
                    <p class="text-xs text-[#64748B] mt-0.5">8 achievements awaiting your review</p>
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
                        <!-- Row 1 -->
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <x-avatar initials="MJ" color="blue-purple" />
                                    <div class="flex flex-col text-left">
                                        <span class="font-bold text-[#1E293B] text-[13px]">Merin Jose</span>
                                        <span class="text-[11px] text-[#64748B]">21CS047 • Sem 4</span>
                                    </div>
                                </div>
                            </td>
                            <td class="font-semibold text-[#1E293B]">Smart India Hackathon 2025</td>
                            <td><span class="badge badge-blue">Competition</span></td>
                            <td class="text-[#64748B]">09 Jun 2025</td>
                            <td><span class="badge badge-pending">&#9203; Pending</span></td>
                            <td>
                                <a href="{{ route('faculty.review') }}" class="btn btn-primary btn-sm rounded-lg py-1 px-3 text-xs flex items-center gap-1">
                                    <span>Review</span>
                                    <span>&rarr;</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <x-avatar initials="RK" color="green-emerald" />
                                    <div class="flex flex-col text-left">
                                        <span class="font-bold text-[#1E293B] text-[13px]">Rahul Krishnan</span>
                                        <span class="text-[11px] text-[#64748B]">21CS082 • Sem 4</span>
                                    </div>
                                </div>
                            </td>
                            <td class="font-semibold text-[#1E293B]">IBM AI Applied Developer</td>
                            <td><span class="badge badge-blue">Certificate</span></td>
                            <td class="text-[#64748B]">08 Jun 2025</td>
                            <td><span class="badge badge-pending">&#9203; Pending</span></td>
                            <td>
                                <a href="{{ route('faculty.review') }}" class="btn btn-primary btn-sm rounded-lg py-1 px-3 text-xs flex items-center gap-1">
                                    <span>Review</span>
                                    <span>&rarr;</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <x-avatar initials="SN" color="red-orange" />
                                    <div class="flex flex-col text-left">
                                        <span class="font-bold text-[#1E293B] text-[13px]">Sneha Nair</span>
                                        <span class="text-[11px] text-[#64748B]">21CS012 • Sem 4</span>
                                    </div>
                                </div>
                            </td>
                            <td class="font-semibold text-[#1E293B]">React Native Frontend Internship</td>
                            <td><span class="badge badge-blue">Internship</span></td>
                            <td class="text-[#64748B]">07 Jun 2025</td>
                            <td><span class="badge badge-pending">&#9203; Pending</span></td>
                            <td>
                                <a href="{{ route('faculty.review') }}" class="btn btn-primary btn-sm rounded-lg py-1 px-3 text-xs flex items-center gap-1">
                                    <span>Review</span>
                                    <span>&rarr;</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <x-avatar initials="AS" color="amber-orange" />
                                    <div class="flex flex-col text-left">
                                        <span class="font-bold text-[#1E293B] text-[13px]">Amit Shah</span>
                                        <span class="text-[11px] text-[#64748B]">21CS099 • Sem 4</span>
                                    </div>
                                </div>
                            </td>
                            <td class="font-semibold text-[#1E293B]">IEEE Blockchain Cloud Paper</td>
                            <td><span class="badge badge-blue">Paper Publication</span></td>
                            <td class="text-[#64748B]">06 Jun 2025</td>
                            <td><span class="badge badge-pending">&#9203; Pending</span></td>
                            <td>
                                <a href="{{ route('faculty.review') }}" class="btn btn-primary btn-sm rounded-lg py-1 px-3 text-xs flex items-center gap-1">
                                    <span>Review</span>
                                    <span>&rarr;</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 5 -->
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <x-avatar initials="PV" color="cyan" />
                                    <div class="flex flex-col text-left">
                                        <span class="font-bold text-[#1E293B] text-[13px]">Pooja Varma</span>
                                        <span class="text-[11px] text-[#64748B]">21CS005 • Sem 4</span>
                                    </div>
                                </div>
                            </td>
                            <td class="font-semibold text-[#1E293B]">Python Django Certification</td>
                            <td><span class="badge badge-blue">Certificate</span></td>
                            <td class="text-[#64748B]">05 Jun 2025</td>
                            <td><span class="badge badge-pending">&#9203; Pending</span></td>
                            <td>
                                <a href="{{ route('faculty.review') }}" class="btn btn-primary btn-sm rounded-lg py-1 px-3 text-xs flex items-center gap-1">
                                    <span>Review</span>
                                    <span>&rarr;</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            <div class="pagination">
                <span class="text-xs font-semibold text-[#64748B]">Showing 1–5 of 8</span>
                <div class="flex gap-1.5">
                    <button class="page-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-faculty-layout>
