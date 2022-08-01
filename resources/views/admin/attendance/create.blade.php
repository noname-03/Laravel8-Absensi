@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Admin</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                <p></p>
            </div>
            <form action="{{ route('admin.attendances.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Pertemuan</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Masukan Pertemuan"
                                name="pertemuan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Kelas</label>
                            <select id="inputState" name="class_education_id" class="form-control">
                                <option selected>Choose...</option>
                                @foreach ($class as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <input type="Checkbox" hidden="hidden" name="user_id[]" checked="checked"
                                                value="{{ $item->id }}">
                                            <select name="status[]" class="form-control">
                                                <option value="Hadir">Hadir</option>
                                                <option value="Alfa">Alfa</option>
                                                <option value="Sakit">Sakit</option>
                                            </select>
                                            {{-- </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>

    </div>

    </div>
@endsection
