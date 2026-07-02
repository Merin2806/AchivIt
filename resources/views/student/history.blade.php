<x-app-layout>
    @section('top-bar-left')
        <h2 class="text-[16px] font-extrabold text-[#1E293B] tracking-tight">Achievement History</h2>
    @endsection

    <div class="max-w-[1200px] mx-auto text-left">
        <!-- Section Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-extrabold text-[#1E293B] tracking-tight">All Submissions</h2>
                <p class="text-[13px] text-[#64748B]">View and manage all your submitted achievements and check faculty review comments.</p>
            </div>
            
            <a href="{{ route('student.submit') }}" class="btn btn-primary btn-sm rounded-lg flex items-center gap-2 shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                <span>+ New Submission</span>
            </a>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <!-- Row 1: Header title & controls -->
            <div class="table-header flex-col sm:flex-row gap-4">
                <span class="text-base font-bold text-[#1E293B] shrink-0">12 Achievements</span>
                
                <!-- Table Search & select filter -->
                <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto sm:justify-end">
                    <!-- Search input -->
                    <div class="relative w-full sm:w-[200px]">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#94A3B8]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </span>
                        <input type="text" placeholder="Search achievements..." class="w-full pl-9 pr-3 py-1.5 border border-[#E2E8F0] rounded-lg text-sm bg-white focus:outline-none focus:border-[#2563EB]">
                    </div>

                    <!-- Dropdown Category -->
                    <select class="py-1.5 px-3 border border-[#E2E8F0] rounded-lg text-sm bg-white focus:outline-none focus:border-[#2563EB]">
                        <option value="">All Categories</option>
                        <option value="Internship">Internships</option>
                        <option value="Certificate">Certificates</option>
                        <option value="Competition">Competitions</option>
                        <option value="Paper Publication">Paper Publications</option>
                        <option value="Workshop/Seminar">Workshops</option>
                    </option>
                </div>
            </div>

            <!-- Row 2: Filter row pills (visual toggle only) -->
            <div class="filter-row flex-wrap">
                <button class="filter-btn active">All (12)</button>
                <button class="filter-btn">Approved (7)</button>
                <button class="filter-btn">Pending (3)</button>
                <button class="filter-btn">Rejected (2)</button>
            </div>

            <!-- Table content -->
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date Submitted</th>
                            <th>Status</th>
                            <th>Faculty Remark</th>
                            <th>Document</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td class="font-semibold text-[#1E293B]">AWS Cloud Practitioner</td>
                            <td><span class="badge badge-blue">Certificate</span></td>
                            <td class="text-[#64748B]">12 Jun 2025</td>
                            <td><span class="badge badge-success">&#10003; Approved</span></td>
                            <td class="text-[#64748B] text-xs">Verified & approved</td>
                            <td>
                                <a href="#" class="text-[#2563EB] hover:underline flex items-center gap-1 font-semibold text-xs">
                                    <span>👁 View</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr>
                            <td class="font-semibold text-[#1E293B]">Smart India Hackathon Finalist</td>
                            <td><span class="badge badge-blue">Competition</span></td>
                            <td class="text-[#64748B]">08 Jun 2025</td>
                            <td><span class="badge badge-pending">&#9203; Pending</span></td>
                            <td class="text-[#94A3B8] text-xs italic">Awaiting review</td>
                            <td>
                                <a href="#" class="text-[#2563EB] hover:underline flex items-center gap-1 font-semibold text-xs">
                                    <span>👁 View</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td class="font-semibold text-[#1E293B]">React Native App Internship</td>
                            <td><span class="badge badge-blue">Internship</span></td>
                            <td class="text-[#64748B]">30 May 2025</td>
                            <td><span class="badge badge-success">&#10003; Approved</span></td>
                            <td class="text-[#64748B] text-xs">Internship completed successfully</td>
                            <td>
                                <a href="#" class="text-[#2563EB] hover:underline flex items-center gap-1 font-semibold text-xs">
                                    <span>👁 View</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr>
                            <td class="font-semibold text-[#1E293B]">Machine Learning Workshop</td>
                            <td><span class="badge badge-blue">Workshop/Seminar</span></td>
                            <td class="text-[#64748B]">24 May 2025</td>
                            <td><span class="badge badge-rejected">&#10005; Rejected</span></td>
                            <td class="text-[#EF4444] text-xs font-semibold bg-[#FEF2F2] px-2 py-0.5 rounded border border-[#FEE2E2] inline-block">Invalid certificate document</td>
                            <td>
                                <a href="#" class="text-[#2563EB] hover:underline flex items-center gap-1 font-semibold text-xs">
                                    <span>👁 View</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 5 -->
                        <tr>
                            <td class="font-semibold text-[#1E293B]">IEEE Blockchain Paper</td>
                            <td><span class="badge badge-blue">Paper Publication</span></td>
                            <td class="text-[#64748B]">10 May 2025</td>
                            <td><span class="badge badge-success">&#10003; Approved</span></td>
                            <td class="text-[#64748B] text-xs">Paper successfully verified</td>
                            <td>
                                <a href="#" class="text-[#2563EB] hover:underline flex items-center gap-1 font-semibold text-xs">
                                    <span>👁 View</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 6 -->
                        <tr>
                            <td class="font-semibold text-[#1E293B]">Google Summer of Code</td>
                            <td><span class="badge badge-blue">Internship</span></td>
                            <td class="text-[#64748B]">05 May 2025</td>
                            <td><span class="badge badge-pending">&#9203; Pending</span></td>
                            <td class="text-[#94A3B8] text-xs italic">Awaiting review</td>
                            <td>
                                <a href="#" class="text-[#2563EB] hover:underline flex items-center gap-1 font-semibold text-xs">
                                    <span>👁 View</span>
                                </a>
                            </td>
                        </tr>
                        <!-- Row 7 -->
                        <tr>
                            <td class="font-semibold text-[#1E293B]">Best CSE Student Award</td>
                            <td><span class="badge badge-blue">Award/Recognition</span></td>
                            <td class="text-[#64748B]">28 Apr 2025</td>
                            <td><span class="badge badge-success">&#10003; Approved</span></td>
                            <td class="text-[#64748B] text-xs">Congratulations on this college recognition!</td>
                            <td>
                                <a href="#" class="text-[#2563EB] hover:underline flex items-center gap-1 font-semibold text-xs">
                                    <span>👁 View</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            <div class="pagination">
                <span class="text-xs font-semibold text-[#64748B]">Showing 1–7 of 12</span>
                
                <div class="flex gap-1.5">
                    <!-- Prev -->
                    <button class="page-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <!-- Page 1 (Active) -->
                    <button class="page-btn active">1</button>
                    <!-- Page 2 -->
                    <button class="page-btn">2</button>
                    <!-- Next -->
                    <button class="page-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to toggle active filter-btn states (visual only) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterBtns = document.querySelectorAll('.filter-btn');
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                });
            });
        });
    </script>
</x-app-layout>
