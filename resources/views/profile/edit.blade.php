<x-app-layout>
    @section('top-bar-left')
        <h2 class="text-[16px] font-extrabold text-[#1E293B] tracking-tight">My Profile</h2>
    @endsection

    <div class="max-w-[900px] mx-auto flex flex-col gap-8 pb-10" x-data="{ editing: false }">
        
        <!-- Profile Hero Banner -->
        <div class="profile-hero bg-gradient-to-r from-[#EFF6FF] via-[#EFF6FF] to-[#DBEAFE] border border-[#BFDBFE] rounded-[24px] p-8 flex flex-col sm:flex-row items-center gap-7 shadow-sm">
            <!-- Large circular avatar -->
            <x-avatar initials="{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}" color="blue-purple" size="lg" />

            <!-- Middle details -->
            <div class="flex-1 text-center sm:text-left">
                <h2 class="text-[24px] font-extrabold text-[#1E293B] tracking-tight mb-1">
                    {{ Auth::user()->name }}
                </h2>
                <p class="text-[14px] text-[#64748B] font-medium mb-3">
                    Bachelor of Technology in {{ Auth::user()->department->name ?? 'N/A' }}
                </p>
                <!-- Meta chips -->
                <div class="flex flex-wrap justify-center sm:justify-start gap-2 text-[12px] font-bold text-[#2563EB]">
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-white border border-[#DBEAFE] rounded-full">
                        📘 Roll: {{ Auth::user()->roll_no ?? 'N/A' }}
                    </span>
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-white border border-[#DBEAFE] rounded-full">
                        🎓 S{{ Auth::user()->semester ?? 'N/A' }} — {{ Auth::user()->year ?? 'N/A' }} Year
                    </span>
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-white border border-[#DBEAFE] rounded-full">
                        📦 Batch: {{ Auth::user()->batch ?? 'N/A' }}
                    </span>
                </div>
            </div>

            <!-- Edit Button -->
            <button @click="editing = !editing" class="btn btn-primary btn-sm rounded-lg shrink-0 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
                <span x-text="editing ? 'View Profile' : 'Edit Profile'">Edit Profile</span>
            </button>
        </div>

        <!-- Read-only Mode -->
        <div x-show="!editing" x-transition.fade class="flex flex-col gap-8">
            <!-- Personal Information Section -->
            <div class="flex flex-col items-start">
                <h3 class="text-[15px] font-bold text-[#1E293B] mb-4">Personal Information</h3>
                
                <div class="info-grid w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Cards -->
                    <div class="info-card">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-1">Full Name</span>
                        <span class="text-[15px] font-bold text-[#1E293B]">{{ Auth::user()->name }}</span>
                    </div>

                    <div class="info-card">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-1">Roll Number</span>
                        <span class="text-[15px] font-bold text-[#1E293B]">{{ Auth::user()->roll_no ?? 'N/A' }}</span>
                    </div>

                    <div class="info-card">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-1">Email Address</span>
                        <span class="text-[15px] font-bold text-[#1E293B]">{{ Auth::user()->email }}</span>
                    </div>

                    <div class="info-card">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-1">Phone Number</span>
                        <span class="text-[15px] font-bold text-[#1E293B]">{{ Auth::user()->phone ?? 'N/A' }}</span>
                    </div>

                    <div class="info-card">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-1">Branch</span>
                        <span class="text-[15px] font-bold text-[#1E293B]">{{ Auth::user()->department->name ?? 'N/A' }}</span>
                    </div>

                    <div class="info-card">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-1">Year / Semester</span>
                        <span class="text-[15px] font-bold text-[#1E293B]">{{ Auth::user()->year ?? 'N/A' }} Year / S{{ Auth::user()->semester ?? 'N/A' }}</span>
                    </div>

                    <div class="info-card">
                        <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-1">Batch</span>
                        <span class="text-[15px] font-bold text-[#1E293B]">{{ Auth::user()->batch ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <!-- Faculty Advisors Section -->
            @php
                $facultyAssignments = \App\Models\FacultyAssignment::with('faculty')
                    ->where('department_id', Auth::user()->department_id)
                    ->get()
                    ->groupBy('domain');
            @endphp
            <div class="flex flex-col items-start">
                <h3 class="text-[15px] font-bold text-[#1E293B] mb-4">Faculty Advisors</h3>
                
                <div class="info-grid w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach(['Academic', 'Extra-Curricular'] as $domain)
                        @php
                            $assignment = $facultyAssignments->get($domain)?->first();
                            $faculty = $assignment?->faculty;
                        @endphp
                        <div class="info-card">
                            <span class="text-[10px] font-extrabold text-[#94A3B8] uppercase tracking-wider block mb-2">
                                {{ $domain }} Coordinator
                            </span>
                            @if($faculty)
                                <span class="text-[15px] font-bold text-[#1E293B] block">{{ $faculty->name }}</span>
                                <span class="text-[12px] text-[#64748B]">{{ $faculty->email }}</span>
                            @else
                                <span class="text-[15px] font-bold text-[#64748B]">Not Assigned</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Achievement Summary Section -->
            <div class="flex flex-col items-start">
                <h3 class="text-[15px] font-bold text-[#1E293B] mb-4">Achievement Summary</h3>
                
                <div class="w-full grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white border border-[#E2E8F0] rounded-xl p-4 text-center shadow-sm">
                        <span class="text-[24px] font-extrabold text-[#2563EB] block">12</span>
                        <span class="text-xs font-semibold text-[#64748B] uppercase tracking-wide">Total submitted</span>
                    </div>
                    <div class="bg-white border border-[#E2E8F0] rounded-xl p-4 text-center shadow-sm">
                        <span class="text-[24px] font-extrabold text-[#22C55E] block">7</span>
                        <span class="text-xs font-semibold text-[#64748B] uppercase tracking-wide">Approved</span>
                    </div>
                    <div class="bg-white border border-[#E2E8F0] rounded-xl p-4 text-center shadow-sm">
                        <span class="text-[24px] font-extrabold text-[#F59E0B] block">3</span>
                        <span class="text-xs font-semibold text-[#64748B] uppercase tracking-wide">Pending</span>
                    </div>
                    <div class="bg-white border border-[#E2E8F0] rounded-xl p-4 text-center shadow-sm">
                        <span class="text-[24px] font-extrabold text-[#EF4444] block">2</span>
                        <span class="text-xs font-semibold text-[#64748B] uppercase tracking-wide">Rejected</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Profile Mode (Laravel Breeze Forms Redesigned) -->
        <div x-show="editing" x-transition.fade class="flex flex-col gap-6">
            <!-- Edit Profile details card -->
            <div class="card-elevated p-8">
                <div class="max-w-xl">
                    <h3 class="text-lg font-extrabold text-[#1E293B] mb-1">Profile Information</h3>
                    <p class="text-sm text-[#64748B] mb-6">Update your account's profile name and email address.</p>
                    
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name', Auth::user()->name) }}" required autocomplete="name">
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email', Auth::user()->email) }}" required autocomplete="username">
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone', Auth::user()->phone) }}" required placeholder="10-digit phone number" autocomplete="tel">
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <div class="form-group">
                            <label for="roll_no">Roll Number</label>
                            <input id="roll_no" name="roll_no" type="text" value="{{ old('roll_no', Auth::user()->roll_no) }}" required autocomplete="off">
                            <x-input-error class="mt-2" :messages="$errors->get('roll_no')" />
                        </div>

                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select id="department_id" name="department_id" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}" {{ old('department_id', Auth::user()->department_id) == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('department_id')" />
                        </div>

                        <div class="form-group">
                            <label for="year">Academic Year</label>
                            <select id="year" name="year" required>
                                <option value="">Select Year</option>
                                @for($i = 1; $i <= 4; $i++)
                                    <option value="{{ $i }}" {{ old('year', Auth::user()->year) == $i ? 'selected' : '' }}>
                                        {{ $i }} Year
                                    </option>
                                @endfor
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('year')" />
                        </div>

                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select id="semester" name="semester" required>
                                <option value="">Select Semester</option>
                                @for($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ old('semester', Auth::user()->semester) == $i ? 'selected' : '' }}>
                                        Semester {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('semester')" />
                        </div>

                        <div class="form-group">
                            <label for="batch">Batch</label>
                            <input id="batch" name="batch" type="text" value="{{ old('batch', Auth::user()->batch) }}" required placeholder="e.g., 2021-2025" autocomplete="off">
                            <x-input-error class="mt-2" :messages="$errors->get('batch')" />

                        <div class="flex items-center gap-4">
                            <button type="submit" class="btn btn-primary btn-sm rounded-lg">Save Information</button>
                            @if (session('status') === 'profile-updated')
                                <span class="text-sm text-green-600 font-semibold">✓ Profile updated successfully</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Password update card -->
            <div class="card-elevated p-8">
                <div class="max-w-xl">
                    <h3 class="text-lg font-extrabold text-[#1E293B] mb-1">Update Password</h3>
                    <p class="text-sm text-[#64748B] mb-6">Ensure your account is using a long, random password to stay secure.</p>
                    
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="update_password_current_password">Current Password</label>
                            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" placeholder="••••••••">
                            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
                        </div>

                        <div class="form-group">
                            <label for="update_password_password">New Password</label>
                            <input id="update_password_password" name="password" type="password" autocomplete="new-password" placeholder="••••••••">
                            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
                        </div>

                        <div class="form-group">
                            <label for="update_password_password_confirmation">Confirm Password</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" placeholder="••••••••">
                            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="btn btn-primary btn-sm rounded-lg">Update Password</button>
                            @if (session('status') === 'password-updated')
                                <span class="text-sm text-green-600 font-semibold">✓ Password updated</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="card-elevated p-8">
                <div class="max-w-xl text-left">
                    <h3 class="text-lg font-extrabold text-red-600 mb-1">Delete Account</h3>
                    <p class="text-sm text-[#64748B] mb-6">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                    
                    <button x-data="" @click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="btn btn-danger btn-sm rounded-lg">
                        Delete Account
                    </button>

                    <!-- Modal code inside -->
                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 text-left">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-bold text-gray-900">
                                Are you sure you want to delete your account?
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Once your account is deleted, all of its data will be permanently lost. Please enter your password to confirm deletion.
                            </p>

                            <div class="form-group mt-4">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" placeholder="Password" class="block w-3/4">
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end gap-3">
                                <button type="button" @click="$dispatch('close')" class="btn btn-ghost btn-sm rounded-lg">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-danger btn-sm rounded-lg">
                                    Delete Account
                                </button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
