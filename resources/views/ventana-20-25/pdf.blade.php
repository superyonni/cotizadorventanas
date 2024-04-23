<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construccion Teorica para Ventanas.</title>
 
</head>

<style>
    {{ file_get_contents(public_path('css/ventana.css')) }}
</style>

<body>
    <header>
        <h1>Construcción Teórica de Ventana Línea {{ $lineaVentana }} (CORREDIZA)</h1>
        @foreach ($detalles as $detalle)
            <div class="info-izquierda">
                <p>Proyecto: Ventana Corrediza Línea {{ $lineaVentana }}</p>
                <p>Alto (cm): {{ $detalle['altura'] }}</p>
                <p>Ancho (cm): {{ $detalle['ancho'] }}</p>
            </div>
    </header>


    <div class="info-derecha">

        <p>Cantidad de Hojas: {{ $detalle['hoja'] }}</p>
        <p>Vidrio: {{ $detalle['color'] }}</p>
        <p>Cant. Proyectante: {{ $detalle['cantidad'] }}</p>
    </div>

    <br><br><br><br>

    <h4></h4>

    <section id="estructura">
        <h2>PARA ESTRUCTURA</h2>
        <table>
            <thead>
                <tr>
                    <th>PISO NRO.</th>
                    <th>PERFILERIA</th>
                    <th>Longitud de Corte (cm)</th>
                    <th>Cantidad (Pza)</th>
                    <th>Perfil Alum.</th>
                    <th>Unidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Riel Superior</td>
                    <td>{{ $detalle['rielSuperior'] }}</td>
                    <td>1</td>
                    <td>{{ $detalle['rielSuperior'] }}</td>
                    <td>cm</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Riel Inferior</td>
                    <td>{{ $detalle['rielInferior'] }}</td>
                    <td>1</td>
                    <td>{{ $detalle['rielInferior'] }}</td>
                    <td>cm</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Jamba</td>
                    <td>{{ $detalle['jamba'] }}</td>
                    <td>2</td>
                    <td>{{ $detalle['jambaTotal'] }}</td>
                    <td>cm</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="hoja">
        <h2>PARA LA HOJA O PAÑO</h2>
        <table>
            <thead>
                <tr>
                    <th>PERFILERIA</th>
                    <th>Longitud de Corte (cm)</th>
                    <th>Cantidad (Pza)</th>
                    <th>Perfil Alum.</th>
                    <th>Unidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Parante</td>
                    <td>{{ $detalle['parante'] }}</td>
                    <td>{{ $detalle['hoja'] }}</td>
                    <td>{{ $detalle['paranteTotal'] }}</td>
                    <td>cm</td>
                </tr>
                <tr>
                    <td>Gancho</td>
                    <td>{{ $detalle['gancho'] }}</td>
                    <td>{{ $detalle['hoja'] }}</td>
                    <td>{{ $detalle['ganchoTotal'] }}</td>
                    <td>cm</td>
                </tr>
                <tr>
                    <td>Zocalo</td>
                    <td>{{ $detalle['zocalo'] }}</td>
                    <td>{{ $detalle['hoja'] * 2 }}</td>
                    <td>{{ $detalle['zocaloTotal'] }}</td>
                    <td>cm</td>
                </tr>
                <tr>
                    <td>Unión de Hoja</td>
                    <td>{{ $detalle['hojaunion'] }}</td>
                    <td>{{ $detalle['pza'] }}</td>
                    <td>{{ $detalle['hojaunion'] }}</td>
                    <td>cm</td>
                </tr>
                <tr>
                    <th colspan="3">TOTALES LINEALES</th>
                    <td>{{ $detalle['totalLineal'] }} </td>
                    <td>cm</td>
                </tr>
                <tr>
                    <th colspan="3">TOTAL CANTIDAD DE BARRAS</th>
                    <td>{{ $detalle['cantidadBarras'] }}</td>
                    <td>Barras</td>
                </tr>
            </tbody>
        </table>
    </section>



    <section id="vidrio">
        <h2>PARA EL VIDRIO</h2>
        <table>
            <thead>
                <tr>

                    <th>para el vidrio</th>
                    <th>alto (cm)</th>
                    <th>Ancho (cm)</th>
                    <th>Cantidad (Pza)</th>
                    <th>Área (m2)</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>Vidrio</td>
                    <td>{{ $detalle['altoVidrio'] }}</td>
                    <td>{{ $detalle['anchoVidrio'] }}</td>
                    <td>{{ $detalle['hoja'] }}</td>
                    <td>{{ $detalle['areaVidrio'] }}</td>
                </tr>
            </tbody>
        </table>

        <div class="info-izquierda">
            <H2>ACCESORIOS</H2>
            <Table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Accesosrios</th>
                        <th>Cantidad total</th>
                        <th>Unidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>solicona</td>
                        <td>{{ $detalle['silicona'] }}</td>
                        <td>cartucho</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>Burler</td>
                        <td>{{ $detalle['Burlet'] }}</td>
                        <td>cm</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>3</td>
                        <td>Felpa</td>
                        <td>{{ $detalle['Felpa'] }}</td>
                        <td>cm</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>4</td>
                        <td>Rodamientos</td>
                        <td>{{ $detalle['Rodamientos'] }}</td>
                        <td>pza</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>5</td>
                        <td>Pico de Loro</td>
                        <td>{{ $detalle['Picoloro'] }} </td>
                        <td>pza</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>6</td>
                        <td>Tornillos por Jamba</td>
                        <td>{{ $detalle['Tornillojamba']}}</td>
                        <td>pza</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>7</td>
                        <td>Tornillos 6x3/8 para hoja</td>
                        <td>{{ $detalle['Tornillohoja'] }}</td>
                        <td>pza</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>8</td>
                        <td>Tornillos para Fijar</td>
                        <td>{{ $detalle['Tornillofijar'] }}</td>
                        <td>pza</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>9</td>
                        <td>Tornillos para empotre</td>
                        <td>{{ $detalle['Tornilloempotre'] }}</td>
                        <td>pza</td>
                    </tr>
                </tbody>
            </Table>
        </div>

        <div class="info-derechaa">
            <H2>PERFILES</H2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Perfil</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Perfil Riel Superior</td>
                        <td>{{ $detalle['rielSuperior'] }}</td>
                        <td>cm</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Perfil Riel Inferior</td>
                        <td>{{ $detalle['rielInferior'] }}</td>
                        <td>cm</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Perfil Jamba</td>
                        <td>{{ $detalle['jambaTotal'] }}</td>
                        <td>cm</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Perfil Parante</td>
                        <td>{{ $detalle['paranteTotal'] }}</td>
                        <td>cm</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Perfil Gancho</td>
                        <td>{{ $detalle['ganchoTotal'] }}</td>
                        <td>cm</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Perfil Zocalo</td>
                        <td>{{ $detalle['zocaloTotal'] }}</td>
                        <td>cm</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Perfil Union de Hoja</td>
                        <td>{{ $detalle['hojaunion'] }}</td>
                        <td>cm</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Vidrio</td>
                        <td>{{ $detalle['altoVidrio'] }} x {{ $detalle['anchoVidrio'] }}</td>
                        <td>cm</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
    




   
    <h1>Presupuesto Ventana Corrediza Línea {{ $lineaVentana }} </h1>


    <table>
      <tr>
        <th colspan="5" class="text-center">1- MATERIALES</th>
        <th>CANTIDAD</th>
        <th>UND.</th>
        <th>Costo Unitario (Bs)</th>
        <th>Subtotal (Bs)</th>
        <th>Porcentaje %</th>
      </tr>
      <tr>
        <td>1</td>
        <td colspan="4">Perfil Riel Superior</td>

        <td>{{$detalle['Crielsuperior']}}</td>
        <td>ml</td>
        <td>{{ $precios['Perfil Riel Superior'] }}</td>
        <td>{{$detalle['subrielsuperior']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>2</td>
        <td colspan="4">Perfil Riel Inferior</td>

        <td>{{$detalle['Crielinferior']}}</td>
        <td>ml</td>
        <td>{{$precios['Perfil Riel Inferior']}}</td>
        <td>{{$detalle['subrielinferior']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>3</td>
        <td colspan="4">Perfil Jamba</td>
        <td>{{$detalle['Cjamba']}}</td>
        <td>ml</td>
        <td>{{$precios['Perfil Jamba']}}</td>
        <td>{{$detalle['subjamba']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>4</td>
        <td colspan="4">Perfil Parante</td>
        <td>{{$detalle['Cparante']}}</td>
        <td>ml</td>
        <td>{{$precios['Perfil Parante']}}</td>
        <td>{{$detalle['subparante']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>5</td>
        <td colspan="4">Perfil Gancho</td>
        <td>{{$detalle['Cgancho']}}</td>
        <td>ml</td>
        <td>{{$precios['Perfil Gancho']}}</td>
        <td>{{$detalle['subgancho']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>6</td>
        <td colspan="4">Perfil Zocalo</td>
        <td>{{$detalle['Czocalo']}}</td>
        <td>ml</td>
        <td>{{$precios['Perfil Zocalo']}}</td>
        <td>{{$detalle['subzocalo']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>7</td>
        <td colspan="4">Perfil Union de Hoja</td>
        <td>{{$detalle['Chojaunion']}}</td>
        <td>ml</td>
        <td>{{$precios['Perfil Union de Hoja']}}</td>
        <td>{{$detalle['subunion']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>8</td>
        <td colspan="4">Vidrio {{$detalle['color']}}</td>
        <td>{{$detalle['areaVidrio']}}</td>
        <td>m2</td>
        <td>{{ $detalle['precio_color'] }}</td>
        <td>{{$detalle['subvidrio']}}</td>
        <td></td>
      </tr>
      <tr>
        <th colspan="5">Accesorios</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <td>9</td>
        <td colspan="4">Silicona</td>
        <td>{{ $detalle['silicona'] }}</td>
        <td>Cartucho</td>
        <td>{{ $precios['Silicona'] }}</td>
        <td>{{ $detalle['subsilicona'] }}</td>  
        <td></td>
      </tr>
      <tr>
        <td>10</td>
        <td colspan="4">Burlet</td>
        <td>{{ $detalle['Burlet'] }}</td>
        <td>m</td>
        <td>{{ $precios['Burlet']}}</td>
        <td>{{$detalle['subburlet']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>11</td>
        <td colspan="4">Felpa</td>
        <td>{{$detalle['Felpa']}}</td>
        <td>m</td>
        <td>{{$precios['Felpa']}}</td>
        <td>{{$detalle['subfelpa']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>12</td>
        <td colspan="4">Rodamientos</td>
        <td>{{$detalle['Rodamientos']}}</td>
        <td>pza</td>
        <td>{{$precios['Rodamientos']}}</td>
        <td>{{$detalle['subrodamientos']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>13</td>
        <td colspan="4">Pico de Loro</td>
        <td>{{$detalle['Picoloro']}}</td>
        <td>pza</td>
        <td>{{$precios['Pico de Loro']}}</td>
        <td>{{$detalle['subpicoloro']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>14</td>
        <td colspan="4">Tornillos por Jamba</td>
        <td>{{$detalle['Tornillojamba']}}</td>
        <td>pza</td>
        <td>{{$precios['Tornillos por Jamba']}}</td>
        <td>{{$detalle['subtornillojamba']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>15</td>
        <td colspan="4">Tornillos 6x3/8 para hoja</td>
        <td>{{$detalle['Tornillohoja']}}</td>
        <td>pza</td>
        <td>{{$precios['Tornillos 6x3/8 para hoja']}}</td>
        <td>{{$detalle['subtornillohoja']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>16</td>
        <td colspan="4">Tornillos para fijar</td>
        <td>{{$detalle['Tornillofijar']}}</td>
        <td>pza</td>
        <td>{{$precios['Tornillos para fijar']}}</td>
        <td>{{$detalle['subtornillofijar']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>17</td>
        <td colspan="4">Tornillos para empotre</td>
        <td>{{$detalle['Tornilloempotre']}}</td>
        <td>pza</td>
        <td>{{$precios['Tornillos para empotre']}}</td>
        <td>{{$detalle['subtornilloempotre']}}</td>
        <td></td>
      </tr>
      <tr>
        <td>18</td>
        <td colspan="4">Ramplu</td>
        <td>{{$detalle['Tornilloempotre']}}</td>
        <td>pza</td>
        <td>{{$precios['Ramplu']}}</td>
        <td>{{$detalle['subramplu']}}</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="8" class="total">TOTAL MATERIALES</td>
        <td class="total">811.53</td>
        <td class="total">58.59%</td>
      </tr>
    </table>

    <table>
        <tr>
            <th>2.- MANO DE OBRA</th>
            <th>CANTIDAD</th>
            <th>UND.</th>
            <th>Precio Lineal (Bs/m2)</th>
            <th>Precio Subtotal (Bs)</th>
            <th>Porcentaje %</th>
        </tr>
        <tr>
            <td>M. Obra Armado y Estructurado de Perfiles</td>
            <td>50,00</td>
            <td>m2</td>
            <td>10,00</td>
            <td>500,00</td>
            <td></td>
        </tr>
        <tr>
            <td>M. Obra Armado Vidrio e Instalación</td>
            <td>50,00</td>
            <td>m2</td>
            <td>14,00</td>
            <td>700,00</td>
            <td></td>
        </tr>
        <tr>
            <td>SUBTOTAL MANO DE OBRA</td>
            <td colspan="3"></td>
            <td>1.200,00</td>
            <td></td>
        </tr>
        <tr>
            <td>HERRAMIENTAS - % DEL SUBTOTAL DE MANO DE OBRA</td>
            <td colspan="3">8,00%</td>
            <td>96,00</td>
            <td></td>
        </tr>
        <tr>
            <td>TOTAL MANO DE OBRA</td>
            <td colspan="3"></td>
            <td>1.296,00</td>
            <td>---------</td>
        </tr>
        <tr>
            <th>3.- GASTOS GENERALES</th>
            <th>CANTIDAD</th>
            <th>UND.</th>
            <th>Material + Mano de Obra</th>
            <th>Precio Subtotal (Bs)</th>
            <th></th>
        </tr>
        <tr>
            <td>GASTOS GENERALES - % DE 1+2+3</td>
            <td colspan="2"></td>
            <td>6.933,42</td>
            <td>346,67</td>
            <td></td>
        </tr>
        <tr>
            <td>TOTAL GASTOS GENERALES</td>
            <td colspan="3"></td>
            <td>346,67</td>
            <td></td>
        </tr>
        <tr>
            <th>4.- UTILIDAD</th>
            <th>CANTIDAD</th>
            <th>UND.</th>
            <th>Mat.+ M.Obra + Gastos Gnrl.</th>
            <th>Precio Subtotal (Bs)</th>
            <th>-------</th>
        </tr>
        <tr>
            <td>UTILIDAD - % DE 1+2+3 +4</td>
            <td colspan="2">44,00%</td>
            <td>7.280,09</td>
            <td>3.203,24</td>
            <td></td>
        </tr>
        <tr>
            <td>TOTAL UTILIDAD</td>
            <td colspan="3"></td>
            <td>3.203,24</td>
            <td></td>
        </tr>
        <tr>
            <th>5.- IMPUESTOS</th>
            <th>CANTIDAD</th>
            <th>UND.</th>
            <th>Mat.+ M.Obra + G.Gnrl.+Util.</th>
            <th>Precio Subtotal (Bs)</th>
            <th>-------</th>
        </tr>
        <tr>
            <td>IMPUESTO A LAS TRANSACCIONES - % DE 1+2+3+4+5</td>
            <td colspan="2">2,00%</td>
            <td>49,33</td>
            <td>219,67</td>
            <td></td>
        </tr>
        <tr>
            <td>TOTAL IMPUESTOS</td>
            <td colspan="3"></td>
            <td>14,67</td>
            <td></td>
        </tr>
        <tr>
            <th>PRECIO TOTAL (BS)</th>
            <td colspan="4">720,94</td>
            <td></td>
        </tr>
    </table>

    <h1>INFORME DE PORCENTAJE % DE COSTO DE VENTANA LINEA {{ $lineaVentana }}</h1>
    <table>
      <thead>
        <tr>
          <th>Nro</th>
          <th>Dimensiones de la Ventana</th>
          <th>Ancho (m)</th>
          <th>Cantidad</th>
          <th>Área de la Superficie (m2)</th>
          <th>Nro de Hojas</th>
          <th>Materia Prima (Bs)</th>
          <th>Mano de Obra (Bs)</th>
          <th>Gastos Generales (Bs)</th>
          <th>Utilidad (Bs)</th>
          <th>Impuestos (Bs)</th>
          <th>Costo Unitario (Bs)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>1,20 x 1,20</td>
          <td>1,00</td>
          <td>1</td>
          <td>1,44</td>
          <td>2,00</td>
          <td>501,51</td>
          <td>37,32</td>
          <td>26,94</td>
          <td>248,94</td>
          <td>16,29</td>
          <td>831,01</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
            <td colspan="4"></td>
          <td  colspan="2">PRECIO TOTAL (Bs)</td>
          <td>501,51</td>
          <td>37,32</td>
          <td>26,94</td>
          <td>248,94</td>
          <td>16,29</td>
          <td>831,01</td>
        </tr>
        {{-- <tr>
            <td colspan="4"></td>
          <td  colspan="2">PRECIO TOTAL ($us)</td>
          <td>72,06</td>
          <td>5,36</td>
          <td>3,87</td>
          <td>35,77</td>
          <td>2,34</td>
          <td>119,40</td>
        </tr> --}}
        <tr>
             <td colspan="4"></td>
          <td colspan="2">PORCENTAJES</td>
          <td>60,30%</td>
          <td>4,50%</td>
          <td>3,20%</td>
          <td>30,00%</td>
          <td>2,00%</td>
          <td>100%</td>
        </tr>
      </tfoot>
    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @endforeach


</body>
</html>