@extends('layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
    <section class="col-12 color-black pt-0 pb-3 pl-2 pr-2">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title mt-2">Kelola Obat</h1>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('obat.create') }}" class="btn btn-outline-primary pr-3 pl-3"></i>Tambah Obat</a>
                </div>
            </div>

            <div class="card-body">
                <table id="tableeu" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                            <th>Deskripsi Obat</th>
                            <th>Lihat</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obats as $obat)
                        <tr>
                            <td>{{ $obat->kode }}</td>
                            <td>{{ $obat->nama }}</td>
                            <td>{{ $obat->harga }}</td>
                            <td>{{ $obat->deskripsi }}</td>
                            <td>
                                <a href="{{ route('obat.show', $obat->id) }}" class="btn btn-outline-primary btn-block mr-2">Lihat</a>
                            </td>
                            <td>
                                <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-outline-info btn-block mr-2">Edit</a>
                            </td>
                            <td>
                                <button
                                    class="btn btn-outline-danger btn-block"
                                    onclick="
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$obat["id"]}}').submit();
                                    "
                                > Hapus
                                </button>
                            </td>
                            <form id="delete-form-{{$obat->id}}" action="{{ route('obat.destroy', $obat->id) }}" method="POST" style="display: none;">
                                @method('delete')
                                @csrf
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script src="{{asset('assets/adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(document).ready(function()
        {
            $("#tableeu").DataTable({
                "aLengthMenu": [[10],[10]],
                "paging": 5,
                "sScrollX": "100%",
                "sScrollXInner": "100%",
                "language":
                {
                    "zeroRecords": "Obat tidak ditemukan",
                    "infoEmpty": "Obat tidak ditemukan",
                    "search": "Cari obat",
                    "info": "Halaman <b>_PAGE_</b>",
                    "infoFiltered": "",
                    "paginate":
                    {
                        "previous": "<<",
                        "next": ">>"
                    }
                }
            });
        });
    </script>
@endsection
