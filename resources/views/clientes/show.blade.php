<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $cliente->name }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <x-primary-button class="mb-2">
                <a href="{{route('clientes.index')}}">{{__('Volver')}}</a>
            </x-primary-button>
            <hr>
            <h2 class="mt-2 mb-2"><b>DATOS PERSONALES</b></h2>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
                <div class="w-full mx-auto mt-4">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>N° de cliente:</span> <b>{{$cliente->id}}</b>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Nombre: </span><b>{{$cliente->name}}</b>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Fecha de registro: </span><b>{{$cliente->created_at}}</b>
                        </div>
                    </div>
                </div>
                <div class="w-full mx-auto mt-4">
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>N° telefonico: </span> <b>{{$cliente->num_cel}}</b>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Correo: </span><b>{{$cliente->email}}</b>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                            <span>Estado: </span>
                            @if ($cliente->vigencia == 1)
                                <td class="p-2"><div class="inline text-center px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/100 dark:bg-gray-800">Activo</div></td>
                            @else
                                <td class="p-2"><div class="inline text-center px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-red-100/100 dark:bg-gray-800">Inactivo</div></td>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>