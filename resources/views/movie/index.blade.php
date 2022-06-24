<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>



    <div class="container mx-auto my-10 px-4">

        <x-link colour="blue" class="mb-4" href="{{route('movies.create')}}">CREATE</x-link>

        <x-table :columns="['Name', 'Year', 'Director', 'Budget £ (m)', 'Rating(1-5)', 'Actions']">
            @foreach($movies as $movie)
                <x-table.tr class="">
                    <x-table.td>{{$movie->name}}</x-table-td>
                    <x-table.td>{{$movie->year}}</x-table-td>
                    <x-table.td>{{$movie->director}}</x-table-td>
                    <x-table.td>{{$movie->budget}}</x-table-td>
                    <x-table.td>{{$movie->rating}}</x-table-td>
                    <x-table.td class="flex">
                        <a href="{{route('movies.show',   ['id'=>$movie->id])}}" class="btn btn-sm btn-warning">
                            <x-heroicon-o-view-list class="mr-3" />
                        </a>
                        @can('update-movie',$movie)
                        <a href="{{route('movies.edit',   ['id'=>$movie->id])}}" class="btn btn-sm btn-primary">
                            <x-heroicon-o-pencil class="mr-3" />
                        </a>
                        @endcan()
                        @can('update-movie',$movie)
                        <a href="{{route('movies.delete', ['id'=>$movie->id])}}" class="btn btn-sm btn-danger">
                            <x-heroicon-o-trash />
                        </a>
                        @endcan()
                    </x-table.td>
                </x-table-tr>
            @endforeach
        </x-table>


        <x-table.nav>
            {{ $movies->links()}}
        </x-table-nav>
    </div>

</x-app-layout>


