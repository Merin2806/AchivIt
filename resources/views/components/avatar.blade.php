@props([
    'initials' => 'MJ',
    'size' => 'default', // sm, default, lg
    'color' => 'blue-purple', // blue-purple, green-emerald, red-orange, amber-orange, cyan
])

@php
    $sizeClasses = [
        'sm' => 'w-[28px] h-[28px] text-[11px]',
        'default' => 'w-[36px] h-[36px] text-[14px]',
        'lg' => 'w-[90px] h-[90px] text-[32px] border-[4px] border-white shadow-[0_4px_14px_rgba(37,99,235,0.25)]',
    ][$size] ?? 'w-[36px] h-[36px] text-[14px]';

    $colorClasses = [
        'blue-purple' => 'from-[#2563EB] to-[#7C3AED]',
        'green-emerald' => 'from-[#059669] to-[#10B981]',
        'red-orange' => 'from-[#DC2626] to-[#F97316]',
        'amber-orange' => 'from-[#B45309] to-[#F59E0B]',
        'cyan' => 'from-[#0891B2] to-[#06B6D4]',
    ][$color] ?? 'from-[#2563EB] to-[#7C3AED]';
@endphp

<div class="rounded-full bg-gradient-to-br {{ $colorClasses }} {{ $sizeClasses }} flex items-center justify-center font-bold text-white shrink-0">
    {{ $initials }}
</div>
