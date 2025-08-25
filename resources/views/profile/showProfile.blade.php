<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Profile Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-start space-x-6">
                <!-- Profile Photo -->
                <div class="flex-shrink-0">
                    <img class="h-24 w-24 rounded-full object-cover"
                        src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/default-avatar.png') }}"
                        alt="{{ $user->name }}">
                </div>

                <!-- User Information -->
                <div class="flex-1">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-gray-600 mt-1">{{ $user->email }}</p>

                    @if ($user->bio)
                        <p class="text-gray-700 mt-3">{{ $user->bio }}</p>
                    @endif

                    <!-- User Details -->
                    <div class="mt-4 space-y-2">
                        @if ($user->phone)
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                {{ $user->phone }}
                            </div>
                        @endif

                        @if ($user->location)
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $user->location }}
                            </div>
                        @endif

                        @if ($user->website)
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                    </path>
                                </svg>
                                <a href="{{ $user->website }}" target="_blank"
                                    class="text-blue-600 hover:text-blue-800">
                                    {{ $user->website }}
                                </a>
                            </div>
                        @endif

                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3a4 4 0 118 0v4m-4 1v8m0 0H8m4 0h4m-4 0v3"></path>
                            </svg>
                            Member since {{ $user->created_at->format('M Y') }}
                        </div>
                    </div>
                </div>
                <button class="btn">Edit</button>
            </div>
        </div>
    </div>
</x-layout>
