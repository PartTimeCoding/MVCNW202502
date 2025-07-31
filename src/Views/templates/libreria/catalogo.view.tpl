<section>
    <div style="display: flex; justify-content: space-between; align-items: center; margin: 20px;">
        <h2>Catálogo</h2>
        <div style="position: relative;">
            <a href="index.php?page=Carrito" style="text-decoration: none; color: black;">
                🛒
                <span style="position: absolute; top: -10px; right: -10px; background-color: red; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px;">
                    {{carrito_count}}
                </span>
            </a>
        </div>
    </div>

    <p>{{mensaje}}</p>

    <form action="index.php" method="get" style="margin-left: 40px; margin-bottom: 20px;">
        <label for="genero">Filtrar por género:</label>
        <select name="genero" id="genero" onchange="this.form.submit()">
            <option value="" {{selected_genero_null}}>-- Todos los géneros --</option>
            {{foreach generos}}
                <option value="{{id}}" {{selected}}>{{nombre}}</option>
            {{endfor generos}}
        </select>
        <input type="hidden" name="page" value="Libreria_Catalogo">
    </form>

    <div style="display: flex; flex-wrap: wrap; gap: 60px; margin-left: 40px;">
        {{foreach libreria}}
        <div style="border: 1px solid #ddd; border-radius: 8px; width: 300px; box-shadow: 2px 2px 8px rgba(0,0,0,0.1); overflow: hidden; background-color: #fff;">
            <img src="https://picsum.photos/300/180?random={{id}}" alt="Imagen del libro" style="width: 100%; height: auto;">
            <div style="padding: 15px;">
                <h3>{{nombreLibro}}</h3>
                <p><strong>Precio:</strong> {{precio}}</p>
                <p><strong>Stock:</strong> {{stock}}</p>
                <p><strong>Autor:</strong> {{autor}}</p>
                <p><strong>Género:</strong> {{genero}}</p>
                <p><strong>Año:</strong> {{anioPublicacion}}</p>
                <p><strong>Editorial:</strong> {{editorial}}</p>
                <p style="font-size: 0.9em; color: #555;"><em>{{descripcion}}</em></p>
                <form action="index.php" method="post">
                    <input type="hidden" name="page" value="Carrito">
                    <input type="hidden" name="action" value="agregar">
                    <input type="hidden" name="id" value="{{id}}">
                    <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer;">AGREGAR AL CARRITO</button>
                </form>
            </div>
        </div>
        {{endfor libreria}}
    </div>
</section>
