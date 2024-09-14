@extends('layouts.dashboardmaster')

@section('content')


<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Category Edit</h4>

                <form role="form" action="{{ route('category.update',$omar->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Category Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Category Title" name="title" value="{{ $omar->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Category Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="Category Slug" name="slug" value="{{ $omar->slug }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <img id="montrimosai" src="{{ asset('uploads/category') }}/{{ $omar->image }}" alt="" style="width: 100%; height:300px; object-fit:contain;">
                    </div>
                    <div class="row mb-2">
                        <label for="inputPassword5" class="col-sm-3 col-form-label">Category Image</label>
                        <div class="col-sm-9">
                            <input onchange="document.querySelector('#montrimosai').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="inputPassword5"  name="image">
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="justify-content-end row">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
