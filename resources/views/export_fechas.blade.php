<h4>Excel {{$año}}/{{$mes}}</h4>
<table>
    <thead>
        <tr style="background-color: #0000FF; color: #FFFFFF;">
            <th>CLIENTE</th>
            <th>FECHA DE ENTREGA</th>
            <th>OC</th>
            <th>CODIGO</th>
            <th>NOMBRE</th>
            <th>CANT</th>
            <th>COSTO UNIT</th>
            <th>COSTO TOTAL</th>
            <th>C.TELA</th>
            <th>COSTURA</th>
            <th>C.MAD</th>
            <th>ARM</th>
            <th>EMPARR</th>
            <th>C.ESP</th>
            <th>P.BLAN</th>
            <th>TAPIC</th>
            <th>ENSAM</th>
            <th>DESPA</th>
            <th>NIEVES</th>
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
