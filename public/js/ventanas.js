function limitarNumero(input, max) {
  if (parseFloat(input.value) > max) {
    input.value = max; // Si el número ingresado es mayor que el máximo permitido, establecerlo como el máximo.
  }
}

document.addEventListener('DOMContentLoaded', function() {
    const agregarCampos = document.getElementById('agregar-campos');
    const camposDimensiones = document.getElementById('campos-dimensiones');
    const form = document.getElementById('cotizacion-form'); // Obtener el formulario
  
    let totalRows = 2; // Variable para almacenar el total de filas
  
    agregarCampos.addEventListener('click', () => {
      const nuevaFila = document.createElement('tr'); // Create a table row (<tr>)
  
      nuevaFila.innerHTML = `
        <td>${totalRows}</td> 
        <td>
        <input type="number" step="0.01" class="form-control" id="alto_1" name="alto[]" oninput="limitarNumero(this, 10)">
        </td>
        <td>
        <input type="number" step="0.01" class="form-control" id="ancho_1" name="ancho[]" oninput="limitarNumero(this, 10)">
        </td>
        <td>
          <select type="number" step="0.01" class="form-control" name="hojas[]">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </td>
        <td>
          <select class="form-control" name="color[]" >
          <option value="Incoloro">Incoloro</option>
          <option value="Bronde Normal">Bronce Normal</option>
          <option value="Bronce Reflectivo">Bronce Reflectivo</option>
          <option value="Gris Normal">Gris Normal</option>
          <option value="Gris Reflectivo">Gris Reflectivo</option>
          </select>
        </td>
        <td>
          <input type="number" class="form-control" name="cantidad[]" >
        </td>
        <td>0</td> <td>0</td> <td>
          <button type="button" class="btn btn-danger eliminar-fila" style="width: 50px; height: 38px;">-</button>
        </td>
      `;
  
      camposDimensiones.appendChild(nuevaFila);
  
      // Actualizar la altura mínima de .content-wrapper después de agregar el contenido
      document.querySelector('.content-wrapper').style.minHeight = `${document.documentElement.scrollHeight}px`;
  
      // Agregar evento de escucha al botón de eliminación
      nuevaFila.querySelector('.eliminar-fila').addEventListener('click', function() {
        camposDimensiones.removeChild(nuevaFila);
        // Actualizar la altura mínima de .content-wrapper después de eliminar el contenido
        document.querySelector('.content-wrapper').style.minHeight = `${document.documentElement.scrollHeight}px`;
        // Actualizar el total de filas
        totalRows--;
      });
  
      // Incrementar el total de filas
      totalRows++;
    });
  
    form.addEventListener('submit', function(event) {
      // Agregar los valores de los campos de dimensiones al formulario
      const altosInputs = document.querySelectorAll('input[name="alto[]"]');
      const anchosInputs = document.querySelectorAll('input[name="ancho[]"]');
      const hojasInputs = document.querySelectorAll('select[name="hojas[]"]');
      const coloresInputs = document.querySelectorAll('select[name="color[]"]');
      const cantidadesInputs = document.querySelectorAll('input[name="cantidad[]"]');
  
      altosInputs.forEach((input, index) => {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = `alto[${index}]`;
        hiddenInput.value = input.value;
        form.appendChild(hiddenInput);
      });
  
      anchosInputs.forEach((input, index) => {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = `ancho[${index}]`;
        hiddenInput.value = input.value;
        form.appendChild(hiddenInput);
      });
  
      hojasInputs.forEach((input, index) => {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = `hojas[${index}]`;
        hiddenInput.value = input.value;
        form.appendChild(hiddenInput);
      });

  
      coloresInputs.forEach((input, index) => {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = `color[${index}]`;
        hiddenInput.value = input.value;
        form.appendChild(hiddenInput);
      });
  
      cantidadesInputs.forEach((input, index) => {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = `cantidad[${index}]`;
        hiddenInput.value = input.value;
        form.appendChild(hiddenInput);
      });
    });
  });
  












// Tabla de menu de precios
$(document).ready(function() {
    // Update Material Unit Cost
    $('#materiales-table td[contenteditable]').on('change', function() {
        var id = $(this).data('id');
        var costo_unitario = $(this).text();

        $.ajax({
            url: "{{ route('ventanas.update-material') }}",
            method: 'POST',
            data: {
                id: id,
                costo_unitario: costo_unitario,
            },
            success: function(response) {
                if (response.success) {
                    console.log('Costo unitario de material actualizado correctamente.');
                } else {
                    console.log('Error al actualizar costo unitario de material.');
                }
            },
            error: function(error) {
                console.log('Error al actualizar costo unitario de material.');
            }
        });
    });

    // Update Accessory Unit Cost
    $('#accesorios-table td[contenteditable]').on('change', function() {
        var id = $(this).data('id');
        var costo_unitario = $(this).text();

        $.ajax({
            url: "{{ route('ventanas.update-accesorio') }}",
            method: 'POST',
            data: {
                id: id,
                costo_unitario: costo_unitario,
            },
            success: function(response) {
                if (response.success) {
                    console.log('Costo unitario de accesorio actualizado correctamente.');
                } else {
                    console.log('Error al actualizar costo unitario de accesorio.');
                }
            },
            error: function(error) {
                console.log('Error al actualizar costo unitario de accesorio.');
            }
        });
    });

    // Update Mano de Obra Unit Cost (Manual Labor Cost)
    $('#mano-de-obra-table td[contenteditable]').on('change', function() {
        var id = $(this).data('id');
        var costo_unitario = $(this).text();

        $.ajax({
            url: "{{ route('ventanas.update-mano-de-obra') }}",
            method: 'POST',
            data: {
                id: id,
                costo_unitario: costo_unitario,
            },
            success: function(response) {
                if (response.success) {
                    console.log('Costo unitario de mano de obra actualizado correctamente.');
                } else {
                    console.log('Error al actualizar costo unitario de mano de obra.');
                }
            },
            error: function(error) {
                console.log('Error al actualizar costo unitario de mano de obra.');
            }
        });
    });
});

