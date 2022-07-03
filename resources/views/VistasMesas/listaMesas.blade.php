@foreach ($tabla as $r)
            <div class="w-46 h-48 mt-4">
                @if($r->estado=='Disponible')
                <div
                    class="bg-green-500 w-44 h-44 hover:bg-neutral-700 rounded-full flex flex-col justify-center gap-1 items-center ">
                    <div>
                        <p class="text-4xl font-bold">{{ $r->nro_mesa }}</p>
                    </div>
                    <div>
                        <p>{{ $r->mesa }}</p>
                    </div>
                </div>
                @endif
                @if($r->estado=='Ocupado')
                <div
                    class="bg-red-500 w-44 h-44 hover:bg-neutral-700 rounded-full flex flex-col justify-center gap-1 items-center ">
                    <div>
                        <p class="text-4xl font-bold">{{ $r->nro_mesa }}</p>
                    </div>
                    <div>
                        <p>{{ $r->mesa }}</p>
                    </div>
                </div>
                @endif
                @if($r->estado=='Reserva')
                <div
                    class="bg-yellow-200 w-44 h-44 hover:bg-neutral-700 rounded-full flex flex-col justify-center gap-1 items-center ">
                    <div>
                        <p class="text-4xl font-bold">{{ $r->nro_mesa }}</p>
                    </div>
                    <div>
                        <p>{{ $r->mesa }}</p>
                    </div>
                </div>
                @endif
                <div class="flex justify-center mt-2">
                    <button type="button"
                        class="mr-2 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                        <a href="{{Route('Mesas.edit', $r->nro_mesa)}}" class="pr-3 pl-3">
                            EDITAR
                        </a>
                    </button>
                    <button type="button"
                                            class="mr-2 text-sm bg-red-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            <form action="{{Route('Mesas.destroy', $r->nro_mesa)}}" method="POST">
                                                @csrf
                                                <!-- token de seguridad-->
                                                @method('DELETE')

                                                <!-- mostar boton eliminar-->
                                                <input type="submit" value="ELIMINAR" class=""
                                                    onclick="return confirm('Desea Eliminar?')">
                                                <!-- volver a preguntar si desea eliminar -->
                                            </form>
                                        </button>




                </div>
            </div>
@endforeach

