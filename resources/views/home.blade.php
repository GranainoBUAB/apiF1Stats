@extends('layouts.app')

@section('content')


    <div>



            <table class="table">
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
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


    </div>
@endsection
