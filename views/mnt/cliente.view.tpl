<h1>{{modedsc}}</h1>
<section>
    <form method="post" action="index.php?page=cliente&mode={{mode}}&clientid={{clientid}}">
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="clientid" value="{{clientid}}"/>
        <input type="hidden" name="xsstoken" value="{{xsstoken}}" />
        <div>
            <label for="clientname">Nombre del cliente</label>
            <input {{readonly}} type="text" name="clientname" id="clientname" value="{{clientname}}" placeholder="Nombre del cliente" />
        </div>

        <div>
            <label for="clientgender">Genero del cliente</label>
            <select name="clientgender" id="clientgender" {{readonly}}>
                <option value="MSC" {{clientgender_MSC}}>Masculino<option>
                <option value="FEM" {{clientgender_FEM}}>Femenino<option>
            </select>
        </div>

        <div>
            <label for="clientphone1">Telefono 1</label>
            <input {{readonly}} type="text" name="clientphone1" id="clientphone1" value="{{clientphone1}}" placeholder="Telefono principal" />
        </div>

        <div>
            <label for="clientphone2">Telefono 2</label>
            <input {{readonly}} type="text" name="clientphone2" id="clientphone2" value="{{clientphone2}}" placeholder="Telefono secundario" />
        </div>

        <div>
            <label for="clientemail">Correo Electronico</label>
            <input {{readonly}} type="text" name="clientemail" id="clientemail" value="{{clientemail}}" placeholder="Correo electronico" />
        </div>

        <div>
            <label for="clientidnumber">Numero de identidad</label>
            <input {{readonly}} type="text" name="clientidnumber" id="clientidnumber" value="{{clientidnumber}}" placeholder="Numero de identidad" />
        </div>

        <div>
            <label for="clientbio">Biografia Corta</label>
            <input {{readonly}} type="text" name="clientbio" id="clientbio" value="{{clientbio}}" placeholder="Biografia corta" />
        </div>

        <div>
            <label for="clientstatus">Estado</label>
            <select name="clientstatus" id="clientstatus" {{readonly}} >
                <option value="ACT" {{clientstatus_ACT}}>Activo</option>
                <option value="INA" {{clientstatus_INA}}>Inactivo</option>
            </select>    
        </div>

        {{if deletemsg}}
            <div class="alert">{{deletemsg}}</div>
        {{endif deletemsg}}

        <button id="btnsubmit" name="btnsubmit" type="submit">Enviar</button>
        <button id="btncancel">Cancelar</button>
    </form>
    
</section>
<script>
    $().ready(function(){
        $("#btncancel").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            location.assign("index.php?page=clientes");
        });
    });
</script>