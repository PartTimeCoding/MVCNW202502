<div class="product-list">
  {{foreach libros}}
  <div class="product" data-libroId="{{libroId}}">
    <img src="{{libroImgUrl}}" alt="{{libroNombre}}">
    <h2>{{libroNombre}}</h2>
    <p>{{libroDescripcion}}</p>
    <span class="price">{{libroPrecio}}</span>
    <span class="stock">Disponible {{libroStock}}</span>
    <form action="index.php?page=index" method="post">
        <input type="hidden" name="libroId" value="{{libroId}}">
        <button type="submit" name="addToCart" class="add-to-cart">
          <i class="fa-solid fa-cart-plus"></i>Agregar al Carrito
        </button>
    </form>
  </div>
  {{endfor libros}}
</div>