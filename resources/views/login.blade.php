@include("subview.header")

<center class="fs-2 text-light mb-3 text-decoration-underline bg-info w-100 p-2">
    Login First.
</center>

<!-- alert message is here -->
<center>
    @if (session('Emailexists'))
        <x-alert type="danger" message="{{ session('Emailexists') }}" />
    @endif
    <!-- user server error -->
    @if (session('failedPassword'))
        <x-alert type="danger" message="{{ session('failedPassword') }}" />
    @endif
    @if (session('AuthFailed'))
        <x-alert type="info" message="{{ session('AuthFailed') }}" />
    @endif
</center>

<!-- form for login is here -->
<div class="d-flex justify-content-center align-items-center w-full">
    <form class="w-25 border border-secondary rounded-3 py-3 px-2" action="/loginForm" method="post">
        @csrf
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
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <div class="bg-secondary my-2" style="height:1px; width: 100%;"></div>
        <p class="mt-2 mb-0">Don't have an Account? <a href="{{route("register")}}">Sign-Up</a></p>
    </form>
</div>

@include("subview.footer")