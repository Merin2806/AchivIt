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
                <span class="text-base font-bold text-[#1E293B] shrink-0">{{ $achievements->total() }} Achievements</span>
                
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
                    </select>
                </div>
            </div>

            <!-- Row 2: Filter row pills (visual toggle only) -->
            <div class="filter-row flex-wrap">
                <button class="filter-btn active">All ({{ auth()->user()->achievements()->count() }})</button>
                <button class="filter-btn">Approved ({{ auth()->user()->achievements()->where('status', 'Approved')->count() }})</button>
                <button class="filter-btn">Pending ({{ auth()->user()->achievements()->where('status', 'Pending')->count() }})</button>
                <button class="filter-btn">Rejected ({{ auth()->user()->achievements()->where('status', 'Rejected')->count() }})</button>
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
                    @forelse($achievements as $achievement)
                        <tr>
                            <td class="font-semibold text-[#1E293B]">{{ $achievement->title }}</td>
                            <td><span class="badge badge-blue">{{ $achievement->category->category_name ?? 'N/A' }}</span></td>
                            <td class="text-[#64748B]">{{ $achievement->achievement_date->format('d M Y') }}</td>
                            <td>
                                @if($achievement->status === 'Approved')
                                    <span class="badge badge-success">&#10003; Approved</span>
                                @elseif($achievement->status === 'Pending')
                                    <span class="badge badge-pending">&#9203; Pending</span>
                                @elseif($achievement->status === 'Rejected')
                                    <span class="badge badge-rejected">&#10005; Rejected</span>
                                @endif
                            </td>
                            @if($achievement->status === 'Rejected' && $achievement->remark)
                                <td class="text-[#EF4444] text-xs font-semibold bg-[#FEF2F2] px-2 py-0.5 rounded border border-[#FEE2E2] inline-block">
                                    {{ $achievement->remark }}
                                </td>
                            @elseif($achievement->status === 'Pending' && !$achievement->remark)
                                <td class="text-[#94A3B8] text-xs italic">-</td>
                            @elseif($achievement->remark)
                                <td class="text-[#64748B] text-xs">
                                    {{ $achievement->remark }}
                                </td>
                            @else
                                <td class="text-[#64748B] text-xs">-</td>
                            @endif
                            <td>
                                @if($achievement->certificate)
                                    <a href="/storage/{{ $achievement->certificate }}" target="_blank" class="text-[#2563EB] hover:underline flex items-center gap-1 font-semibold text-xs">
                                        <span>👁 View</span>
                                    </a>
                                @else
                                    <span class="text-[#94A3B8] flex items-center gap-1 font-semibold text-xs cursor-not-allowed">
                                        <span>👁 View</span>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-10 text-gray-500">
                                No achievements submitted yet.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            <div class="pagination">
                {{ $achievements->links() }}
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
