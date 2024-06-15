<div class="main-container">
    <main class="compra">
        <div class="container-comprobante">
            <h1 class="titulo-comprobante">Detalles de la Compra</h1>
            <p class="p-comprobante"><strong class="s-comprobante">Nombre del comprador:</strong> <?= $usuario['nombre'] ?></p>
            <p class="p-comprobante"><strong class="s-comprobante">Fecha de la compra:</strong> <?= $venta['fecha'] ?></p>
            <p class="p-comprobante"><strong class="s-comprobante">Total de la compra:</strong> $<?= number_format($venta['total_venta'], 2) ?></p>
            <p class="p-comprobante"><strong class="s-comprobante">Tipo de pago:</strong> <?= $venta['tipoPago_id'] == 1 ? 'Efectivo' : ($venta['tipoPago_id'] == 2 ? 'Tarjeta de Crédito' : 'Tarjeta de Débito') ?></p>

            <h2 class="titulo-comprobante">Productos Comprados</h2>
            <table class="tabla-comprobante">
                <thead class="thead-comprobante">
                    <tr class="tr-comprobante">
                        <th class="th-comprobante">Nombre del Producto</th>
                        <th class="th-comprobante">Cantidad</th>
                        <th class="th-comprobante">Precio Unitario</th>
                        <th class="th-comprobante">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr class="tr-comprobante">
                            <td class="td-comprobante"><?= $producto['nombre'] ?></td>
                            <td class="td-comprobante"><?= $producto['cantidad'] ?></td>
                            <td class="td-comprobante">$<?= number_format($producto['precio'], 2) ?></td>
                            <td class="td-comprobante">$<?= number_format($producto['cantidad'] * $producto['precio'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" class="comprobante"id="generarPDFButton" onclick="generarPDF()">Descargar Comprobante</button>
        </div>
    </main>
</div>
<!-- Incluye jsPDF y html2canvas en tu vista -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    // Función para generar y descargar el PDF al hacer clic en el botón
    function generarPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const element = document.querySelector('.container-comprobante');
        const button = document.getElementById('generarPDFButton');

        // Ocultar el botón
        button.style.display = 'none';

        html2canvas(element).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF('p', 'mm', 'a4');
            const imgProps = pdf.getImageProperties(imgData);
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            pdf.save('comprobante.pdf');

            // Mostrar el botón nuevamente
            button.style.display = 'block';
        });
    }
</script>