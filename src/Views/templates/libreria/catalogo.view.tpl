<section>
    <h2>NegociosWeb</h2>
    <p>{{mensaje}}</p>

    <!-- Combo box para filtrar por categoría -->
    <form action="index.php" method="get" style="margin-bottom: 20px; margin-left: 40px;">
        <label for="categoria">Filtrar por categoría:</label>
        <select name="categoria" id="categoria" onchange="this.form.submit()">
        <option value=""href="index.php?page=Libreria_Catalogo&categoria=1">-- Todas las categorías --</option>
       <option value="1" {{selected_1}}>Fantasía</option>
        <option value="2" {{selected_2}}>Horror</option>
        <option value="3" {{selected_3}}>Comedia</option>


        </select>
    </form>


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
