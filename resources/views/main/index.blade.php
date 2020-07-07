
@extends('layouts.main')

@section('content')

            <p style="align-items: center; text-align: center" class="h2">Welcome on Pro dance</p>

            <br>
<div class="col-md-2 ">
            <div class="card text-center">
                <h5 class="card-header-xl">Категорії</h5>
            </div>
</div>
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-sm-2" value="{{$category->id}}">
                    {{$category->name}}
                    </div>
                    @endforeach
                </div>


 @endsection




