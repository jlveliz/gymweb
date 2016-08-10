@extends('layout.auth')
@section('content')
 <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <form>
            <h1>GymTai</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Ingresar</a>
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