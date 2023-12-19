<!doctype html>
<html lang="es">

<head>
  <title>Tabla Publisher</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <div class="container-fluid" style="max-width:100rem;">
    <div class="card mt-2">
      <div class="card-header bg-secondary text-light">BUSCAR EMPLEADOS</div>
      <div class="card-body">
        <form action="" id="listar-publisher">
          <div class="mb-3">
            <label for="_publisher_id" class="form-label">PUBLISHER :</label>
            <select name="" id="_publisher_id" class="form-control form-select shadow" required>
              <option value="">SELECIONAR</option>
            </select>
          </div>

          <div class="form-control mb-3 table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>FULL NAME</th>
                  <th>GENDER</th>
                  <th>RACE</th>
                </tr>
              </thead>
              <tbody class="table-striped" id="tabla">


              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      function $(id) {
        return document.querySelector(id)
      }
      // Para la etiqueta select
      (function() {

        fetch(`../controllers/publisher.controller.php?operacion=listar`)
          .then(respuesta => respuesta.json())
          .then(datos => {

            datos.forEach(datos => {
              const tagOption = document.createElement("option")
              tagOption.value = datos.id
              tagOption.textContent = datos.publisher_name
              $("#_publisher_id").appendChild(tagOption)
            });
          })
          .catch(e => {
            console.error(e)
          })
      })();

      // Crear tabla usando una funcion autoejecutable
      (function() {
        const publisherId = $('#_publisher_id')
        publisherId.addEventListener('change', function() {
          const id = publisherId.value
          fetch(`../controllers/publisher.controller.php?operacion=search&_publisher_id=${id}`)
            .then(respuesta => respuesta.json())
            .then(datos => {
              
              // console.log(datos)
              const tabla = $("#tabla");
              tabla.textContent="";

              datos.forEach(datos => {
                const row = document.createElement("tr");
                row.innerHTML = `
                <td>${datos.id}</td>
                <td>${datos.superhero_name}</td>
                <td>${datos.full_name}</td>
                <td>${datos.gender}</td>
                <td>${datos.race}</td>
                  `;
                tabla.appendChild(row);
              });              
            })
            .catch(e => {
              console.error("Error en la consulta!", e)
            })
        });
      })();
    })
  </script>
</body>

</html>