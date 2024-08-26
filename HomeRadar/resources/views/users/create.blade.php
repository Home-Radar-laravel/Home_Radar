@extends('layout/side-menu')

@section('subhead')
    <title>Create New User - Your App</title>
@endsection

@section('subcontent')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back </a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('route' => 'users.store', 'method' => 'POST', 'id' => 'user-form')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password', 'class' => 'form-control')) !!}
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {!! Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row mg-b-20">
            <div class="col-xs-12 col-md-12">
                <div class="form-group">
                    <label class="form-label">Role</label>
                    {!! Form::select('role_id', $roles->mapWithKeys(function ($role) {
                        return [$role->id => $role->id == 1 ? 'Admin' : ($role->id == 2 ? 'User' : ($role->id == 3 ? 'Employee' : 'Unknown'))];
                    }), null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" id="edit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('user-form').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submits the form after confirmation
                    Swal.fire(
                        'Submitted!',
                        'The user has been created.',
                        'success'
                    ).then(() => {
                        window.location.href = "{{ route('users.index') }}"; // Redirects to index page after submission
                    });
                }
            });
        });
    </script>
@endsection
