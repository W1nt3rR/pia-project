<x-layout>
    <x-auth-page>
        <x-form-box class="login-form">
            <h1>Reset password</h1>
            <form method="POST" action="/user/passwordreset" novalidate>
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" label="Email" autofocus />
                    @error('email')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="current-password" label="Password"/>
                    @error('password')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="new-password" label="Password"/>
                    @error('new-password')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="confirm-password" label="Password"/>
                    @error('confirm-password')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="button-container">
                    <button class="button" type="submit">Reset</button>
                </div>
            </form>
        </x-form-box>

        <a class="switch-login-register" href="/register">Go to Register</a>
    </x-auth-page>
</x-layout>