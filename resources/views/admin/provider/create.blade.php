@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">Add new provider</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('providers.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="card-body ">
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" id="inputEmail3"
                                           placeholder="Name" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" id="inputEmail3"
                                           placeholder="email" value="{{old('email')}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" id="inputEmail3"
                                           placeholder="Password" value="{{old('password')}}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">User Name</label>
                                <div class="col-sm-10">
                                    <input name="user_name" type="text"
                                           class="form-control @error('user_name') is-invalid @enderror" id="inputEmail3"
                                           placeholder="Password" value="{{old('user_name')}}">
                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary form-control">Add</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
