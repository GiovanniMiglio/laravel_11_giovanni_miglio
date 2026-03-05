<x-layout>

<section class="bg-onepiece">
    <div class="container py-5">
        <div class="treasure-map-form mx-auto">

            <h2 class="map-title text-center mb-4">Registrati</h2>

            <div class="form-overlay">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="map-group mb-4">
                        <label class="map-label">Nome</label>
                        <input type="text" name="name" class="map-input" required>
                        @error('name')
                            <p class="map-error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="map-group mb-4">
                        <label class="map-label">Email</label>
                        <input type="email" name="email" class="map-input" required>
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

                    <div class="map-group mb-4">
                        <label class="map-label">Conferma Password</label>
                        <input type="password" name="password_confirmation" class="map-input" required>
                        @error('password_confirmation')
                            <p class="map-error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="map-button">
                        ✦ Crea Account ✦
                    </button>

                </form>

            </div>

        </div>
    </div>
</section>

</x-layout>