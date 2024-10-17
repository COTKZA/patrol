@extends('layouts.app')
@section('title', 'Machines')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#"><i
                                                class="fas fa-ruler fa-lg"></i>&nbsp;&nbsp;Machines</a>
                                <div class="navbar-collapse justify-content-end">
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search"
                                            aria-label="Search" name="search" value="{{ $search }}">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div> &nbsp;
                            </div>
                        </nav>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Machine No</th>
                                    <th scope="col">Model Name</th>
                                    <th scope="col">Brand</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($machines as $item)
                                    <tr>
                                        <td>{{ $item->MachineNO }}</td>
                                        <td>{{ $item->ModelName }}</td>
                                        <td>{{ $item->Brand }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (Auth::user()->role == 'admin')
                        {{-- <div class="row justify-content-center">
                            <input type="submit" value="Save" class="btn btn-primary col-sm-2">
                        </div> --}}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
