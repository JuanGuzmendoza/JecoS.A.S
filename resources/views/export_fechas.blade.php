<h4>Excel {{$año}}/{{$mes}}</h4>
<table>
    <thead>
        <tr style="background-color: #070781bb; color: #FFFFFF;">
            <th style="width: 100px; font-weight: bold; text-align: center;">CLIENTE</th>
            <th style="width: 100px; font-weight: bold; text-align: center;">ENTREGA</th>
            <th style="font-weight: bold; text-align: center;">OC</th>
            <th style="font-weight: bold; text-align: center;">CODIGO</th>
            <th style="width: 300px; font-weight: bold; text-align: center;">NOMBRE</th>
            <th style="font-weight: bold; text-align: center;">CANT</th>
            <th style="width: 80px; font-weight: bold; text-align: center;">COSTO UNIT</th>
            <th style="width: 80px; font-weight: bold; text-align: center;">COSTO TOTAL</th>
            <th style="font-weight: bold; text-align: center;">C.TELA</th>
            <th style="font-weight: bold; text-align: center;">COSTURA</th>
            <th style="font-weight: bold; text-align: center;">C.MAD</th>
            <th style="font-weight: bold; text-align: center;">ARM</th>
            <th style="font-weight: bold; text-align: center;">EMPARR</th>
            <th style="font-weight: bold; text-align: center;">C.ESP</th>
            <th style="font-weight: bold; text-align: center;">P.BLAN</th>
            <th style="font-weight: bold; text-align: center;">TAPIC</th>
            <th style="font-weight: bold; text-align: center;">ENSAM</th>
            <th style="font-weight: bold; text-align: center;">DESPA</th>
            <th style="font-weight: bold; text-align: center;">NIEVES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Fechas as $f)
            <tr>
                <td>{{ $f->cliente }}</td>
                <td>{{$f->entrega}}</td>
                <td>{{ $f->oc }}</td>
                <td>{{ $f->codigo }}</td>
                <td>{{ $f->nombre }}</td>
                <td>{{ $f->cant }}</td>
                <td>{{ $f->cost_unit }}</td>
                <td>{{ $f->cost_total }}</td>
                <td>{{ $f->c_tela }}</td>
                <td>{{ $f->cost }}</td>
                <td>{{ $f->c_mad }}</td>
                <td>{{ $f->arm }}</td>
                <td>{{ $f->emparr }}</td>
                <td>{{ $f->c_esp }}</td>
                <td>{{ $f->p_blan }}</td>
                <td>{{ $f->tapic }}</td>
                <td>{{ $f->ensam }}</td>
                <td>{{ $f->despa }}</td>
                <td>{{ $f->nieves }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
