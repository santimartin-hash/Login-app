<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                        <h1>insertar skins</h1>
                        <h1>------------------------------------------------------------------------------------------------------------------------------------------</h1>
                        <form method="post" action="{{ route('Insertarskins') }}">
                            @csrf
                            <label for="nombre">nombre:</label>
                            <input type="text" name="nombre" required>

                            <label for="precio">precio:</label>
                            <input type="number" name="precio" required>

                            <label for="imagen">imagen:</label>
                            <input type="text" name="imagen" required>

                            <!-- Agrega más campos según tu base de datos -->

                            <button type="submit">Enviar</button>
                        </form>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                    <h1>------------------------------------------------------------------------------------------------------------------------------------------</h1>
                            @if($skins)
                            <h2>Skins disponibles:</h2>
                            <ul>
                                @foreach($skins as $skin)
                                <li>---------------------</li>
                                <li>{{ $skin->id }}</li>
                                <li>{{ $skin->nombre }}</li>
                                <li>{{ $skin->precio }}</li>
                                <li>{{ $skin->imagen }}</li>
                                <li>---------------------</li>
                                <form action="{{ route('EliminarSkin', ['skin' => $skin->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar Skin</button>
                                </form>
                                <li>---------------------</li>
                                <form action="{{ route('ModificarSkin') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $skin->id }}">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" value="{{ $skin->nombre }}" required>

                                    <label for="precio">Precio:</label>
                                    <input type="number" name="precio" value="{{ $skin->precio }}" required>

                                    <label for="imagen">Imagen:</label>
                                    <input type="text" name="imagen" value="{{ $skin->imagen }}" required>
                                    <button type="submit" class="btn btn-warning">Modificar Skin</button>
                                </form>
                                @if(session('successModificar'))
                                <div class="alert alert-success">
                                    {{ session('successModificar') }}
                                @endif
                                @if(session('errorModificar'))
                                    <div class="alert alert-success">
                                {{ session('errorModificar') }}
                                    </div>
                                    @endif
                                    @endforeach
                            </ul>
                            @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>