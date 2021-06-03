@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="text-success">{{ Session::get('success') }}</div>
            @endif
            <form method="post" action="{{ route('store') }}">
                @csrf
                {{-- {{ csrf_field() }} --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Name</label>
                    <input type="text" class="form-control" id="post_mame" name="post_name" value="{{ old('post_name') }}" aria-describedby="emailHelp"
                        placeholder="Post Name">
                    @if ($errors->first('post_name'))
                        <div class="text-danger">{{ $errors->first('post_name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                   <textarea name="desc" id="desc" class="form-control" rows="10">
                       {{ old('desc') }}
                   </textarea>
                   @if ($errors->first('desc'))
                   <div class="text-danger">{{ $errors->first('desc') }}</div>
               @endif
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection