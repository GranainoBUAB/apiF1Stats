@extends('layouts.app')

@section('content')

<form method="post" action="{{route('update', $driversSeason->id)}}" enctype="multipart/form-data">
    @method('patch')
    @csrf

    <div class="table-responsive fulltable">
            <table class="tableresult table table-striped table-hover">
                <thead>
                    <tr>

                        <th scope="col">Drivers</th>
                        <th scope="col">Points</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>

                <tbody>
                        <tr>

                            <td class="table-clasificacion"><input type="text" name="name" value="{{$driversSeason->name}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                            <td class="table-clasificacion"><input type="text" name="points" value="{{$driversSeason->points}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                            <td> <button type="submit" class="btn bt-create">✔️</button></td>
                        </tr>
                </tbody>
            </table>
    </div>
</form>
@endsection

