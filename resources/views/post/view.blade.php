@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Post Name</label>
                <input type="text" class="form-control" id="post_mame" name="post_name" value="{{ $post->post_name }}"
                    aria-describedby="emailHelp" placeholder="Post Name" readonly>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea name="desc" id="desc" class="form-control" rows="10" readonly>
                       {{ $post->description }}
                </textarea>
            </div>
        </div>
    </div>
</div>
@endsection