@extends('layout.admin')
@section('title','Escritorio')
@section('content-page')
<div class="row tile_count">
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-address-book"></i></div>
          <div class="count">{{$totalMembers}}</div>
          <h3>Miembros</h3>
          <p>Total de miembros del Gymnasio.</p>
        </div>
    </div>
</div>
@endsection
