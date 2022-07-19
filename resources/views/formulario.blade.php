<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

</head>
<body>
        <!-- button -->
        <button onclick="openModal(true)"
        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform focus:ring-blue-700 mx-auto transition duration-150 ease-in-out hover:bg-blue-600 bg-blue-700 rounded text-white focus:ring-opacity-50"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
        <span>ADICIONAR PRODUCTO</span>
        </button>



    <!-- overlay -->
    <div id="modal_overlay"
    {{-- para la posicion y algo de tamano --}}
        {{-- class="hidden absolute inset-60 bg-black bg-opacity-0 h-96 w-3/5 flex justify-center items-center pt-10" --}}
        >
        <!-- modal -->
        <div id="modal"
        {{-- diseno adnetro de la caja --}}
            {{-- class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300" --}}
            >

            <!-- button close -->
            <button onclick="openModal(false)"
                {{-- class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full --}}
                 {{-- focus:outline-none text-white" --}}

                 >
                 {{-- boton de la x --}}
                &cross;
            </button>

            <!-- header - titulo  -->
            <div class="flex justify-between px-4 py-3 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-600">ESte es el titutlo</h3>
                <button
                    class="bg-indigo-600 px-4 py-2 mr-3 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    <a href="{{ Route('Cliente.Create') }}">CREAR CLIENTE</a>
                </button>
            </div>

            <!-- body -->
            <div class="w-full p-3">
                hola que ahcer

                <button onclick="openModal(false)"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded
                    text-white focus:outline-none">
                    Close
                </button>
            </div>
         </div>{{-- end modal --}}

    </div>{{-- end modal_overlay --}}

    <script>
        const modal_overlay = document.querySelector('#modal_overlay');
        const modal = document.querySelector('#modal');

        function openModal(value) {
            const modalCl = modal.classList
            const overlayCl = modal_overlay

            if (value) {
                overlayCl.classList.remove('hidden')
                setTimeout(() => {
                    modalCl.remove('opacity-0')
                    modalCl.remove('-translate-y-full')
                    modalCl.remove('scale-150')
                }, 100);
            } else {
                modalCl.add('-translate-y-full')
                setTimeout(() => {
                    modalCl.add('opacity-0')
                    modalCl.add('scale-150')
                }, 100);
                setTimeout(() => overlayCl.classList.add('hidden'), 300);
            }
        }
        openModal(false)
    </script>

</body>
</html>
