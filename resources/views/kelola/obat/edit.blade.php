@extends('layouts.dashboard')

@section('css')
@endsection

@section('content')
    <section class="col-12 color-black pt-0 pb-3 pl-2 pr-2">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title mt-2">Perbarui Obat</h1>
            </div>

            <div class="card-body" >
                <form id="form-update" action="{{ route('obat.update', $obat->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form-row mb-2">
                        <div class="col">
                            <label>Kode Obat</label>
                            <input autocomplete="off" type="text" name="kode" class="form-control" placeholder="Masukkan kode obat" value="{{ $obat->kode }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label>Nama Obat</label>
                            <input autocomplete="off" type="text" name="nama" class="form-control" placeholder="Masukkan nama obat" value="{{ $obat->nama }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label>Harga Obat</label>
                            <input autocomplete="off" type="text" name="harga" class="form-control" placeholder="Masukkan harga obat" value="{{ $obat->harga }}">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label>Deskripsi Obat</label>
                            <input autocomplete="off" type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi obat" value="{{ $obat->deskripsi }}">
                        </div>
                    </div>
                    <button id="submit-update" type="button" class="btn btn-sm btn-outline-primary mt-3 pl-3 pr-3 pt-2 pb-2 float-right">Simpan</button>
                    <a href="{{ route('obat.index') }}" class="btn btn-sm btn-outline-danger mt-3 mr-3 pl-3 pr-3 pt-2 pb-2 float-right">Batalkan</a>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('assets/adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function()
        {
            $('#submit-update').click(function(e)
            {
                e.preventDefault();
                if(form_update.valid())
                {
                    form_update.submit();
                }
            });

            let form_update = $("#form-update");
            form_update.validate(
            {
                rules:
                {
                    kode:
                    {
                        required: true
                    },
                    nama:
                    {
                        required: true
                    },
                    harga:
                    {
                        required: true,
                        number: true,
                        digits: true,
                    },
                    deskripsi:
                    {
                        required: true
                    }
                },
                messages:
                {
                    kode:
                    {
                        required: "Wajib diisi!"
                    },
                    nama:
                    {
                        required: "Wajib diisi!"
                    },
                    harga:
                    {
                        required: "Wajib diisi!",
                        number: "Harga harus berupa angka",
                        digits: "Harga tidak boleh negatif dan koma"
                    },
                    deskripsi:
                    {
                        required: "Wajib diisi!"
                    }
                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.next("label"));
                    }
                    else if(element.is('select')) {
                        error.insertAfter($(element).parent());
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    if($(element).is('select')){
                        $(element).parent().addClass("is-invalid").removeClass("is-valid");
                    }
                    else{
                        $(element).addClass("is-invalid").removeClass("is-valid");
                    }
                },
                unhighlight: function (element, errorClass, validClass) {
                    if($(element).is('select')){
                        $(element).parent().addClass("is-valid").removeClass("is-invalid");
                    }
                    else{
                        $(element).addClass("is-valid").removeClass("is-invalid");
                    }
                }
            });
        })
    </script>
@endsection
