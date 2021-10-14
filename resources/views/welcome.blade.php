@extends('layouts.plantilla')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Relleno Dorado 2.0')

@section('content')
    <button onclick="registrar()"
        class="p-2 pl-5 pr-5 bg-purple-900 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">registrar
        usuario</button>

    <div class="col-span-6 alert-interaccion hidden">
        <div class="bg-blue-100 text-blue-500 border-blue-300 border-t-4 p-4 rounded-md shadow">
            <div class="relative flex flex-row">
                <p class="title font-bold">Para continuar</p>
                <span class="hidden loader-sent inline-flex justify-center items-center ml-4">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-orange-500 opacity-7" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </span>
            </div>
            <p class="descripcion italic font-medium"><span class="not-italic font-normal">Por favor seleccione la
                    interacción adecuada que sostiene con
                </span></p>
        </div>
    </div>
    {{ csrf_field() }}
@endsection


@section('js')
    <script>
        function registrar() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('registro.store') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    _token: $('input[name="_token"]').val(),
                    documento: "4545454545",
                    nombres: "jjajakdiudnn",
                    apellidos: "calderonF gonzalez",
                    telefono: "3023916856",
                    correo: "uu.calderon@franca.agency",
                    cuidad: "Bogota",
                    direccion: "cra 9 este # 26 f 21",
                    password: "1q2w3e4r5t66",
                },
                beforeSend: function() {
                    $(".alert-interaccion div").removeClass(
                            'bg-blue-100 text-blue-500 border-blue-300 bg-red-100 text-red-500 border-red-300')
                        .addClass('bg-orange-100 text-orange-500 border-orange-300');
                    $(".alert-interaccion .title").html('Enviando Evaluación');
                    $(".alert-interaccion .descripcion span").html(
                        'Por favor espere estamos procesando la Evaluación de ');
                    $(".alert-interaccion, .loader-sent").show();
                },
                success: function(response) {
                    $(".loader-sent").hide();
                    console.log(JSON.stringify(response.errors));
                    console.log('Entro a success');
                },
                error: function(response, error, objError) {
                    $(".loader-sent").hide();
                    $(".progreso").remove();
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors, function(key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function(key, value) {
                                    console.log(key + " " + value);
                                });
                            } else {
                                console.log(value);
                            }
                        });
                    }
                    if (navigator.onLine == true) {
                        $(".alert-interaccion div").removeClass(
                            'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                        ).addClass('bg-red-100 text-red-500 border-red-300');
                        $(".alert-interaccion .title").html('Error');
                        $(".alert-interaccion .descripcion span").html(
                            'Algo salio mal intente de nuevo, no se a podido guardar la evaluación de ');
                        $(".alert-interaccion").show();
                    } else {
                        $(".alert-interaccion div").removeClass(
                            'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                        ).addClass('bg-red-100 text-red-500 border-red-300');
                        $(".alert-interaccion .title").html('Error');
                        $(".alert-interaccion .descripcion span").html(
                            'Verifica tu conexion a internet, no se a podido guardar la evaluación de ');
                        $(".alert-interaccion").show();
                    }
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                $(".loader-sent").hide();
                $(".progreso").remove();
                if (jqXHR.status === 0) {
                    $(".alert-interaccion div").removeClass(
                        'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                    ).addClass('bg-red-100 text-red-500 border-red-300');
                    $(".alert-interaccion .title").html('Error Status');
                    $(".alert-interaccion .descripcion span").html(
                        'Verifica tu conexion a internet, no se a podido guardar la evaluación de ');
                    $(".alert-interaccion").show();
                } else if (jqXHR.status == 404) {
                    $(".alert-interaccion div").removeClass(
                        'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                    ).addClass('bg-red-100 text-red-500 border-red-300');
                    $(".alert-interaccion .title").html('Error Status');
                    $(".alert-interaccion .descripcion span").html(
                        'Página solicitada no encontrada [400], no se a podido guardar la evaluación de ');
                    $(".alert-interaccion").show();
                } else if (jqXHR.status == 500) {
                    $(".alert-interaccion div").removeClass(
                        'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                    ).addClass('bg-red-100 text-red-500 border-red-300');
                    $(".alert-interaccion .title").html('Error Status');
                    $(".alert-interaccion .descripcion span").html(
                        'Error interno del servidor [500], no se a podido guardar la evaluación de ');
                    $(".alert-interaccion").show();
                } else if (textStatus === 'parsererror') {
                    $(".alert-interaccion div").removeClass(
                        'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                    ).addClass('bg-red-100 text-red-500 border-red-300');
                    $(".alert-interaccion .title").html('Error Status');
                    $(".alert-interaccion .descripcion span").html(
                        'Error al analizar el archivo solicitado, no se a podido guardar la evaluación de ');
                    $(".alert-interaccion").show();
                } else if (textStatus === 'timeout') {
                    $(".alert-interaccion div").removeClass(
                        'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                    ).addClass('bg-red-100 text-red-500 border-red-300');
                    $(".alert-interaccion .title").html('Error Status');
                    $(".alert-interaccion .descripcion span").html(
                        'Tiempo de espera exedido, no se a podido guardar la evaluación de ');
                    $(".alert-interaccion").show();
                } else if (textStatus === 'abort') {
                    $(".alert-interaccion div").removeClass(
                        'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                    ).addClass('bg-red-100 text-red-500 border-red-300');
                    $(".alert-interaccion .title").html('Abort');
                    $(".alert-interaccion .descripcion span").html(
                        'Petición Abortada, no se a podido guardar la evaluación de ');
                    $(".alert-interaccion").show();
                } else {
                    ;
                    $(".alert-interaccion div").removeClass(
                        'bg-blue-100 text-blue-500 border-blue-300 bg-orange-100 text-orange-500 border-orange-300'
                    ).addClass('bg-red-100 text-red-500 border-red-300');
                    $(".alert-interaccion .title").html('Fail');
                    $(".alert-interaccion .descripcion span").html(
                        'Error desconocido [419], no se a podido guardar la evaluación de ');
                    $(".alert-interaccion").show();
                }
            });
        }
    </script>
@endsection
