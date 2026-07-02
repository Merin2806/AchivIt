<x-guest-layout>
    <div class="min-h-screen w-full flex items-center justify-center p-8 bg-gradient-to-tr from-[#EFF6FF] via-[#EFF6FF] to-[#FAF5FF] relative overflow-hidden reg-page">
        <!-- Floating shape blobs in corners -->
        <div class="absolute top-10 left-10 w-32 h-32 bg-blue-400/10 rounded-[24px] rotate-12 blur-xl"></div>
        <div class="absolute bottom-10 right-10 w-40 h-40 bg-purple-400/10 rounded-full blur-2xl"></div>
        <div class="absolute top-1/2 left-2/3 w-24 h-24 bg-teal-400/5 rounded-[16px] rotate-45 blur-lg"></div>

        <div class="relative z-10 w-full max-w-[480px] flex flex-col items-center">
            <!-- Logo Lockup above glass card -->
            <div class="mb-6">
                <a href="/">
                    <x-logo />
                </a>
            </div>

            <!-- Glass Card -->
            <div class="w-full glass-card">
                <!-- Header -->
                <div class="mb-8 text-center sm:text-left">
                    <h2 class="text-[24px] font-extrabold tracking-[-0.6px] text-[#1E293B] mb-1">Create your account</h2>
                    <p class="text-[13px] text-[#64748B]">Join Achivit as a student today</p>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" id="register-form">
                    @csrf

                    <!-- Hidden Concatenated Name for Breeze Backend -->
                    <input type="hidden" name="name" id="name" value="{{ old('name') }}">

                    <!-- First / Last Name (Two-col) -->
                    <div class="two-col">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input id="first_name" type="text" placeholder="Merin" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" type="text" placeholder="Joys" required>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="-mt-2 mb-4" />

                    <!-- College Email -->
                    <div class="form-group">
                        <label for="email">College Email Address</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="e.g. merin.joys@college.edu">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Roll Number / Branch Dropdown (Two-col) -->
                    <div class="two-col">
                        <div class="form-group">
                            <label for="roll_number">Roll Number</label>
                            <input id="roll_number" name="roll_number" type="text" placeholder="21CS047" required>
                        </div>
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select id="branch" name="branch" required>
                                <option value="" disabled selected>Select Branch</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Civil">Civil</option>
                            </select>
                        </div>
                    </div>

                    <!-- Password / Confirm Password (Two-col) -->
                    <div class="two-col">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Terms checkbox -->
                    <div class="flex items-start mb-6 text-[12px] leading-relaxed">
                        <input id="terms" type="checkbox" required class="rounded border-gray-300 text-[#2563EB] shadow-sm focus:ring-[#2563EB] focus:ring-opacity-20 mt-1 shrink-0">
                        <label for="terms" class="ml-2 text-[#64748B] font-medium">
                            I agree to the <a href="#" class="text-[#2563EB] hover:underline font-semibold">Terms of Service</a> and <a href="#" class="text-[#2563EB] hover:underline font-semibold">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Create Account Button -->
                    <button type="submit" class="btn btn-primary w-full rounded-lg py-[13px] text-[15px] flex items-center justify-center gap-2 mb-6">
                        <span>Create Account</span>
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>

                <!-- Footer link -->
                <div class="text-center text-[13px] text-[#64748B]">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-[#2563EB] hover:underline font-bold ml-1">Sign in</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to Concatenate First and Last Name -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const firstName = document.getElementById('first_name');
            const lastName = document.getElementById('last_name');
            const hiddenName = document.getElementById('name');

            function updateHiddenName() {
                hiddenName.value = (firstName.value.trim() + ' ' + lastName.value.trim()).trim();
            }

            if (firstName && lastName && hiddenName) {
                firstName.addEventListener('input', updateHiddenName);
                lastName.addEventListener('input', updateHiddenName);
                
                // Initialize in case of old input
                if (hiddenName.value) {
                    const parts = hiddenName.value.split(' ');
                    if (parts.length > 0) {
                        firstName.value = parts[0];
                        if (parts.length > 1) {
                            lastName.value = parts.slice(1).join(' ');
                        }
                    }
                }
            }
        });
    </script>
</x-guest-layout>
