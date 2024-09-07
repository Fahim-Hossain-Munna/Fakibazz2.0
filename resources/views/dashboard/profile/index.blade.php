@extends('layouts.dashboardmaster')

@section('content')

<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Username</h4>
                <form action="{{ route('profile.username') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label for="inputEmail4" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="inputEmail4" placeholder="Name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection


@section('script')

@if (session('name_update'))

<script>
    Swal.fire("{{ session('name_update') }}");
</script>

@endif

@endsection

