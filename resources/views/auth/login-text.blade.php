<div class="container">
    <form method="POST" class="w-50 m-auto mt-5" action="{{ route('login') }}">
        <!-- Email input -->

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <input type="email" id="email" class="form-control" name="email" :value="old('email')"
                required autofocus autocomplete="username" placeholder="UserEmail" />
        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input type="password" id="password" name="password" class="form-control" required
                autocomplete="current-password" placeholder="Password" />
        </div>


        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4 d-flex justify-content-between">
            <div class="col">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="remember"
                        id="remember_me" checked />
                    <label class="form-check-label" for="remember_me"> {{ __('Remember me') }} </label>
                </div>
            </div>



            <div class="col">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="text-center">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-primary btn-block mb-4">{{__('login')}}</button>
        </div>


        <!-- Submit button -->


        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
            <p>or sign up with:</p>
            <button type="button" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-link btn-floating mx-1 text-dark">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-link btn-floating mx-1 text-dark">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-link btn-floating mx-1 text-dark">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" data-mdb-button-init data-mdb-ripple-init
                class="btn btn-link btn-floating mx-1 text-dark">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>

</div>
