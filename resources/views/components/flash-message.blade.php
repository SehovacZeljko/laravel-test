@php
    // Define all possible flash types
    $flashTypes = ['success', 'error', 'info', 'warning'];

    // Find the first session key that exists
    $type = null;
    $message = null;
    foreach ($flashTypes as $t) {
        if (session($t)) {
            $type = $t;
            $message = session($t);
            break;
        }
    }

    // Map types to Tailwind colors
    $colors = [
        'success' => 'bg-green-500',
        'error' => 'bg-red-500',
        'info' => 'bg-blue-500',
        'warning' => 'bg-yellow-500 text-black',
    ];
@endphp

@if ($message)
    <div id="flash"
        class="fixed top-0 left-0 w-full {{ $colors[$type] ?? 'bg-gray-500' }} 
                text-white font-bold py-3 text-center shadow-md z-50">
        {{ $message }}
    </div>

    <script>
        setTimeout(() => {
            const flash = document.getElementById('flash');
            if (flash) {
                flash.style.transition = "opacity 0.5s ease";
                flash.style.opacity = "0";
                setTimeout(() => flash.remove(), 1000);
            }
        }, 3000);
    </script>
@endif
