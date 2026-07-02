import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#2563EB',
                    light: '#EFF6FF',
                    mid: '#DBEAFE',
                },
                success: {
                    DEFAULT: '#22C55E',
                    bg: '#F0FDF4',
                },
                pending: {
                    DEFAULT: '#F59E0B',
                    bg: '#FFFBEB',
                },
                rejected: {
                    DEFAULT: '#EF4444',
                    bg: '#FEF2F2',
                },
                app: {
                    bg: '#F8FAFC',
                    card: '#FFFFFF',
                    text: '#1E293B',
                    'text-muted': '#64748B',
                    'text-light': '#94A3B8',
                    border: '#E2E8F0',
                }
            },
        },
    },

    plugins: [forms],
};
