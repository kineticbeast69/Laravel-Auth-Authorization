@include("subview.header")

<center class="fs-2 text-light mb-3 text-decoration-underline bg-info w-100 p-2">
    Register form
</center>

<!-- alert message is here -->
<center>
    @if (session('userExist'))
        <x-alert type="success" message="{{ session('userExist') }}" />
    @endif
    <!-- user server error -->
    @if (session('UserError'))
        <x-alert type="success" message="{{ session('UserError') }}" />
    @endif

</center>

<!-- form for login is here -->
<div class="d-flex justify-content-center align-items-center w-full">
    <form class="w-25 border border-secondary rounded-3 py-3 px-2" action="/registerForm" method="post">
        @csrf
        <!-- username from section is here -->
        <div class="mb-3">
            <label for="username" class="form-label font-bold fs-4">Username</label>
            <input type="text" class="form-control border border-dark" id="username" name="username">

            <!-- form validation error -->
            @error("username")
                <p class="fs-6 text-danger italic">
                    {{$message}}
                </p>
            @enderror
        </div>
        <!-- email from section is here -->
        <div class="mb-3">
            <label for="email" class="form-label font-bold fs-4">Email address</label>
            <input type="email" class="form-control border border-dark" id="email" aria-describedby="emailHelp"
                name="email">

            <!-- form validation error -->
            @error("email")
                <p class="fs-6 text-danger italic">
                    {{$message}}
                </p>
            @enderror
        </div>
        <!-- password form section -->
        <div class="mb-3">
            <label for="password" class="form-label font-bold fs-4">Password</label>
            <input type="password" class="form-control border border-dark" id="password" name="password">

            <!-- form validation error -->
            @error("password")
                <p class="fs-6 text-danger italic">{{$message}}</p>
            @enderror
        </div>
        <!-- confrim password form section -->
        <div class="mb-3">
            <label for="Cpassword" class="form-label font-bold fs-4">Confirm Password</label>
            <input type="password" class="form-control border border-dark" id="Cpassword" name="password_confirmation">

            <!-- form validation error -->
            @error("password_confirmation")
                <p class="fs-6 text-danger italic">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
        <div class="bg-secondary my-2" style="height:1px; width: 100%;"></div>
        <p class="mt-2 mb-0">Have an Account? <a href="{{route("login")}}">Login</a></p>
    </form>
</div>

@include("subview.footer")