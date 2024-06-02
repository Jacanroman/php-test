{{--I will show the Name and a button to go to this specific pokemon--}}
{{--Also in case we have an error message I will show here--}}
{{--for the search I will use a javascript the hidde or show the specific pokemon--}}

@extends('layouts.app')

@section('title')
    List of the Pokemon
@endsection

@section('content')
    <div class="max-w-screen-md mx-auto flex items-center justify-center">
        <div class="bg-white p-10 w-full rounded-xl space-y-7">


            @if(!is_null($data['error']))
                <h1 class="text-red-600 mb-3">{{$data['error']}}</h1>
            @else

                <h2 class="text-m font-semibold mb-4">Search for an specific pokemon:</h2>
                <input type="text" id="search-input" class="w-full border rounded-xl border-slate-200 p-2" placeholder="Add Pokemon name">

                <div class="w-full border border-slate-200 rounded-xl overflow-x-auto">
                    <table id="table" class="w-full divide-y divide-slate-200">
                        <thead class="bg-slate-100 text-slate-800">
                        <tr>
                            <th class="px-4 py-2 text-start">Pokemon Name</th>
                            <th class="px-4 py-2 text-start">Options</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white text-slate-800">
                        @foreach($data['data'] as $dat)
                            <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                                <td class="px-4 py-2">{{$dat['name']}}</td>
                                <td class="px-4 py-2">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="location.href='/detail/<?=$dat['pokemon_id']?>'">View</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
