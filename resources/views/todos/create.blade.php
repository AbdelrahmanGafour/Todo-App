@extends('layouts.app')

@section('title','Create Todo')

@section('content')
    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Create a new todo</h1>
                    </div>
                    <div class="card-body">
                        <form action="/create" method="POST">
                            @csrf
                            {{--                                     Form Error   --}}
                            {{--                                @if ($errors->any())--}}
                            {{--                                    <div class="alert alert-danger">--}}
                            {{--                                        <ul>--}}
                            {{--                                            @foreach ($errors->all() as $error)--}}
                            {{--                                                <li>{{ $error }}</li>--}}
                            {{--                                            @endforeach--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                @endif--}}
                            <div class="form-group">
                                @error('todoTitle')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control @error('todoTitle') is-invalid @enderror" name="todoTitle" value="{{old('todoTitle')}}" placeholder="Enter todo Title">
                            </div>

                            <div class="form-group">
                                @error('todoDescription')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <textarea class="form-control @error('todoDescription') is-invalid @enderror" name="todoDescription" value="{{old('todoDescription')}}" placeholder="Enter description of your todo" rows="3"></textarea>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" style="width: 40%">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
