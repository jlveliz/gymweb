<!-- Modal -->
<div class="modal fade" id="create-book-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Cartilla</h4>
      </div>
      <form action="{{ route('books.store') }}" method="POST">
        <input type="hidden" name="client_id" value="">
        <div class="modal-body">
          <div class="x_content">
            <div class="row">
              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12">Periodo desde </label>
                <div class="col-md-8 col-sm-8 col-xs-12 if @if($errors->has('period_from')) has-error @endif">
                  <input type="text" class="form-control" placeholder="Periodo desde" name="period_from" id="period_from" value="{{ old('period_from') }}" autofocus>
                   @if ($errors->has('period_from')) <p class="help-block">{{ $errors->first('period_from') }}</p> @endif
                </div>
              </div>
              <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label class="control-label col-md-4 col-sm-4 col-xs-12">Periodo hasta </label>
                <div class="col-md-8 col-sm-8 col-xs-12 if @if($errors->has('period_to')) has-error @endif">
                  <input type="text" class="form-control" placeholder="Periodo hasta" name="period_to" id="period_to" value="{{ old('period_to') }}">
                   @if ($errors->has('period_to')) <p class="help-block">{{ $errors->first('period_to') }}</p> @endif
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>