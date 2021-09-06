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
                        <tr class="table-clasificacion">
                            <th scope="row">{{ $item->id }}</th>
                            <td >{{ $item->name }}</td>
                            <th scope="row">{{ $item->points }}</td>
                                <td ><button>Edit</button></td>    
                        </tr>
                    @endforeach
                </tbody>
            </table>


    </div>
@endsection
