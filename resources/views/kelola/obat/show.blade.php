@extends('layouts.dashboard')

@section('css')
@endsection

@section('content')
    <section class="col-12 color-black pt-0 pb-3 pl-2 pr-2">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title mt-2">Detil Obat</h1>
            </div>

            <div class="card-body" >
                <form>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label>Kode Obat</label>
                            <input readonly autocomplete="off" type="text" name="kode" class="form-control" placeholder="Masukkan kode obat" value="{{ $obat->kode }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label>Nama Obat</label>
                            <input readonly autocomplete="off" type="text" name="nama" class="form-control" placeholder="Masukkan nama obat" value="{{ $obat->nama }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label>Harga Obat</label>
                            <input readonly autocomplete="off" type="text" name="harga" class="form-control" placeholder="Masukkan harga obat" value="{{ $obat->harga }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label>Deskripsi Obat</label>
                            <input readonly autocomplete="off" type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi obat" value="{{ $obat->deskripsi }}">
                        </div>
                    </div>
                    <a href="{{ route('obat.index') }}" class="btn btn-sm btn-outline-primary mt-3 mr-3 pt-2 pb-2 pr-4 pl-4 float-right">Kembali</a>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@endsection
