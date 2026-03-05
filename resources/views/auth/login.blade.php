<x-layout>

<section class="bg-onepiece">
    <div class="container py-5">
        <div class="treasure-map-form mx-auto">

            <h2 class="map-title text-center mb-4">Accedi</h2>

            <div class="form-overlay">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="map-group mb-4">
                        <label class="map-label">Email</label>
                        <input type="email" name="email" class="map-input" required autofocus>
                        @error('email')
                            <p class="map-error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="map-group mb-4">
                        <label class="map-label">Password</label>
                        <input type="password" name="password" class="map-input" required>
                        @error('password')
                            <p class="map-error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="map-button">
                        ✦ Entra ✦
                    </button>

                </form>

            </div>

        </div>
    </div>
</section>

</x-layout>