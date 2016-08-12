@extends('layout.auth')
@section('content')
 <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form method="post" action="{{ url('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h1>GymTai</h1>
            @if (count($errors) > 0)
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    @foreach ($errors->all() as $error)
                      <strong style="color: #fff">{!!$error!!}</strong> <br>
                    @endforeach
                  </div>
            @endif
              <div>
              <input type="text" class="form-control" placeholder="Usuario" name="username" id="username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Clave" name="password" id="password" required="" />
            </div>
            <div>
              <button type="submit" class="btn btn-default">Ingresar</button>
              <label for="remember">
              <input type="checkbox" name="remember" id="remember" value="true"> Recordarme
              </label>
              {{-- <a class="reset_pass" href="#">Perdió su clave?</a> --}}
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-cog" style="font-size: 26px;"></i> GymWeb!</h1>

                <p>©{{date('Y')}} Todos los derechos reservados. Una aplicación de <b>Novasystems.</b></p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

@endsection