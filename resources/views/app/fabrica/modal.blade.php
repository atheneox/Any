<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="color-line"></div>
            <div class="modal-header text-center">
                <h4 class="modal-title">
                  Fabricantes
                 </h4>
                <small class="font-bold"> Fabricantes </small>
            </div>
            <div class="modal-body">

              @include('app.fabrica.form')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm"    id="btn-save" value="add"> <i class="fa fa-paste"></i> Guardar </button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"> <i class="fa fa-close"></i> Cerrar</button>
                <input type="hidden" id="id" name="id" value="0">
            </div>
        </div>
    </div>
</div>

<meta name="_token" content="{!! csrf_token() !!}" />
