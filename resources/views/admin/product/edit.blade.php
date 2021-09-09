@extends('layouts.app', ['tittle' => 'Edit Produk'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold">
                            <i class="fas fa-shopping-bag"></i> Edit PRODUK
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">GAMBAR</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">NAMA PRODUK</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Masukan Nama Produk" value="{{ old('title', $product->title) }}">
                                @error('title')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">KATEGORI</label>
                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                            <option value="" selected disabled>-- Pilih Kategori --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">BERAT (Gram)</label>
                                        <input type="number" name="weight" class="form-control @error('weight') is-invalid @enderror"
                                        value="{{ old('weight', $product->weight) }}" placeholder="Berat Produk (Gram)">
                                        @error('weight')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">DESKRIPSI</label>
                                <textarea name="content" id="" cols="30" rows="10"
                                class="form-control content @error('content') is-invalid @enderror"
                                placeholder="Deskripsi Produk">{{ old('content', $product->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">HARGA</label>
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Harga Produk" value="{{ old('price', $product->price) }}">
                                        @error('price')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">DISKON (%)</label>
                                        <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror"
                                        placeholder="Diskon Produk (%)" value="{{ old('discount', $product->discount) }}">
                                        @error('discount')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i class="fa fa-paper-plane"></i> UPDATE
                            </button>
                            <button class="btn btn-warning" type="reset">
                                <i class="fa fa-redo"></i> RESET
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        let editor_config ={
            selector: "textarea-content",
            pluggins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insetfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
        };
        tinymce.init(editor_config);
    </script>
@endsection