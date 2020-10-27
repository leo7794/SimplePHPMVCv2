<h1>Ficha de desarollo</h1>
<section>
    <h2>{{cuenta}}{{nombre}}</h2>
    <em>Correo: {{correo}}</em>
</section>

<section>
    <h2>Proyectos</h2>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        {{foreach titulos}}
        <tbody>
            <tr>
                <td>{{No}}</td>
                <td>{{descripcion}}</td>
            </tr>    
        {{endfor titulos}}    
        </tbody>
    </table>
</section>