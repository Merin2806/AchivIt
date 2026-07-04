@if (session('success'))
    <div class="fixed top-6 right-6 max-w-sm bg-white border border-[#D1FAE5] rounded-lg shadow-lg p-4 flex items-start gap-3 animate-fade-in z-50"
         x-data="{ show: true }"
         x-show="show"
         @click.outside="show = false"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-init="setTimeout(() => show = false, 5000)">
        
        <!-- Success Icon -->
        <svg class="w-5 h-5 text-[#10B981] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>

        <!-- Message -->
        <div class="flex-1">
            <p class="text-sm font-medium text-[#065F46]">
                {{ session('success') }}
            </p>
        </div>

        <!-- Close Button -->
        <button @click="show = false" class="text-[#10B981] hover:text-[#059669] shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="fixed top-6 right-6 max-w-sm bg-white border border-[#FEE2E2] rounded-lg shadow-lg p-4 flex items-start gap-3 animate-fade-in z-50"
         x-data="{ show: true }"
         x-show="show"
         @click.outside="show = false"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-init="setTimeout(() => show = false, 5000)">
        
        <!-- Error Icon -->
        <svg class="w-5 h-5 text-[#EF4444] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
        </svg>

        <!-- Message -->
        <div class="flex-1">
            <p class="text-sm font-medium text-[#991B1B]">
                {{ session('error') }}
            </p>
        </div>

        <!-- Close Button -->
        <button @click="show = false" class="text-[#EF4444] hover:text-[#DC2626] shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
@endif

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
</style>
