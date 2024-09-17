<header>
        <h1>Reporte de Datos del Formulario</h1>
    </header>
    <main>
        <section>
            <h2>Datos del Formulario</h2>
            <div>
                <h3>Nombre Completo</h3>
                <p><?php echo htmlspecialchars($nombre); ?></p>
            </div>
            <div>
                <h3>Mensaje</h3>
                <p><?php echo nl2br(htmlspecialchars($mensaje)); ?></p>
            </div>
        </section>

        <iframe src="data:application/pdf;base64,<?php echo htmlspecialchars($pdfContent); ?>" width="100%" height="600px"></iframe>


        <div style="text-align:center; margin-top:20px;">
            <a href="#" id="showEmailForm">Enviar este PDF por correo electrónico</a>
        </div>

        <div id="emailForm" style="display:none; text-align:center; margin-top:20px;">
            <form method="POST" action="/PDF_PHPMAILER/email">
                <input type="hidden" name="pdf" value="<?php echo htmlspecialchars($pdfContent); ?>">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
                <button type="submit">Enviar por correo</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> MUNDO DIGITAL S.A. Todos los derechos reservados.</p>
    </footer>

    <script>
        document.getElementById('showEmailForm').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('emailForm').style.display = 'block';
            this.style.display = 'none';
        });
    </script>