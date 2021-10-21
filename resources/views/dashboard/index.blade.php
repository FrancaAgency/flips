@extends('layouts.plantilla')
@section('content')
<table class="table-auto border-separate border border-green-800">
    <thead>
        <tr>
            <td class="border border-green-600">
                doc
            </td>
            <td>
                Nombre
            </td>
            <td>
                Fecha de creacion
            </td>
            <td>
                Fecha de actualizacion
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $i)
            <tr class="bg-emerald-200">
                <td>
                    {{ $i->doc }}
                </td>
                <td>
                    {{ $i->nombres }}
                </td>
                <td>
                    {{ $i->created_at->format('d-M-Y') }}
                </td>
                <td>
                    {{ $i->updated_at->format('d-M-Y') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
