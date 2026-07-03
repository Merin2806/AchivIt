@php
    $student_name = request('student_name', 'Merin Jose');
    $roll_no = request('roll_no', '21CS047');
    $initials = request('initials', 'MJ');
    $avatar_color = request('avatar_color', 'blue-purple');
    $title = request('title', 'Smart India Hackathon 2025 Winner');
    $category = request('category', 'Competition');
    $domain = request('domain', 'Academic');
    
    $dept = request('department', 'Information Technology');
    $role = request('role', 'Academic Coordinator');

    $descriptions = [
        'Smart India Hackathon 2025 Winner' => 'Our team won 1st place in the National Smart India Hackathon 2025 under the Ministry of Education for the prototype software addressing smart waste management. The project utilized IoT triggers and predictive routing algorithms.',
        'IBM AI Applied Developer' => 'Successfully completed the IBM AI Applied Developer professional certification. Learned key machine learning concepts, neural networks, and deployed models on IBM Cloud.',
        'React Native Frontend Internship' => 'Worked as a Frontend Developer Intern for 3 months. Built key screens for a cross-platform mobile commerce application using React Native, Redux, and TailwindCSS.',
        'IEEE Blockchain Cloud Paper' => 'Co-authored and presented a research paper titled "Decentralized Resource Allocation in Cloud Environments using Blockchain" at the IEEE International Conference.',
        'Python Django Certification' => 'Completed an intensive 6-week training on Backend Development with Django. Built and deployed multiple RESTful APIs using Django REST Framework.',
        'Inter-College Football Tournament Winner' => 'Represented the college football team and secured 1st place in the Inter-College Football Championship. Played as a forward and scored the winning goal in the finals.',
        'Annual Cultural Fest Solo Dance' => 'Won the 2nd runner-up position in the Solo Classical Dance competition at the university level cultural festival, competing against 30+ colleges.',
        'Street Play on Social Awareness' => 'Directed and performed in a street play (Nukkad Natak) highlighting environmental sustainability and waste segregation, organized in collaboration with local municipal authorities.',
        'NSS Blood Donation Camp Organizer' => 'Successfully coordinated a blood donation camp in collaboration with the Red Cross Society, leading a team of 15 volunteers and collecting over 120 units of blood.',
        'Photography Exhibition Best Portrait' => 'Received the "Best Portrait of the Year" award at the annual university photography exhibition for a street photography submission capturing local heritage.'
    ];

    $description = $descriptions[$title] ?? 'Successfully completed the activity and submitted the required documents for verification.';
    $filename = str_replace(' ', '_', $title) . '_Certificate.pdf';
@endphp
<x-faculty-layout>
    @section('top-bar-left')
        <a href="{{ route('faculty.dashboard', ['department' => $dept, 'role' => $role]) }}" class="btn btn-ghost btn-sm rounded-lg shrink-0">
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
            <span>Reviewing <strong class="text-[#1E293B]">3 of 8</strong> pending submissions</span>
            <div class="flex gap-2">
                <button class="btn btn-ghost btn-sm rounded-lg py-1 px-3 text-xs bg-white">&larr; Previous</button>
                <button class="btn btn-ghost btn-sm rounded-lg py-1 px-3 text-xs bg-white">Next &rarr;</button>
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
                            <span class="text-xs text-[#64748B] font-semibold mt-0.5">Roll No: {{ $roll_no }} • Sem 4</span>
                            <span class="text-[11px] text-[#94A3B8] font-bold uppercase mt-0.5 tracking-wider">{{ $dept }} Department</span>
                        </div>
                    </div>

                    <!-- Details rows -->
                    <div class="flex flex-col divide-y divide-[#E2E8F0] text-sm">
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Email Address</span>
                            <span class="font-bold text-[#1E293B]">
                                {{ strtolower(str_replace(' ', '.', $student_name)) }}@college.edu
                            </span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Phone Number</span>
                            <span class="font-bold text-[#1E293B]">+91 98765 43210</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Academic Year</span>
                            <span class="font-bold text-[#1E293B]">2nd Year (2021 - 2025)</span>
                        </div>
                        <div class="py-3 flex justify-between items-center">
                            <span class="text-[#64748B] font-medium">Previous Approvals</span>
                            <span class="font-extrabold text-[#22C55E] bg-[#F0FDF4] px-2.5 py-0.5 rounded-full border border-[#DCFCE7] text-xs">7 approved</span>
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
                            <span class="font-bold text-[#1E293B]">05 Jun 2025</span>
                        </div>
                        <div class="py-3 flex justify-between">
                            <span class="text-[#64748B] font-medium">Submitted On</span>
                            <span class="text-[#64748B] font-medium">09 Jun 2025, 10:24 AM</span>
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
                    
                    <form action="{{ route('faculty.dashboard') }}" method="GET" class="flex flex-col text-left">
                        <input type="hidden" name="department" value="{{ $dept }}">
                        <input type="hidden" name="role" value="{{ $role }}">
                        <div class="form-group">
                            <label for="remarks">Remarks / Feedback (Required for Rejection)</label>
                            <textarea id="remarks" rows="3" placeholder="Write review comments or reason for rejection..."></textarea>
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
                            <button class="btn btn-ghost btn-sm rounded-lg p-1.5 text-xs bg-white shrink-0">
                                <!-- Download icon -->
                                <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                            </button>
                            <button class="btn btn-ghost btn-sm rounded-lg p-1.5 text-xs bg-white shrink-0">
                                <!-- Open External icon -->
                                <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </button>
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
                        <span class="text-xs font-bold text-[#1E293B]">09 Jun 2025</span>
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
