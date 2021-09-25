@extends('layouts.app')

@section('content')

    {{$pos = 0}}
    <div class="table-responsive fulltable">
            <table class="tableresult table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Drivers</th>
                        <th scope="col">Points</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>

                <tbody>

                    @foreach ($driversSeasons as $item)
                        {{-- {{$pos += 1}} --}}
                        <tr>
                            <th scope="row" class="table-clasificacion">{{$pos += 1}}</th>
                            <td class="table-clasificacion">{{ $item->name }}</td>
                            <th scope="row" class="table-clasificacion">{{ number_format($item->points, 1) }}</td>
                            <th scope="row" class="table-clasificacion"><a href="{{ route('edit', ['id'=>$item->id]) }}">✏️</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
