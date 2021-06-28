{{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Instituciones') }}
    </h2>
</x-slot>
 
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
            @endif
            
            <button wire:click="create()" class="bg-green-500 hover:bg-green-600 font-bold py-2 px-4 my-3" >Nuevo</button>
            @if($modal)
            @include('livewire.institutions-create')   
            @endif    
            
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">INSTITUCIÓN</th>
                        <th class="px-3 py-2">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($institutions as $institution)
                    <tr>
                        <td class="border px-3 py-2">{{$institution->id}}</td>
                        <td class="border px-3 py-2">{{$institution->name}}</td>
                        <td class="border px-3 py-2 text-center">
                            <button wire:click="edit({{$institution->id}})" class="bg-blue-500 hover:bg-blue-600  font-bold py-2 px-4">Editar</button>
                            <button wire:click="destroy({{$institution->id}})" class="bg-red-500 hover:bg-red-700  font-bold py-2 px-4">Borrar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>
    </div>
</div>




<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Instituciones') }}
    </h2>
</x-slot>
 
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
            @endif
            
            <button wire:click="create()" class="bg-green-500 hover:bg-green-600 font-bold py-2 px-4 my-3" >Nuevo</button>
            @if($modal)
            @include('livewire.institutions-create')   
            @endif    
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col"class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">INSTITUCIÓN</th>
                        <th scope="col"class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    @foreach ($institutions as $institution)
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">{{$institution->id}}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">{{$institution->name}}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="edit({{$institution->id}})" class="bg-blue-500 hover:bg-blue-600  font-bold py-2 px-4">Editar</button>
                            <button wire:click="destroy({{$institution->id}})" class="bg-red-500 hover:bg-red-700  font-bold py-2 px-4">Borrar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>
    </div>
</div>

 --}}


 <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Instituciones') }}
    </h2>
</x-slot>
 
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
            @endif
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="flex bg-white px-4 py-3 border-gray-200 sm:px-6">
                            <button wire:click="create()" class="bg-green-500 hover:bg-green-600 font-bold py-2 px-4 my-3" >Nuevo</button>
                            @if($modal)
                            @include('livewire.institutions-create')   
                            @endif  
                            <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 ml-6 block w-full border-gray-200" type="text"placeholder="Buscar..." >  
                            <div class="form-input rounded-md shadow-sm mt-1 ml-6 block border-gray-200">
                                <select wire:model="perPage" class="outline-none form-input rounded-md text-gray-500 border-gray-200">
                                    <option value="5">5 por pánina</option>
                                    <option value="10">10 por pánina</option>
                                    <option value="15">15 por pánina</option>
                                    <option value="25">25 por pánina</option>
                                    <option value="50">50 por pánina</option>
                                    <option value="100">100 por pánina</option>
                                </select>                   
                            </div>
                            @if ($search !== '')                                                 
                            <div class="form-input rounded-md shadow-sm mt-1 ml-6 block border-gray-200">                
                                <button wire:click="clear()" class="bg-green-500 hover:bg-green-600 font-bold py-2 px-4 my-3" >X</button>
                            </div>
                            @endif
                        </div> 
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @if ($institutions->count())
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-3 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-3 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">INSTITUCIÓN</th>
                                        <th scope="col" class="px-3 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    
                                    @foreach ($institutions as $institution)
                                    <tr>
                                        <td scope="col" class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">{{$institution->id}}</td>
                                        <td scope="col" class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">{{$institution->name}}</td>
                                        <td scope="col" class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <button wire:click="edit({{$institution->id}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Editar</button>
                                            <button wire:click="destroy({{$institution->id}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Borrar</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                {{$institutions->links()}}
                            </div>                                
                            @else
                            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 text-gray-500">
                                No hay resultados para la búsqueda "{{$search}}" al mostrar {{$perPage}} por página
                            </div> 
                            @endif
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
