<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @php
        use Carbon\Carbon;
        $fecha = Carbon::now();
    @endphp
    <div class="container-fluid">
        <div class="d-flex justify-content-start">
            <img class="imagen" src="../public/images/check_logo.png" alt="" width="150" height="auto">
        </div>
        <div class="d-flex justify-content-end">
            <p  class="fecha text-end" 
                style=" text-align:right;
                        font-weight: bold;
                        margin-bottom: 15px;
                        font-size: 1rem;">Fecha: {{ $fecha }}</p>
        </div>

        {{-- Titulo --}}
        <h1 class="tituto" 
            style=" margin-bottom: 15px;
                    margin-top: 35px;">
        Tabla ordenes de trabajo</h1>

        {{-- Total-registradas --}}
        <p  class="fecha text-end" 
                style=" text-align:left;
                        
                        font-size: 1rem;">
        Registradas: {{ $count_r }}<br>Ejecución: {{ $count_e }}<br>Finalizadas: {{ $count_f }}</p>

        {{-- Tabla de usuarios --}}
        <div class="table text-center">
            <table class="table table-bordered" width="10%" align="center">
                <tr>
                    <th class="table-primary">ID</th>
                    <th class="table-primary">Nro. de orden</th>
                </tr>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->otUid }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        
        {{-- <table class="table table-bordered" width="10%" align="center">
            <tr>
                <th class="table-primary">ID</th>
                <th class="table-primary">Nombre</th>
                <th class="table-primary">Email</th>
                <th class="table-primary">Cargo</th>
                <th class="table-primary">Agencia</th>
                <th class="table-primary">Estado</th>
            </tr>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre }} {{ $item->apellido }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->cargo }}</td>
                <td>{{ $item->agencia }}</td>
                <td>{{ $item->estado }}</td>
            </tr>
            @endforeach
        </table> --}}
        <!-- Content here -->
      </div>

      <div width="100%" align="center">
        
        https://www.checkmas.com/
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
</body>
</html>
