@props([
    'color' => 'blue', // blue, green, amber, red
    'number' => '0',
    'label' => 'Total',
])

@php
    $colorMap = [
        'blue' => [
            'cardClass' => 'blue',
            'textClass' => 'text-[#2563EB]',
            'badgeBg' => 'bg-[#EFF6FF]',
        ],
        'green' => [
            'cardClass' => 'green',
            'textClass' => 'text-[#22C55E]',
            'badgeBg' => 'bg-[#F0FDF4]',
        ],
        'amber' => [
            'cardClass' => 'amber',
            'textClass' => 'text-[#F59E0B]',
            'badgeBg' => 'bg-[#FFFBEB]',
        ],
        'red' => [
            'cardClass' => 'red',
            'textClass' => 'text-[#EF4444]',
            'badgeBg' => 'bg-[#FEF2F2]',
        ],
    ][$color] ?? [
        'cardClass' => 'blue',
        'textClass' => 'text-[#2563EB]',
        'badgeBg' => 'bg-[#EFF6FF]',
    ];
@endphp

<div class="stat-card {{ $colorMap['cardClass'] }}">
    <div class="flex flex-col gap-3 relative z-10">
        <!-- 40x40px rounded-square icon chip -->
        <div class="w-10 h-10 rounded-lg {{ $colorMap['badgeBg'] }} {{ $colorMap['textClass'] }} flex items-center justify-center shrink-0">
            {{ $icon ?? '' }}
        </div>
        
        <!-- Large bold number & label -->
        <div class="flex flex-col mt-1">
            <span class="text-[28px] font-extrabold tracking-tighter {{ $colorMap['textClass'] }} leading-none">
                {{ $number }}
            </span>
            <span class="text-[11px] font-bold text-[#64748B] mt-1 uppercase tracking-[0.06em]">
                {{ $label }}
            </span>
        </div>
    </div>
</div>
