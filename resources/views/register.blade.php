<x-layout>
    <x-auth-page>
        <x-form-box class="register-form">
            <h1>Register</h1>
            <form method="POST" action="{{ route('register') }}">

                <div class="group-group">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first-name" label="First Name" required autofocus />
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last-name" label="Last Name" required />
                    </div>
                </div>

                <div class="group-group">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" label="Username" required />
                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" name="picture" label="Picture" required />
                    </div>
                </div>

                <div class="group-group">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" label="Country" required />
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" label="City" required />
                    </div>
                </div>

                <div class="group-group">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" label="Gender" required>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Birth Date</label>
                        <input type="date" name="birth-date" label="Birth Date" required />
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone-number" label="Phone Number" required />
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" label="Email" required />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" label="Password" required />
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm-password" label="Confirm Password" required />
                </div>

                <div class="button-container">
                    <button class="button" type="submit">Register</button>
                </div>
            </form>
        </x-form-box>
    </x-auth-page>
</x-layout>