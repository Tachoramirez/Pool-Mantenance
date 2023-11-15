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
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$cliente->name}}" required autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$cliente->email}}" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- num_cel -->
                        <div class="mt-4">
                            <x-input-label for="num_cel" :value="__('Celular')" />
                            <x-text-input id="num_cel" class="block mt-1 w-full" type="text" name="num_cel" value="{{$cliente->num_cel}}" required autofocus autocomplete="num_cel" />
                            <x-input-error :messages="$errors->get('num_cel')" class="mt-2" />
                        </div>

                        <!-- Vigencia -->
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="texto">Vigencia</label>
                            <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="vigencia" id="">
                                @if ($cliente->vigencia == 1)
                                     <option selected  value="1">Activo</option>
                                     <option  value="0">Inactivo</option>
                                @else
                                    <option   value="1">Activo</option>
                                    <option selected value="0">Inactivo</option>
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('vigencia')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Editar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>