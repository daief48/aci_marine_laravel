<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - ACI Marine</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SVG favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('image/favicon.svg') }}">
    <!-- PNG fallback for browsers that don't support SVG favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/logo_white_bg.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo_white_bg.png') }}">
    <link rel="shortcut icon" href="{{ asset('image/favicon.svg') }}">
    <!-- Apple home screen icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/logo_white_bg.png') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        outfit: ['Outfit', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            green: '#27a844',
                            red: '#F60000',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-slate-800 bg-[#f8fafc] flex items-center justify-center min-h-screen relative overflow-hidden">
    <!-- Background glowing spots -->
    <div class="absolute top-[-10%] left-[-10%] w-[600px] h-[600px] rounded-full bg-brand-green/5 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[600px] h-[600px] rounded-full bg-brand-red/5 blur-[120px] pointer-events-none"></div>

    <div class="w-full max-w-[460px] p-6 relative z-10">
        <!-- Brand Logo/Header -->
        <div class="text-center mb-8">
            <img src="{{ asset('image/logo_white_bg.png') }}" alt="ACI Marine Logo" class="h-14 w-auto object-contain mx-auto">
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-3">Admin Portal Authentication</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white border border-slate-100 rounded-[32px] p-8 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)]">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-100 rounded-2xl">
                    <ul class="list-disc list-inside text-xs text-brand-red font-semibold space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-slate-50 border border-slate-200/60 rounded-2xl px-4 py-3.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-green focus:bg-white transition-all duration-300">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Password</label>
                    </div>
                    <input type="password" name="password" id="password" required
                        class="w-full bg-slate-50 border border-slate-200/60 rounded-2xl px-4 py-3.5 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-green focus:bg-white transition-all duration-300">
                </div>

                <button type="submit" 
                    class="w-full py-4 bg-brand-green hover:bg-[#1f8736] text-white font-bold text-sm uppercase tracking-wider rounded-2xl shadow-[0_10px_20px_rgba(39,168,68,0.2)] hover:shadow-[0_15px_30px_rgba(39,168,68,0.35)] transition-all duration-300 transform hover:-translate-y-0.5">
                    Sign In to Portal
                </button>
            </form>
        </div>

        <div class="text-center mt-8">
            <span class="text-[11px] text-slate-400 font-semibold">&copy; {{ now()->year }} ACI Marine. All Rights Reserved.</span>
        </div>
    </div>
</body>
</html>
