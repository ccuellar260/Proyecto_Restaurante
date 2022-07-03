@extends('navegador')

@section('Contenido')
    <!-- This is an example component -->
    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
            <div class="p-4 border-b">
                <h2 class="text-2xl text-center">
                    DETALLE DE RECIBO
                </h2>
            </div>
            <div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        NIT EMPRESA:
                    </p>
                    <input type="text" value="876543456" readonly>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Factura:
                    </p>
                    <input type="text" value="{{ $recibo->id_recibo }}" readonly>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        SR.(ES):
                    </p>
                    <input type="text" value="{{ $recibo->nombre_completo }}" readonly>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        NIT:
                    </p>
                    @if (is_null($recibo->NIT))
                        <input type="number" value="{{ $recibo->NIT }}" readonly>
                    @else
                        <input type="text" value="S/N" readonly>
                    @endif

                </div>
                <div class="md:grid md:grid-cols hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">

                    <div class="bg-white rounded-md w-full">
                        <div>
                            <div class="-mx-0 sm:-mx-0 px-0 sm:px-0 py-0 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    CANT. P.UNIT.
                                                </th>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    DETALLE
                                                </th>

                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    SUBTOTAL
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($detalles as $mauri)
                                            <tr>
                                                    <td
                                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-left">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $mauri->cantidad }}X{{ $mauri->prod_precio }} </p>
                                                    </td>
                                                    <td
                                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-left">
                                                        <p class="text-gray-900 whitespace-no-wrap">{{ $mauri->nombre }}
                                                        </p>
                                                    </td>

                                                    <td
                                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-left">
                                                        <p class="text-gray-900 whitespace-no-wrap">{{ $mauri->precio }}
                                                        </p>
                                                    </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-left">
                                                    <p class="text-gray-900 whitespace-no-wrap"></p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-left">
                                                    <p class="text-gray-900 whitespace-no-wrap">TOTAL A PAGAR</p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-left">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $recibo->precio_total }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                    <p class="text-gray-600">
                        Attachments
                    </p>
                    <div class="space-y-2">
                        <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                            <div class="space-x-2 truncate">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z" />
                                </svg>
                                <span>
                                    resume_for_manager.pdf
                                </span>
                            </div>
                            <a href="#" class="text-purple-700 hover:underline">
                                Download
                            </a>
                        </div>

                        <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                            <div class="space-x-2 truncate">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z" />
                                </svg>
                                <span>
                                    resume_for_manager.pdf
                                </span>
                            </div>
                            <a href="#" class="text-purple-700 hover:underline">
                                Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- support me by buying a coffee -->
        <a href="https://www.buymeacoffee.com/danimai" target="_blank"
            class="bg-purple-600 p-2 rounded-lg text-white fixed right-0 bottom-0">
            Support me
        </a>
    </div>
@endsection
