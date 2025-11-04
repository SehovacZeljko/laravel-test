<x-layout>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>Register for an Account</h2>

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <!-- Phone Number (Optional) -->
        <div>
            <label for="phone_number">Phone Number</label>
            <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}">
            @error('phone_number')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <!-- Bio (Optional) -->
        <div>
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" rows="3">{{ old('bio') }}</textarea>
            @error('bio')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <!-- Location (Optional) -->
        <div>
            <label for="location">Location</label>
            <input id="location" type="text" name="location" value="{{ old('location') }}">
            @error('location')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <!-- Website (Optional) -->
        <div>
            <label for="website">Website</label>
            <input id="website" type="url" name="website" value="{{ old('website') }}">
            @error('website')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <!-- Avatar -->
        <div>
            <label for="avatar">Avatar</label>
            <input id="avatar" type="file" name="avatar" accept="image/*">
            @error('avatar')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="password_confirmation">Password:</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit" class="btn mt-4">Register</button>

        <!-- validation errors -->
        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </form>
</x-layout>
