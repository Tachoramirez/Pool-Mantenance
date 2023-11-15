<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 gap-1">
        <div class="col-span-1"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Servicios</h2></div>
        </div>
    </x-slot>
    
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-primary-button class="mb-2">
                <a href="{{route('servicios.create')}}">{{__('Nuevo servicio')}}</a>
            </x-primary-button>
            <div class="bg-white overflow shadow-lg sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 w-full overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead class="bg-blue-50 text-xs font-semibold uppercase text-gray-400">
                            <tr>
                                <th class="p-2">
                                    <div class="text-left font-semibold">N° Servicio</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Servicio</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Alberca</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Tecnico</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Estado</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-center font-semibold">Action</div>
                                </th>
                            </tr>
                        </thead>
    
                        <tbody class="divide-y divide-gray-100 text-sm">
                            <!-- record 1 -->
                            @foreach ($servicios as $servicio)
                                <tr>
                                    <td class="p-2"><div class="text-left font-medium">{{$servicio->id}}</div></td>
                                    <td class="p-2"><div class="text-left font-medium">{{$servicio->nombre}}</div></td>
                                    <td class="p-2"><div class="text-left font-medium">{{$servicio->alberca}}</div></td>
                                    <td class="p-2"><div class="text-left font-medium">{{$servicio->tecnico}}</div></td>

                                    @if ($servicio->id_estado == 1)
                                        <td class="p-2"><div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-gray-100/100 dark:bg-gray-800">{{$servicio->estado}}</div></td>
                                    @elseif($servicio->id_estado == 2)
                                        <td class="p-2"><div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-blue-100/100 dark:bg-gray-800">{{$servicio->estado}}</div></td>
                                    @elseif($servicio->id_estado == 3)
                                        <td class="p-2"><div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-red-100/100 dark:bg-gray-800">{{$servicio->estado}}</div></td>
                                    @elseif($servicio->id_estado == 4)
                                        <td class="p-2"><div class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/100 dark:bg-gray-800">{{$servicio->estado}}</div></td>
                                    @endif
                                    <td class="p-2">
                                        <div class="flex justify-center">
                                            <a class="btn" href="{{route('servicios.show', $servicio->id)}}" title="ver">
                                                <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                                    <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1">
                                                      <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                      <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                                                    </g>
                                                  </svg>
                                            </a>
                                            <a class="btn" href="{{route('servicios.edit', $servicio->id)}}" title="editar">
                                                <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-yellow-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279"/>
                                                </svg>
                                            </a>
                                            <a class="btn" title="borrar">
                                                <form action="{{route('servicios.destroy', $servicio->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                        </svg>
                                                    </button>
                                                    
                                                </form> 
                                            </a>
                                        </div>
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

