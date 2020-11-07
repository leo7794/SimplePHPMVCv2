<section><h1>Mantenemiento de categorias</h1></section>
<hr/>
<form action="index.php?page=categorias" method="POST">
    <section class="row">
        <h2>Filtrar por</h2>
        <div class="col-sm-12 col-md-10">
            <label class="col-sm-12 col-md-2" for="cln_txtfilter">Codigo | Nombre</label>
            <input class="col-sm-12 col-md-10" type="text" name="cln_txtfilter" id="cln_txtfilter" value="{{cln_txtfilter}}" placeholder="Codigo | Nombre">
        </div>
        <div class="col-sm-12 col-md-2">
            <button type="submit" name="btnFiltrar">Actualizar</button>
        </div>
    </section>
</form>
<hr/>
<section class="row">
    <table class="col-sm-12">
        <thead class="zebra">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>
                    <a class="btn depth-1 s-margin" href="index.php?page=categoria&mode=INS&catecod{{catecod}}"><span class="ion-plus-circled"></span></a>
                </th>
            </tr>
        </thead>
        {{foreach categorias}}
        <tbody>
                <td class="center">{{catecod}}</td>
                <td class="center">{{catenom}}</td>
                <td class="center">{{cateest}}</td>
                <td class="center">
                    <a class="btn depth-1 s-margin" href="index.php?page=categoria&mode=UPD&catecod={{catecod}}"><span class="ion-edit"></span></a>&nbsp;
                    <a class="btn depth-1 s-margin" href="index.php?page=categoria&mode=DSP&catecod={{catecod}}"><span class="ion-eye"></span></a>&nbsp;
                </td>
        {{endfor categorias}}        
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</section>