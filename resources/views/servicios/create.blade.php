<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Nuevo servicio
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-primary-button class="mb-2">
                <a href="{{route('servicios.index')}}">{{__('Volver')}}</a>
            </x-primary-button>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('servicios.store') }}">
                        @csrf
                
                        <!-- Name -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="texto">Servicio</label>
                            <input name="nombre" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="servicio">
                             <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        
                        
                            <!-- Usuario -->
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="texto">Usuario</label>
                            <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="id_usuario" id="">
                                <option selected disabled>---Selecciona un usuario---</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_usuario')" class="mt-2" />
                        </div>

                        <!--Alberca-->
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="select1">Alberca</label>
                            <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " name="id_alberca" id="">
                                <option selected disabled>---Selecciona una alberca---</option>
                                @foreach ($albercas as $alberca)
                                    <option value="{{$alberca->id}}">{{$alberca->nombre}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_alberca')" class="mt-2" />
                        </div>

                        <div class="w-full mx-auto mt-4">
                            <div class="flex flex-wrap -mx-3 mb-4">
                                <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">PH</label>
                                    <input   class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " type="number" name="ph" id="">
                                    <x-input-error :messages="$errors->get('ph')" class="mt-2" />
                                </div>
                                 <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Cloro</label>
                                    <input   class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " type="number" name="cloro" id="">
                                    <x-input-error :messages="$errors->get('cloro')" class="mt-2" />
                                </div>

                                <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Cepillado</label>
                                    <input value="{{now()}}" class="block mt-1 border-gray-300 rounded-md px-2 py-3 w-full" type="checkbox" name="cepillo" id="cepillo">
                                    <x-input-error :messages="$errors->get('cepillo')" class="mt-2" />
                                </div>
                                <div class="w-full md:w-1/3 lg:w-3/12 px-3 mb-4 md:mb-0">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Filtro</label>
                                    <input value="{{now()}}" class="block mt-1 border-gray-300 rounded-md px-2 py-3 w-full " type="checkbox" name="filtro" id="filtro">
                                    <x-input-error :messages="$errors->get('filtro')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="observaciones" :value="__('Observaciones')" />
                            <textarea class="block mt-1 border-gray-300 rounded-md px-2 py-3 w-full" name="observaciones" id=""></textarea>
                            <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Registrar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>