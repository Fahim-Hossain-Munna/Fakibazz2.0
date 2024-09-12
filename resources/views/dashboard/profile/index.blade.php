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

    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Email Address</h4>
                <form action="{{ route('profile.email') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="inputEmail4" placeholder="Email Address">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Profile Image</h4>
                <form action="{{ route('profile.image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label for="inputEmail4" class="form-label">Image</label>
                            <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="inputEmail4" placeholder="Email Address">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Password</h4>
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-2 col-md-12">
                            <label for="inputEmail4" class="form-label">Current Password</label>
                            <input name="c_password" type="password" class="form-control @error('c_password') is-invalid @enderror" id="inputEmail4">
                            @error('c_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2 col-md-12">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail4">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2 col-md-12">
                            <label for="inputEmail4" class="form-label">Password Confirmation</label>
                            <input name="password_confirmation" type="password" class="form-control" id="inputEmail4">

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

@if (session('email_update'))

<script>
   Toastify({
  text: "{{ session('email_update') }}",
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


@if (session('password_update'))

<script>
   Toastify({
  text: "{{ session('password_update') }}",
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


@if (session('image_update'))

<script>
   Toastify({
  text: "{{ session('image_update') }}",
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

