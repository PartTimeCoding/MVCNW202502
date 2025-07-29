<section>
    <h2>Catálogo</h2>
    <p>{{mensaje}}</p>

    <form action="index.php" method="get">
        <label for="categoria">Filtrar por categoría:</label>
        <select name="categoria" id="categoria" onchange="this.form.submit()">
            <option value="" {{selected_null}}>-- Todas las categorías --</option>
            {{foreach categorias}}
                <option value="{{id}}" {{selected}}>{{nombre}}</option>
            {{endfor categorias}}
        </select>
        <input type="hidden" name="page" value="Libreria_Catalogo">
    </form>

    <hr>
   <!-- Tarjetas de libros -->
    <div style="display: flex; flex-wrap: wrap; gap: 60px; margin-left: 40px;">
        {{foreach libreria}}
        <div style="border: 1px solid #ddd; border-radius: 8px; width: 300px; box-shadow: 2px 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
            <img src="https://picsum.photos/300/180?random={{id}}" alt="Imagen del libro" style="width: 100%; height: auto;">
            <div style="padding: 15px;">
                <h3 style="margin: 0 0 10px 0;">{{nombreLibro}}</h3>
                <p><strong>Precio:</strong> ${{precio}}</p>
                <p><strong>Stock:</strong> {{stock}}</p>
                <p><strong>Autor:</strong> {{autor}}</p>
                <p><strong>Categoría:</strong> {{categoria}}</p>
                <p><strong>Año:</strong> {{anioPublicacion}}</p>
                <p><strong>Editorial:</strong> {{editorial}}</p>
                <p style="font-size: 0.9em; color: #555;"><em>{{descripcion}}</em></p>
            </div>
        </div>
        {{endfor libreria}}
    </div>
</section>
    {{if libreria}}
    {{else}}
        <p>No se encontraron libros.</p>
    {{endif}}
</section>
