<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $servicio->nombre }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <x-primary-button class="mb-2">
                <a href="{{route('servicios.index')}}">{{__('Volver')}}</a>
            </x-primary-button>
            <hr>
            <h2 class="mt-2 mb-2"><b>DATOS PRINCIPALES</b></h2>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
                <div class="w-full mx-auto mt-4">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>N° de servicio: </span> <b>{{$servicio->id}}</b>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Nombre: </span><b>{{$servicio->nombre}}</b>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Fecha de registro: </span><b>{{$servicio->created_at}}</b>
                        </div>
                    </div>
                </div>
                <div class="w-full mx-auto mt-4">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Encargado: </span> <b>{{$servicio->id_usuario}}</b>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Alberca: </span><b>{{$servicio->id_alberca}}</b>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Estado: </span>
                            @if ($servicio->id_estado == 1)
                                <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-gray-100/100 dark:bg-gray-800">En proceso</div>
                            @elseif($servicio->id_estado == 2)
                                <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-blue-100/100 dark:bg-gray-800">Pendiente</div>
                            @elseif($servicio->id_estado == 3)
                                <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-red-100/100 dark:bg-gray-800">Cancelado</div>
                            @elseif($servicio->id_estado == 4)
                                <div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/100 dark:bg-gray-800">Finalizado</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h2 class="mt-2 mb-2"><b>INFORMACION DE SERVICIOS</b></h2>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
                <div class="w-full mx-auto mt-4">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <div class="text-center"><span>Nivel de Ph: </span><br><h4>{{$servicio->ph}}</h4></div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <div class="text-center"><span>Nivel de cloro: </span><br><h4>{{$servicio->cloro}}</h4></div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <div class="text-center"><span>Cambio de filtro: </span><br>
                                @if ($servicio->filtro == null)
                                    <h3>NO</h3>
                                @else
                                    <h4>{{$servicio->filtro}}</h4>
                                @endif
                                </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <div class="text-center"><span>Cepillado: </span><br>
                                @if ($servicio->cepillo == null)
                                    <h3>NO</h3>
                                @else
                                    <h4>{{$servicio->cepillo}}</h4>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <div class="text-center"><span>Observaciones: </span><br>
                                @if ($servicio->observaciones == null)
                                    <span><h4>SIN OBSERVACIONES</h4></span>
                                @else
                                    <h4>{{$servicio->observaciones}}</h4>
                                @endif
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

