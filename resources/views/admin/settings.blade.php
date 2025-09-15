@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Edit Pengaturan Desa</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Desa</label>
                            <input type="text" name="nama_desa" class="form-control"
                                value="{{ $settings['nama_desa'] ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat_desa" class="form-control"
                                value="{{ $settings['alamat_desa'] ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label>Visi</label>
                            <textarea name="visi" class="form-control" rows="3">{{ $settings['visi'] ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Misi</label>
                            <textarea name="misi" class="form-control" rows="3">{{ $settings['misi'] ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Sambutan Kepala Desa</label>
                            <textarea name="sambutan_kepala" class="form-control" rows="5">{!! $settings['sambutan_kepala'] ?? '' !!}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Sejarah</label>
                            <textarea name="sejarah" class="form-control" rows="4">{{ $settings['sejarah'] ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Struktur Organisasi (gambar)</label><br>
                            @if (isset($settings['struktur_organisasi']))
                                <img src="{{ asset('storage/' . $settings['struktur_organisasi']) }}" alt="Struktur"
                                    class="mb-2 img-fluid" style="max-height:300px;"><br>
                            @endif
                            <input type="file" name="struktur_organisasi" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>logo (gambar)</label><br>
                            @if (isset($settings['logo']))
                                <img src="{{ asset('storage/' . $settings['logo']) }}" alt="logo" class="mb-2 img-fluid"
                                    style="max-height:300px;"><br>
                            @endif
                            <input type="file" name="logo" class="form-control">
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Script CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor.create(document.querySelector('textarea[name="sambutan_kepala"]'))
                .then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('color', 'black', editor.editing.view.document.getRoot());
                    });
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor.create(document.querySelector('textarea[name="visi"]'))
                .then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('color', 'black', editor.editing.view.document.getRoot());
                    });
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor.create(document.querySelector('textarea[name="misi"]'))
                .then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('color', 'black', editor.editing.view.document.getRoot());
                    });
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor.create(document.querySelector('textarea[name="sejarah"]'))
                .then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('color', 'black', editor.editing.view.document.getRoot());
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
