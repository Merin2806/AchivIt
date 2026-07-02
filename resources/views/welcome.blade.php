<x-guest-layout>
    <!-- Sticky Nav Bar -->
    <header class="sticky top-0 z-50 w-full h-[64px] border-b border-[#E2E8F0] bg-white/95 backdrop-blur-[12px]">
        <div class="max-w-[1200px] h-full mx-auto px-8 flex items-center justify-between">
            <!-- Left Logo -->
            <a href="/">
                <x-logo />
            </a>

            <!-- Center Links -->
            <nav class="hidden md:flex items-center gap-[28px] text-[14px] font-medium text-[#64748B]">
                <a href="#home" class="hover:text-[#2563EB] transition-colors">Home</a>
                <a href="#about" class="hover:text-[#2563EB] transition-colors">About</a>
                <a href="#features" class="hover:text-[#2563EB] transition-colors">Features</a>
                <a href="#contact" class="hover:text-[#2563EB] transition-colors">Contact</a>
            </nav>

            <!-- Right CTA buttons -->
            <div class="flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm rounded-lg">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-ghost btn-sm rounded-lg">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm rounded-lg">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="w-full bg-white py-[80px] md:py-[100px] px-8 overflow-hidden">
        <div class="max-w-[1200px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-[60px] items-center">
            <!-- Left Column -->
            <div class="flex flex-col items-start text-left">
                <!-- Headline -->
                <h1 class="text-[40px] md:text-[52px] font-extrabold tracking-[-2px] text-[#1E293B] leading-[1.1] mb-6">
                    Celebrate Every <br>
                    <span class="text-[#2563EB]">Achievement.</span>
                </h1>

                <!-- Supporting Paragraph -->
                <p class="text-base text-[#64748B] max-w-[420px] mb-8 leading-relaxed">
                    A secure and seamless portal for college students to submit academic achievements and for faculty to verify and reward excellence.
                </p>

                <!-- CTA Row -->
                <div class="flex flex-wrap gap-4 mb-10 w-full sm:w-auto">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-full sm:w-auto rounded-lg">
                        Student Login
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline btn-lg w-full sm:w-auto rounded-lg">
                        Create Account
                    </a>
                    <a href="{{ route('faculty.login') }}" class="btn btn-outline btn-lg w-full sm:w-auto rounded-lg">
                        Faculty Login
                    </a>
                </div>

                <!-- Trust Indicators -->
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#22C55E] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-[13px] text-[#64748B] font-medium">Free for all students</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#22C55E] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-[13px] text-[#64748B] font-medium">Instant faculty review</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#22C55E] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-[13px] text-[#64748B] font-medium">Secure document storage</span>
                    </div>
                </div>
            </div>

            <!-- Right Column (Hero Visual) -->
            <div class="relative w-full h-[400px] flex items-center justify-center lg:justify-end">
                <div class="relative w-full max-w-[460px] h-[360px] rounded-[24px] bg-gradient-to-br from-[#EFF6FF] via-[#DBEAFE] to-[#BFDBFE] flex items-center justify-center overflow-hidden shadow-lg border border-white/40">
                    <!-- Translucent decorative circles -->
                    <div class="absolute -top-16 -left-16 w-48 h-48 rounded-full bg-white/30 blur-2xl"></div>
                    <div class="absolute -bottom-16 -right-16 w-48 h-48 rounded-full bg-blue-500/10 blur-2xl"></div>

                    <!-- Custom flat-illustration SVG -->
                    <svg class="w-[280px] h-[260px] relative z-10" viewBox="0 0 280 260" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Desktop/Desk base -->
                        <rect x="20" y="210" width="240" height="8" rx="4" fill="#64748B"/>
                        <rect x="70" y="218" width="140" height="6" rx="3" fill="#475569"/>
                        <!-- Monitor stand & screen -->
                        <rect x="130" y="150" width="20" height="60" rx="2" fill="#94A3B8"/>
                        <rect x="50" y="50" width="180" height="110" rx="10" fill="#1E293B" stroke="#475569" stroke-width="4"/>
                        <rect x="60" y="60" width="160" height="80" rx="4" fill="#FFFFFF"/>
                        <!-- UI lines on screen -->
                        <rect x="70" y="70" width="50" height="8" rx="2" fill="#2563EB"/>
                        <rect x="70" y="85" width="140" height="4" rx="2" fill="#E2E8F0"/>
                        <rect x="70" y="95" width="120" height="4" rx="2" fill="#E2E8F0"/>
                        <rect x="70" y="105" width="90" height="4" rx="2" fill="#E2E8F0"/>
                        <circle cx="195" cy="80" r="12" fill="#FFFBEB" stroke="#F59E0B" stroke-width="2"/>
                        <!-- Trophy icon inside circle -->
                        <path d="M195 73v8m-3-6h6m-6 3h6m-4 5h2" stroke="#B45309" stroke-width="1.5"/>
                        
                        <!-- Student figure sitting -->
                        <circle cx="140" cy="180" r="16" fill="#FDBA74"/>
                        <path d="M110 210c0-10 8-18 18-18h24c10 0 18 8 18 18v10H110v-10Z" fill="#3B82F6"/>
                        <!-- Laptop on desk -->
                        <polygon points="120,205 160,205 165,210 115,210" fill="#475569"/>
                        <rect x="125" y="193" width="30" height="12" rx="1" fill="#94A3B8"/>
                    </svg>

                    <!-- Floating Chips -->
                    <!-- Top Right Chip -->
                    <div class="absolute top-[30px] right-[-10px] bg-white rounded-xl shadow-md p-3 border border-[#E2E8F0] flex items-center gap-3 z-20 max-w-[210px]">
                        <div class="w-8 h-8 rounded-lg bg-[#F0FDF4] text-[#22C55E] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[11px] font-bold text-[#1E293B] leading-tight">Achievement Approved!</span>
                            <span class="text-[10px] text-[#64748B] font-medium leading-none mt-0.5">National Hackathon Winner</span>
                        </div>
                    </div>

                    <!-- Bottom Left Chip -->
                    <div class="absolute bottom-[30px] left-[-10px] bg-white rounded-xl shadow-md p-3 border border-[#E2E8F0] flex items-center gap-3 z-20 max-w-[200px]">
                        <div class="w-8 h-8 rounded-lg bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[11px] font-bold text-[#1E293B] leading-tight">48 submissions</span>
                            <span class="text-[10px] text-[#64748B] font-medium leading-none mt-0.5">Logged this month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Strip -->
    <section id="about" class="w-full bg-white px-8 pb-16">
        <div class="max-w-[1200px] mx-auto bg-white border border-[#E2E8F0] shadow-md rounded-[24px] overflow-hidden py-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Col 1 -->
                <div class="flex flex-col items-center justify-center text-center border-r last:border-none border-[#E2E8F0] px-4">
                    <span class="text-[36px] md:text-[40px] font-extrabold text-[#2563EB] tracking-[-1px] leading-none mb-1">2,400+</span>
                    <span class="text-xs font-semibold text-[#64748B] uppercase tracking-wider">Achievements Logged</span>
                </div>
                <!-- Col 2 -->
                <div class="flex flex-col items-center justify-center text-center md:border-r last:border-none border-[#E2E8F0] px-4">
                    <span class="text-[36px] md:text-[40px] font-extrabold text-[#2563EB] tracking-[-1px] leading-none mb-1">380</span>
                    <span class="text-xs font-semibold text-[#64748B] uppercase tracking-wider">Active Students</span>
                </div>
                <!-- Col 3 -->
                <div class="flex flex-col items-center justify-center text-center border-r last:border-none border-[#E2E8F0] px-4">
                    <span class="text-[36px] md:text-[40px] font-extrabold text-[#2563EB] tracking-[-1px] leading-none mb-1">42</span>
                    <span class="text-xs font-semibold text-[#64748B] uppercase tracking-wider">Faculty Members</span>
                </div>
                <!-- Col 4 -->
                <div class="flex flex-col items-center justify-center text-center px-4">
                    <span class="text-[36px] md:text-[40px] font-extrabold text-[#2563EB] tracking-[-1px] leading-none mb-1">98%</span>
                    <span class="text-xs font-semibold text-[#64748B] uppercase tracking-wider">Review Rate</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="w-full bg-[#F8FAFC] py-[72px] px-8 border-t border-b border-[#E2E8F0]">
        <div class="max-w-[1200px] mx-auto text-center">
            <span class="text-xs font-bold text-[#2563EB] uppercase tracking-[0.08em] mb-3 block">Why Achivit</span>
            <h2 class="text-[32px] md:text-[36px] font-extrabold tracking-[-1.2px] text-[#1E293B] leading-[1.2] mb-4">
                Everything you need to <br class="hidden sm:inline"> manage achievements.
            </h2>
            <p class="text-[15px] text-[#64748B] max-w-[500px] mx-auto mb-16">
                A digital validation platform designed specifically for college departments, simplifying operations for both students and evaluators.
            </p>

            <!-- 3x2 Grid of 6 Feature Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="relative bg-white border border-[#E2E8F0] rounded-[16px] p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#2563EB] to-[#7C3AED] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-[#1E293B] mb-3">Achievement Tracking</h3>
                    <p class="text-[13px] text-[#64748B] leading-relaxed">
                        Log and categorize internships, online certificates, publication releases, workshop participations, and Hackathon trophies.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="relative bg-white border border-[#E2E8F0] rounded-[16px] p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#2563EB] to-[#7C3AED] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-12 h-12 rounded-xl bg-[#F0FDF4] text-[#22C55E] flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-[#1E293B] mb-3">Faculty Approval</h3>
                    <p class="text-[13px] text-[#64748B] leading-relaxed">
                        Department heads and advisors can instantly review proofs, write feedback, and verify legitimacy with a single click.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="relative bg-white border border-[#E2E8F0] rounded-[16px] p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#2563EB] to-[#7C3AED] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-12 h-12 rounded-xl bg-[#FFFBEB] text-[#F59E0B] flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-[#1E293B] mb-3">Secure Document Upload</h3>
                    <p class="text-[13px] text-[#64748B] leading-relaxed">
                        Upload certificates and documents securely. Supported formats include PDF, JPG, PNG up to 5 MB per proof.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="relative bg-white border border-[#E2E8F0] rounded-[16px] p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#2563EB] to-[#7C3AED] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-12 h-12 rounded-xl bg-[#FAF5FF] text-[#7C3AED] flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-[#1E293B] mb-3">Category Organisation</h3>
                    <p class="text-[13px] text-[#64748B] leading-relaxed">
                        Keep achievements structured into categories like Internships, Certificates, Competitions, Publications, and Awards.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="relative bg-white border border-[#E2E8F0] rounded-[16px] p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#2563EB] to-[#7C3AED] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-12 h-12 rounded-xl bg-[#FFF1F2] text-[#E11D48] flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-[#1E293B] mb-3">Live Analytics</h3>
                    <p class="text-[13px] text-[#64748B] leading-relaxed">
                        Understand performance ratios, track approval status metrics, and check count distributions inside your custom student profile.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="relative bg-white border border-[#E2E8F0] rounded-[16px] p-8 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#2563EB] to-[#7C3AED] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-12 h-12 rounded-xl bg-[#E6FDF9] text-[#059669] flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-[#1E293B] mb-3">Role-Based Access</h3>
                    <p class="text-[13px] text-[#64748B] leading-relaxed">
                        Optimized role interfaces where students view brightly lit creative dashboards while faculty use dark, administration-focused sidebars.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full bg-[#1E293B] text-[#94A3B8] py-[40px] px-8 border-t border-slate-800">
        <div class="max-w-[1200px] mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
                <!-- Left: White logo wordmark -->
                <a href="/">
                    <x-logo theme="dark" />
                </a>

                <!-- Right links -->
                <div class="flex flex-wrap gap-[28px] text-[13px] font-medium">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-white transition-colors">Support</a>
                    <a href="{{ route('faculty.login') }}" class="hover:text-[#2563EB] text-[#2563EB] transition-colors font-bold">Faculty Portal →</a>
                </div>
            </div>

            <!-- Divider -->
            <div class="w-full h-px bg-slate-800 mb-6"></div>

            <div class="flex flex-col sm:flex-row justify-between items-center text-xs text-[#64748B] gap-4">
                <span>&copy; {{ date('Y') }} Achivit. All rights reserved.</span>
                <span>A VIT College Initiative</span>
            </div>
        </div>
    </footer>
</x-guest-layout>
