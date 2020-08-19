@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ trans('message.cate')}}</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('message.ID')}}</th>
                            <th scope="col">{{ trans('message.Categories Name')}}</th>
                            <th scope="col">{{ trans('message.Parent ID')}}</th>
                            <th scope="col">{{ trans('message.Edit')}}</th>
                            <th scope="col">{{ trans('message.Delete')}}</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($catelist as $cate)
                        <tr>
                            <th scope="row">{{$cate->id}}</th>
                            <td>{{$cate->categories_name}}</td>
                            <td>{{$cate->parent_id}}</td>
                            <td ><a href="{{asset('categories/edit/'.$cate->id)}}"><input type="submit" name="submit" value="Edit" class="btn btn-primary" id="button"></a></td>
                            <td><a href="{{asset('categories/delete/'.$cate->id)}}"><input type="submit" name="submit" value="Delete" class="btn btn-primary" id="button"></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($catelist->hasPages())
                    {{ $catelist->links() }}
                @endif
            </div>
        </div>
    </div>
@stop
