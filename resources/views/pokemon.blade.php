{{--I am doing same style as the main page due I don't have more time--}}

@extends('layouts.app')

@if(!is_null($data['error']))
    @section('title')
        Info for the pokemon: {{$data['error']}}
    @endsection
@else
    @section('title')
        Info for the pokemon: {{$data['data']['pokemon_name']}}
    @endsection

    @section('content')
        <div class="max-w-screen-md mx-auto flex items-center justify-center">
            <div class="bg-white p-10 w-full rounded-xl space-y-7">
                <div class="w-full border border-slate-200 rounded-xl overflow-x-auto">
                    <table id="table" class="w-full divide-y divide-slate-200">
                        <thead class="bg-slate-100 text-slate-800">
                        <tr>
                            <th class="px-4 py-2 text-start">Character</th>
                            <th class="px-4 py-2 text-start">Description</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white text-slate-800">

                        @foreach($data['data'] as $k=>$dat)
                            <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                                <td class="px-4 py-2">{{$k}}</td>
                                @if(!is_array($dat) )
                                    <td class="px-4 py-2">{{$dat}}</td>
                                @elseif(is_array($data) && $k == 'images')
                                    <td class="px-4 py-2">
                                        <ul>
                                            @foreach($dat as $da)
                                                <li><img src="{{$da}}"/></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                @else
                                    <td class="px-4 py-2">
                                        <ul>
                                            @foreach($dat as $da)
                                                <li>{{$da}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="location.href='/'">Return List</button>
            </div>
        </div>

    @endsection
@endif
