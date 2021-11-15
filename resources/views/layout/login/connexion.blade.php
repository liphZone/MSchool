<!DOCTYPE html>
<html lang="fr">
<head>
@include('layout.login.partials.head')
</head>
<body>
	<div class="limiter">
        <script src="//code.jquery.com/jquery.js"></script>
        @include('flashy::message')
		<div class="container-login100">
            <div class="wrap-login100">
                @foreach ($description as $descriptions)
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="/storage/{{$descriptions->image_ecole}}" alt="IMG">
                    </div>
                @endforeach
                <form action="{{route('login_action')}}" method="POST" role="form" class="login100-form validate-form">
                    <img style="height:90px; width:90px; border-radius:4px; margin-left:90px;" src="/storage/Zone/logombsvi.jpg">
                    <span class="login100-form-title">
                        @foreach ($description as $descriptions)
                        {{ $descriptions->nom_ecole }}
                        @endforeach
                    </span>
                    @csrf
                    <div class="wrap-input100 validate-input" data-validate = "Nom d'utilisateur requis">
                        <input class="input100" type="text" value="{{old('username')}}" name="username" placeholder="nom d'utilisateur" required="" autocomplete="off">
                        @error('username')
                            <div style="color:red;">{{$message}} </div>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Mot de passe requis !">
                        <input class="input100" type="password"placeholder="mot de passe" name="password">
                        @error('password')
                            <div style="color:red;">{{$message}} </div>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Se connecter
                        </button>
                    </div>

                    <div class="text-center p-t-12">

                    </div>

                    <div class="text-center p-t-136">

                    </div>
                </form>

			</div>
		</div>
	</div>

	<div class="copy">
		@include('layout.login.partials.footer')
	</div>

    @include('layout.login.partials.scriptjs')

</body>
</html>
