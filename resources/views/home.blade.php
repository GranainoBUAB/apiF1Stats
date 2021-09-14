@extends('layouts.app')

@section('content')


    <div class="table-responsive fulltable">



            <table class="tableresult table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Drivers</th>
                        <th scope="col">Points</th>

                    </tr>
                </thead>

                <tbody>

                    @foreach ($driversSeasons as $item)
                        <tr>
                            <th scope="row" class="table-clasificacion">{{ $item->id }}</th>
                            <td class="table-clasificacion">{{ $item->name }}</td>
                            <th scope="row" class="table-clasificacion">{{ number_format($item->points, 1) }}</td>
                            {{-- <td ><button>Edit</button></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>


    </div>
@endsection
