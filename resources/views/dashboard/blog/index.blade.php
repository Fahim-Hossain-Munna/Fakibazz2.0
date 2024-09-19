@extends('layouts.dashboardmaster')


@section('title')
Blog
@endsection


@section('content')

<x-breadcum munna="Blog's Show Page"></x-breadcum>


<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                  <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($blogs as $blog)
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img
                              src="{{ asset('uploads/blog') }}/{{ $blog->thumbnail }}"
                              alt=""
                              style="width: 45px; height: 45px"
                              class="rounded-circle"
                              />
                          <div class="ms-3">
                            <p class="fw-bold mb-1">{{ $blog->title }}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="fw-normal mb-1">{!! $blog->description  !!}</p>
                      </td>
                      <td>
                        <form id="abubokorkharap{{ $blog->id }}" action="{{ route('category.status',$blog->id) }}" method="POST">
                            @csrf
                        <div class="form-check form-switch">
                            <input onchange="document.querySelector('#abubokorkharap{{ $blog->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $blog->status == 'active' ? 'checked' : '' }}>
                          </div>
                        </form>
                      </td>
                      <td>
                        <a href="{{ route('category.edit',$blog->slug) }}" class="btn btn-link btn-sm btn-rounded text-info">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="{{ route('category.destroy',$blog->slug) }}" class="btn btn-link btn-sm btn-rounded text-danger">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                      </td>
                    </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-danger text-center">categories not found!!</td>
                        </tr>

                  @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection


@section('script')

@if (session('success'))

<script>
   Toastify({
  text: "{{ session('success') }}",
  duration: 3000,
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  onClick: function(){} // Callback after click
}).showToast();
</script>

@endif


@endsection
