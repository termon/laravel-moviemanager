<x-app-layout>

    <x-slot name="header">
        <h3>Create Movie</h3>
    </x-slot>

    <div class="container mx-auto mt-4 shadow-lg p-5 bg-slate-50 rounded">

        <form action="/movies/"  method="post">
            @csrf

            @include('movie._form',['movie'=>$movie,'message'=>'Create'])

        </form>

    </div>
</x-app-layout>


