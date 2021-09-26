@extends('layouts.app')

@section('content')
    <div class="table-responsive fulltable">
            <table class="tableresult table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Drivers</th>
                        <th scope="col">Points</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($driversSeasons as $item)
                        <tr>
                            <th scope="row" class="table-clasificacion">{{$item->position}}</th>
                            <th scope="row" class="table-clasificacion" ><img src="{{$item->country}}" width="17px"></th>
                            <td class="table-clasificacion">{{ $item->name }}</td>
                            <th scope="row" class="table-clasificacion">{{ number_format($item->points, 1) }}</td>
                            <th scope="row" class="table-clasificacion"><a href="{{ route('edit', ['id'=>$item->id]) }}">✏️</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
