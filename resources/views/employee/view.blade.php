@extends('layout.main')
@include('partials.navbar')

{{-- Part of <body> that will be costumized --}}
@section('container')
    <h1 class="mb-4 text-center">Data Pegawai Tim Perencanaan dan Pelaporan</h1>

    <a class="btn btn-primary mb-2" href="/employee/add" role="button">Add Data</a>

    @php
        $nomor = 1;
    @endphp
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Unit Kerja</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $nomor++ }}</td>
                    <td>{{ $employee->nip }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->department }}</td>
                    <td>
                        <div class="row">
                            <div class="col-3">
                                <a type="button" class="btn btn-primary" href="{{ route('employee.edit', ['employee' => $employee]) }}"><i
                                    class="bi bi-eye-fill" style="color: black"></i></a>
                            </div>
                            <div class="col-3">
                                <form action="{{ route('employee.delete', ['employee' => $employee]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="bi-trash3-fill"
                                            style="color: black"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
