<h1>{{modedsc}}</h1>
<section>
    <form method="POST" action="index.php?page=categoria&mode={{mode}}&catecod={{catecod}}">
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="catecod" value="{{catecod}}"/>
        <input type="hidden" name="xsstoken" value="{{xsstoken}}"/>
        <div>
            <label for="catenom">Nombre de Categoria</label>
            <input {{readonly}} type="text" name="catenom" id="catenom" value="{{catenom}}" placeholder="Nombre de categoria">
        </div>

        <div>
            <label for="cateest">Estado de la categoria</label>
            <select name="cateest" id="cateest" {{readonly}} {{disabled}}>
                <option value="ACT" {{cateest_ACT}}>Activo</option>
                <option value="INA" {{cateest_INA}}>Inactvo</option>
            </select>
        </div>

        <button {{hidden}} id="btnsubmit" name="btnsubmit" type="submit">Enviar</button>
        <button id="btncancel">Cancelar</button>
    </form>
</section>
<script>
    $().ready(function(){
        $("#btncancel").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            location.assign("index.php?page=categorias");
        });
    });
</script>