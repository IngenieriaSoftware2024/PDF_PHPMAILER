<div class="container my-5">
  <div class="card shadow-lg">
    <div class="card-header text-center py-3 bg-black text-white">
      <h1 class="display-5">¡Bienvenido a MUNDO DIGITAL S.A.!</h1>
      <p class="lead">Nos alegra que te unas a nuestra comunidad</p>
    </div>
    <div class="card-body p-4 text-center">
      <h3 class="mb-4">Esta sección está diseñada para el envío de correos electrónicos. ¡INGRESA TUS DATOS!</h3>
      <div class="d-flex justify-content-center">
        <div class="col-lg-6">
          <form id="formularioContacto" class="border border-4 shadow p-4" method="get" action="/PDF_PHPMAILER/enviarformulario" >
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre Completo</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <label for="mensaje" class="form-label">Mensaje</label>
              <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="build/js/inicio.js"></script>