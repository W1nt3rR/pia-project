<x-layout>
    <x-auth-page>
        <x-form-box class="login-form">
            <h1>Login</h1>
            <form method="POST" action="{{ route('login') }}">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" label="Email" required autofocus />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" label="Password" required autocomplete="current-password" />
                </div>

                <div class="button-container">
                    <button class="button" type="submit">Login</button>
                </div>
            </form>
        </x-form-box>
    </x-auth-page>
</x-layout>