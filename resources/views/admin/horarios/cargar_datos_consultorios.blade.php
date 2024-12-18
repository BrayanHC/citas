<table style="font-size: 15px; text-align: center" class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr style="text-align: center">
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
            <th>Domingo</th>
        </tr>
    </thead>
    <tbody>
        @php
            $horas = ['06:00 - 07:00','07:00 - 08:00','08:00 - 09:00','09:00 - 10:00','10:00 - 11:00','11:00 - 12:00','12:00 - 13:00','13:00 - 14:00','14:00 - 15:00','15:00 - 16:00','16:00 - 17:00','17:00 - 18:00','18:00 - 19:00','19:00 - 20:00','20:00 - 21:00'];
            $diasSemana = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO',];
        @endphp
        @foreach ($horas as $hora)
            @php
                list($hora_inicio, $hora_fin) = explode(' - ', $hora);
            @endphp
            <tr>
                <td>{{$hora}}</td>
                @foreach ($diasSemana as $dia)
                    @php
                        $nombre_doctor = '';
                        foreach ($horarios as $horario) {
                            if (strtoupper($horario->dia) == $dia && $hora_inicio >= $horario->hora_inicio && $hora_fin <= $horario->hora_fin) {
                                $nombre_doctor = $horario->doctor->nombres." ".$horario->doctor->apellidos;
                                break;
                            }
                        }
                    @endphp
                    <td>{{$nombre_doctor}}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>