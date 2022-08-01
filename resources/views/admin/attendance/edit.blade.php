@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Admin</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Kelas</h6>
                <p></p>
            </div>
            <form action="{{ route('admin.attendances.update', $attendances->id) }}" method="POST">
                <div class="card-body">
                    @csrf @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Pertemuan</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Masukan Pertemuan"
                                name="pertemuan" value="{{ $attendances->pertemuan }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Kelas</label>
                            <select id="inputState" name="class_education_id" class="form-control">
                                {{-- <option selected>Choose...</option> --}}
                                @foreach ($class as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $attendances->class_education_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Mahasiswa</label>
                            <select id="inputState" name="user_id" class="form-control">
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $attendances->user_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Status</label>
                            <select id="inputState" name="status" class="form-control">
                                <option value="Hadir" {{ $attendances->status == 'Hadir' ? 'selected' : '' }}>Hadir
                                </option>
                                <option value="Alfa" {{ $attendances->status == 'Alfa' ? 'selected' : '' }}>Alfa
                                </option>
                                <option value="Sakit" {{ $attendances->status == 'Sakit' ? 'selected' : '' }}>Sakit
                                </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>

    </div>
@endsection
