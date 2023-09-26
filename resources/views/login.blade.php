<x-layout>
    <x-auth-page>
        <x-form-box class="login-form">
            <h1>Login</h1>
            <form method="POST" action="/user/login" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" label="Email" autofocus />
                    @error('email')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" label="Password"/>
                    @error('password')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="button-container">
                    <button class="button" type="submit">Login</button>
                </div>
            </form>
        </x-form-box>
    </x-auth-page>
</x-layout>