<section>
    <h2 style="margin-left: 40px; font-size: 2rem; color: #333;">Catálogo</h2>
    <p style="margin-left: 40px;">{{mensaje}}</p>

    <!-- Filtro por género -->
    <form action="index.php" method="get" style="margin: 20px 40px;">
        <label for="genero" style="font-weight: bold;">Filtrar por género:</label>
        <select name="categoria" id="genero" onchange="this.form.submit()" 
                style="padding: 8px 12px; border-radius: 5px; border: 1px solid #ccc;">
            <option value="" {{selected_null}}>-- Todos los géneros --</option>
            {{foreach categorias}}
                <option value="{{id}}" {{selected}}>{{nombre}}</option>
            {{endfor categorias}}
        </select>
        <input type="hidden" name="page" value="Libreria_Catalogo">
    </form>

    <hr style="margin: 20px 40px; border: none; border-top: 1px solid #ccc;">

    <!-- Tarjetas de libros -->
    <div style="display: flex; flex-wrap: wrap; gap: 30px; margin-left: 40px; margin-right: 40px;">
        {{foreach libreria}}
        <div style="
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.2s;
        "
        onmouseover="this.style.transform='scale(1.03)'"
        onmouseout="this.style.transform='scale(1)'">
<img src="https://picsum.photos/300/180?random={{id}}" alt="Imagen del libro"
 style="width: 100%; height: auto;">
            <div style="padding: 15px; text-align: left;">
                <h3 style="margin: 0 0 10px 0; font-size: 1.2rem; color: #333;">{{nombreLibro}}</h3>
                <p><strong>Precio:</strong> {{precio}}</p>
                <p><strong>Stock:</strong> {{stock}}</p>
                <p><strong>Autor:</strong> {{autor}}</p>
                <p><strong>Género:</strong> {{nombreGenero}}</p>
                <p><strong>Año:</strong> {{anioPublicacion}}</p>
                <p><strong>Editorial:</strong> {{editorial}}</p>
                <p style="font-size: 0.9em; color: #555;"><em>{{descripcion}}</em></p>
                <button style="
                    margin-top: 10px;
                    padding: 10px;
                    background: #4CAF50;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    width: 100%;
                    font-size: 1rem;
                " onmouseover="this.style.background='#45a049'"
                  onmouseout="this.style.background='#4CAF50'">
                    AGREGAR AL CARRITO
                </button>
            </div>
        </div>
        {{endfor libreria}}
    </div>

    {{if libreria}}
    {{else}}
        <p style="margin-left: 40px;">No se encontraron libros.</p>
    {{endif}}
</section>
