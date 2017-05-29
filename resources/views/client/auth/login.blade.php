@extends('layout.auth')
@section('title','Ingreso')
@section('content')
<div id="wrapper">
      <div id="login" class="animated form bounceIn">
        <section class="login_content">
          <form method="post" action="{{ route('client.auth.login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h1>GymTai | Ingreso</h1>
            @if (count($errors) > 0)
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    @foreach ($errors->all() as $error)
                      <strong>{!!$error!!}</strong> <br>
                    @endforeach
                  </div>
            @endif
              <div>
              <input type="text" class="form-control" placeholder="Email" name="email" id="email" required="" autocomplete="false" autofocus />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Clave" name="password" id="password" required="" />
            </div>
            <div>
              <label for="remember" class="pull-left">
              <input type="checkbox" name="remember" id="remember" value="true"> Recordarme
              </label>
              <button type="submit" class="btn btn-block btn-submit">Ingresar</button>
              {{-- <a class="reset_pass" href="#">Perdió su clave?</a> --}}
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <div class="clearfix"></div>
              <br />
              <div class="footer-login">
                <h4><i class="fa fa-cog"></i> GymWeb!</h4>

                <p class="copyright">©{{date('Y')}} Todos los derechos reservados. Una aplicación de <b>Novasystems.</b></p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
</div>
@endsection
