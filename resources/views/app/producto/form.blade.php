<form id="frmproductos" name="frmproductos" class="form-horizontal" novalidate="" accept-charset="UTF-8" enctype="multipart/form-data">
  <div class="row">

    <div class="col-xs-12">

      <div class="form-group">
       <div class="col-sm-9">
        <input type="text" class="form-control  input-sm" id="producto" name="producto" placeholder="Producto" value="">
       </div>
      </div>

      <div class="form-group">
       <div class="col-sm-9">
        <input type="text" class="form-control  input-sm" id="codigobarra" name="codigobarra" placeholder="Código de barra" value="">
       </div>
      </div>

      <div class="form-group">
       <div class="col-sm-9">
        <input type="text" class="form-control  input-sm" id="codigoproducto" name="codigoproducto" placeholder="Código de producto" value="">
       </div>
      </div>

      <div class="form-group">
       <div class="col-sm-9">
        <input type="text" class="form-control  input-sm" id="descripcion" name="descripcion" placeholder="Descripción" value="">
       </div>
      </div>

      <div class="form-group">
       <div class="col-sm-9">
        <input type="text" class="form-control  input-sm" id="estado" name="estado" placeholder="Estado" value="">
       </div>
      </div>

      <div class="form-group">
        <label for="inputModel" class="col-xs-3 control-label" >Fabricante</label>
              <div>
                <div class="col-xs-6">
                  <select  name="fabrica_id" id="fabrica_id" data-placeholder="Fabrica" class="form-control"  tabindex="2">
                      <!-- <option value=""> Bloqueado? </option> -->
                      @foreach($fabricas as $f )

                        <option name="fabrica_id" value="{{ $f->id }}"> {{ $f->fabricante }} </option>

                      @endforeach
                  </select>
                    </div>
              </div>
      </div>

    </div>

  </div>
</form>
