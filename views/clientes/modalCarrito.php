<section id="modal-carro">
    <div id="carrito">
        <button type="button" class="button-container botonVerC" id="comprar-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <label for="" id="cantidadProductos">0</label>
            <img src="https://img.icons8.com/?size=100&id=QYui14mmaQ0R&format=png&color=000000" alt="shopaholic">
        </button>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Carro de compras</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="empty-cart-message" style="display: none;">Aún no hay productos en el carrito :D</div>
                <div class="product-list">
                    <!-- Agrega más cartas de productos aquí -->
                </div>
            </div>
            <div class="modal-footer">
                <div id="cart-total" style="font-weight: bold;">Total: $0</div>
                <a href="wizard.php"><button type="button" class="checkout" id="checkout-btn" onclick="guardarCarrito()">Continuar al Checkout</button></a>
            </div>
        </div>
    </div>
</div>

</section>
