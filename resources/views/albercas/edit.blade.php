
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $alberca->nombre }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-primary-button class="mb-2">
                <a href="{{route('albercas.index')}}">{{__('Volver')}}</a>
            </x-primary-button>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <form method="POST" action="{{ route('albercas.update', $alberca->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- nombre -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="texto">Alberca</label>
                            <input name="nombre" value="{{$alberca->nombre}}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="texto" type="text" placeholder="Alberca">
                             <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        
                        
                        <!-- Cliente -->
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="texto">Cliente</label>
                            <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="id_cliente" id="">
                                @foreach ($currentClient as $clienteActual)
                                    <option selected  value="{{$clienteActual->id}}">{{$clienteActual->name}}</option>
                                @endforeach
                                @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                                @endforeach 
                            </select>
                            <x-input-error :messages="$errors->get('id_cliente')" class="mt-2" />
                        </div>

                        <!-- Vigencia -->
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="texto">Vigencia</label>
                            <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="vigencia" id="">
                                @if ($alberca->vigencia == 1)
                                     <option selected  value="1">Activo</option>
                                     <option  value="0">Inactivo</option>
                                @else
                                    <option   value="1">Activo</option>
                                    <option selected value="0">Inactivo</option>
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('vigencia')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center  justify-end mt-4">                
                            <button class="rounded-md bg-slate-800 px-3 py-2 text-sm font-semibold text-white shadow-lg hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 " type="submit"> Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>