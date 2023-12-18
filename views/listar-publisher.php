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
        <form action="">
          <div class="mb-3">
            <label for="publisher" class="form-lable">PUBLISHER :</label>
            <select name="publisher" id="publisher_id" class="form-control form-select shadow" required>
              <option value="">SELECIONAR</option>
            </select>
          </div>

          <div class="form-control mb-3 table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>FULL NAME</th>
                  <th>NOMBRES</th>
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

      function Publisher() {
        const publisher_id = $("#publisher_id").value
        // const tabla = $("tabla");

        if (publisher_id != "") {

          const parametros = new FormData();
          parametros.append("operacion", "listar");
          parametros.append("publisher_id", publisher_id)


          fetch(`../controllers/publihser.controller.php`, {
              method: "POST",
              body: parametros

            })
            .then(respuesta => respuesta.json())
            .then(datos => {
              console.log(datos);

              console.log(datos);

              const tabla = $("#tabla")

              datos.forEach(datos => {

                const tagOption = document.createElement("option")
                tagOption.value = datos.publisher_id
                tagOption.textContent = datos.publisher
                $("#publisher_id").appendChild(tagOption)

                const row = document.createElement("tr");
                row.innerHTML = `
                            <td>${datos.superhero_name}</td>
                            <td>${datos.full_name}</td>
                            <td>${datos.gender}</td>
                            <td>${datos.race}</td>
                        `
                tabla.appendChild(row);
              });

            })
            .catch(e => {
              console.error(e)
            })
        }
      };

    })
  </script>
</body>

</html>