<x-guest-layout>
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2 auth-layout">
        <!-- Left Panel: Pastel Gradient & Student Illustration -->
        <div class="hidden lg:flex flex-col items-center justify-center bg-gradient-to-br from-[#EFF6FF] via-[#EFF6FF] to-[#FAF5FF] p-12 relative overflow-hidden">
            <!-- Translucent decorative circles -->
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-white/40 blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-blue-500/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col items-center text-center">
                <!-- Large circular badge with SVG illustration -->
                <div class="w-[280px] h-[280px] rounded-full border border-white/60 bg-gradient-to-br from-white/60 to-blue-100/40 flex items-center justify-center shadow-md mb-8 overflow-hidden">
                    <svg class="w-[180px] h-[180px]" viewBox="0 0 180 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Student at desk -->
                        <!-- Desk surface -->
                        <rect x="20" y="140" width="140" height="6" rx="3" fill="#64748B"/>
                        <!-- Computer screen -->
                        <rect x="50" y="50" width="80" height="60" rx="6" fill="#1E293B" stroke="#475569" stroke-width="3"/>
                        <rect x="55" y="55" width="70" height="42" rx="2" fill="#FFFFFF"/>
                        <!-- Coding lines -->
                        <rect x="60" y="60" width="20" height="4" rx="1" fill="#2563EB"/>
                        <rect x="60" y="68" width="50" height="3" rx="1" fill="#E2E8F0"/>
                        <rect x="60" y="75" width="40" height="3" rx="1" fill="#E2E8F0"/>
                        <rect x="60" y="82" width="30" height="3" rx="1" fill="#E2E8F0"/>
                        <!-- Monitor stand -->
                        <rect x="85" y="110" width="10" height="30" fill="#94A3B8"/>
                        <!-- Student figure -->
                        <circle cx="90" cy="122" r="10" fill="#FDBA74"/>
                        <path d="M72 140c0-6 5-11 11-11h14c6 0 11 5 11 11v6H72v-6Z" fill="#3B82F6"/>
                        <!-- Diploma on the wall -->
                        <rect x="128" y="20" width="26" height="18" rx="2" fill="#FFFFFF" stroke="#2563EB" stroke-width="1.5" transform="rotate(-15 128 20)"/>
                        <line x1="131" y1="28" x2="148" y2="23" stroke="#2563EB" stroke-width="1.5"/>
                        <line x1="133" y1="33" x2="145" y2="30" stroke="#2563EB" stroke-width="1.5"/>
                        <circle cx="150" cy="20" r="3" fill="#F59E0B"/>
                        <circle cx="120" cy="15" r="2" fill="#F59E0B"/>
                    </svg>
                </div>

                <!-- Text block -->
                <h2 class="text-2xl md:text-[26px] font-extrabold tracking-[-1px] text-[#1E293B] leading-[1.2] mb-3">
                    Your Achievements,<br>Your Story
                </h2>
                <p class="text-[14px] text-[#64748B] max-w-[320px] leading-relaxed">
                    Submit your credentials, track their verification status in real-time, and build a verified profile of your university achievements.
                </p>
            </div>
        </div>

        <!-- Right Panel: Student Login Form -->
        <div class="flex items-center justify-center p-8 bg-white auth-right">
            <div class="w-full max-w-[400px]">
                <!-- Logo & Heading -->
                <div class="flex flex-col items-center lg:items-start text-center lg:text-left mb-8">
                    <div class="mb-6">
                        <x-logo />
                    </div>
                    <h2 class="text-[24px] font-extrabold tracking-[-0.6px] text-[#1E293B] mb-1">Welcome back</h2>
                    <p class="text-[13px] text-[#64748B]">Sign in to your student account</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">College Email Address</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="e.g. merin.jose@college.edu">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me / Forgot Password -->
                    <div class="flex items-center justify-between mb-6 text-[13px]">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#2563EB] shadow-sm focus:ring-[#2563EB] focus:ring-opacity-20" name="remember">
                            <span class="ml-2 text-[#64748B] font-medium">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-[#2563EB] hover:underline font-semibold" href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Sign In Button -->
                    <button type="submit" class="btn btn-primary w-full rounded-lg mb-6 py-[12px] flex items-center justify-center gap-2">
                        <span>Sign In</span>
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>

                <!-- Centered Footer Text -->
                <div class="text-center text-[13px] text-[#64748B]">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-[#2563EB] hover:underline font-bold ml-1">Create one</a>
                </div>

                <!-- Divider -->
                <div class="relative flex py-5 items-center justify-center">
                    <div class="flex-grow border-t border-[#E2E8F0]"></div>
                    <span class="flex-shrink mx-4 text-xs text-[#94A3B8] font-bold uppercase tracking-wider">Or</span>
                    <div class="flex-grow border-t border-[#E2E8F0]"></div>
                </div>

                <!-- Faculty Link -->
                <div class="text-center text-[13px] text-[#64748B]">
                    Faculty? 
                    <a href="{{ route('faculty.login') }}" class="text-[#2563EB] hover:underline font-bold ml-1">Login here &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
