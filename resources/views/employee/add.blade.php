@extends('layout.main')

@include('partials.navbar')
@section('container')
    <h3 class="mb-4 mt-1">Input Pegawai</h3>

    {{-- Display error when input employee data --}}
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Need to change for POST method --}}
    <form action={{ route('employee.save') }} method="POST">
        @csrf
        @method('post')

        <div class="row mb-3">
            <div class="col-2">
                <label for="inputNip" class="form-label">NIP</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="formInputNip" name="nip" minlength="18" maxlength="18">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
                <label for="inputName" class="form-label">Nama</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="formInputName" name="name">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
                <label for="inputPosition" class="form-label">Jabatan</label>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="formInputPosition" name="position">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
                <label for="inputDepartment" class="form-label">Bidang</label>
            </div>
            <div class="col-6">
                <select class="form-select" id="selectDepartment" name="department">
                    <option value="UK01">Sekretariat</option>
                    <option value="UK02">Bidang eGovernment</option>
                    <option value="UK03">Bidang Aplikasi Informatika</option>
                    <option value="UK04">Bidang Informasi Komunikasi Publik</option>
                    <option value="UK05">Bidang Persandian dan Keamanan Informasi</option>
                    <option value="UK06">Bidang Statistik</option>
                    <option value="UK07">UPTD Pusat Layanan Digital, Data dan Informasi Geospasial</option>
                </select>
                {{-- <input type="text" class="form-control" id="formInputDepartment" name="employeeDepartment"> --}}
            </div>
        </div>

        {{-- Button Submit --}}
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
