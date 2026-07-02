@props(['theme' => 'light'])

<div class="flex items-center gap-3">
    <!-- Logo Mark -->
    <div class="w-[34px] h-[34px] rounded-[9px] bg-gradient-to-br from-[#2563EB] to-[#1D4ED8] flex items-center justify-center shadow-sm shrink-0">
        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 4L3 9L12 14L21 9L12 4Z" fill="currentColor"/>
            <path d="M6 12.5L12 15.5L18 12.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M8 15.5L12 17.5L16 15.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <!-- Wordmark -->
    <span class="text-xl font-extrabold tracking-[-0.6px]">
        <span class="{{ $theme === 'dark' ? 'text-white' : 'text-[#1E293B]' }}">Achi</span><span class="text-[#2563EB]">vit</span>
    </span>
</div>
