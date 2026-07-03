<x-guest-layout>
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2 auth-layout">
        <!-- Left Panel: Dark Professional Gradient & Evaluator Illustration -->
        <div class="hidden lg:flex flex-col items-center justify-center bg-gradient-to-br from-[#1E293B] via-[#1D4ED8] to-[#1E293B] p-12 relative overflow-hidden">
            <!-- Translucent decorative circles -->
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-white/5 blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-blue-500/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col items-center text-center">
                <!-- Translucent white circular badge with SVG illustration -->
                <div class="w-[280px] h-[280px] rounded-full border border-white/20 bg-white/10 flex items-center justify-center shadow-lg mb-8 overflow-hidden">
                    <svg class="w-[180px] h-[180px]" viewBox="0 0 180 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Evaluator figure with Clipboard -->
                        <!-- Evaluator Head & shoulders -->
                        <circle cx="90" cy="115" r="14" fill="#FDBA74"/>
                        <path d="M68 142c0-8 6-15 14-15h16c8 0 14 7 14 15v10H68v-10Z" fill="#64748B"/>
                        <!-- Clipboard -->
                        <rect x="110" y="40" width="40" height="56" rx="4" fill="#FFFFFF" stroke="#94A3B8" stroke-width="2"/>
                        <rect x="120" y="34" width="20" height="8" rx="2" fill="#475569"/>
                        <!-- Check and X on clipboard -->
                        <circle cx="120" cy="56" r="5" fill="#22C55E"/>
                        <path d="M118 56l1.5 1.5 2-2.5" stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round"/>
                        
                        <circle cx="120" cy="72" r="5" fill="#EF4444"/>
                        <path d="M118 70l4 4m0-4l-4 4" stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round"/>

                        <rect x="130" y="54" width="12" height="3" rx="1.5" fill="#E2E8F0"/>
                        <rect x="130" y="70" width="12" height="3" rx="1.5" fill="#E2E8F0"/>
                    </svg>
                </div>

                <!-- Text block in white -->
                <h2 class="text-2xl md:text-[26px] font-extrabold tracking-[-1px] text-white leading-[1.2] mb-3">
                    Administrative Review
                </h2>
                <p class="text-[14px] text-blue-200/80 max-w-[320px] leading-relaxed">
                    Access requests, review submitted documents, write evaluator feedback, and approve certificates with legal compliance.
                </p>
            </div>
        </div>

        <!-- Right Panel: Faculty Login Form -->
        <div class="flex items-center justify-center p-8 bg-white auth-right">
            <div class="w-full max-w-[400px]">
                <!-- Logo & Heading -->
                <div class="flex flex-col items-center lg:items-start text-center lg:text-left mb-8">
                    <div class="mb-4">
                        <x-logo />
                    </div>
                    <!-- Eyebrow status pill -->
                    <div class="inline-flex items-center px-2.5 py-1 rounded-full bg-[#EFF6FF] text-[#2563EB] text-[10px] font-extrabold tracking-wider uppercase mb-3">
                        Faculty Access
                    </div>
                    <h2 class="text-[24px] font-extrabold tracking-[-0.6px] text-[#1E293B] mb-1">Faculty Sign In</h2>
                    <p class="text-[13px] text-[#64748B]">Access your review dashboard</p>
                </div>

                <!-- Login Form -->
                <form method="GET" action="{{ route('faculty.dashboard') }}">
                    <!-- Faculty Email -->
                    <div class="form-group">
                        <label for="email">Faculty Email Address</label>
                        <input id="email" type="email" name="email" required autocomplete="username" placeholder="e.g. priya.nair@college.edu">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required placeholder="••••••••">
                    </div>

                    <!-- Department Dropdown -->
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select id="department" name="department" required>
                            <option value="" disabled selected>Select Department</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Computer Engineering">Computer Engineering</option>
                            <option value="EXTC">EXTC</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Mechanical">Mechanical</option>
                        </select>
                    </div>

                    <!-- Reviewer Role Dropdown -->
                    <div class="form-group mb-6">
                        <label for="role">Reviewer Role</label>
                        <select id="role" name="role" required>
                            <option value="" disabled selected>Select Reviewer Role</option>
                            <option value="Academic Coordinator">Academic Coordinator</option>
                            <option value="Student Activity Coordinator">Student Activity Coordinator</option>
                        </select>
                    </div>

                    <!-- Sign In Button -->
                    <button type="submit" class="btn btn-primary w-full rounded-lg py-[12px] flex items-center justify-center gap-2 mb-6">
                        <span>Sign In to Faculty Portal</span>
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>

                <!-- Student Link back -->
                <div class="text-center text-[13px] text-[#64748B]">
                    Student? 
                    <a href="{{ route('login') }}" class="text-[#2563EB] hover:underline font-bold ml-1">Login here</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
