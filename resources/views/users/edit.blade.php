@extends('layouts.app')
@section('ttitle',$user->name.'的个人资料编辑')
@section('content')
<div class="container">
  <div class="col-md-8 offset-md-2">
    <div class="card">
      <div class="card-header">
        <h4 class="">
          <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
        </h4>
      </div>

      <div class="card-body">
        @include('shared._error')
        <form action="{{ route('users.update',$user->id) }}" method="Post" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label for="name-field">用户名</label>
            <input type="text" name="name" class="form-control" id="name-field" value="{{ old('name',$user->name) }}">
          </div>

          <div class="form-group">
            <label for="email-field">邮箱</label>
            <input type="text" name="email" class="form-control" id="email-field" value="{{ old('email',$user->email) }}">
          </div>

          <div class="form-group">
            <label for="introduction-field">个人简介</label>
            <textarea name="introduction" class="form-control" id="introduction-field" rows="3">{{ old('introduction',$user->introduction) }}</textarea>
          </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
