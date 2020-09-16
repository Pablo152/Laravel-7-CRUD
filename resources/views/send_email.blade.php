@extends('base')
@section('main')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Send PDF of table as email.</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form method="POST" action=" {{ url('sendemail/send') }}">
            @csrf
            <div class="form-group">
                <label for="email">Please enter your email:</label>
                <input type="text" class="form-control" name="email"/>
            </div>
            <button type="submit" class="btn btn-primary">Send email</button>
        </form>
    </div>
</div>
@endsection
