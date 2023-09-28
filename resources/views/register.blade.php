<x-layout>
    <x-auth-page>
        <x-form-box class="register-form">
            <h1>Register</h1>
            <form method="POST" action="/user/register" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="group-group">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first-name" label="First Name" value="{{old('first-name')}}" autofocus />
                        @error('first-name')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last-name" label="Last Name" value="{{old('last-name')}}" />
                        @error('last-name')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="group-group">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" label="Username" value="{{old('username')}}" />
                        @error('username')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" name="picture" label="Picture" value="{{old('picture')}}" />
                        @error('picture')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="group-group">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" label="Country" value="{{old('country')}}" />
                        @error('country')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" label="City" value="{{old('city')}}" />
                        @error('city')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="group-group">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" label="Gender" value="{{old('gender')}}">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        @error('gender')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Birth Date</label>
                        <input type="date" name="birth-date" label="Birth Date" value="{{old('birth-date')}}" />
                        @error('birth-date')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone-number" label="Phone Number" value="{{old('phone-number')}}" />
                    @error('phone-number')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" label="Email" value="{{old('email')}}" />
                    @error('email')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" label="Password" />
                    @error('password')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm-password" label="Confirm Password" />
                    @error('confirm-password')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="button-container">
                    <button class="button" type="submit">Register</button>
                </div>
            </form>
        </x-form-box>

        <a class="switch-login-register" href="/login">Go to Login</a>
    </x-auth-page>
</x-layout>