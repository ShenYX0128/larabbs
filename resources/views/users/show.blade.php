@extends('layouts.app')
@section('title',$user->name.'的个人中心')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
      <div class="card">
        <img src="https://laravel-china.org/uploads/images/201709/20/1/PtDKbASVcz.png" alt="{{ $user->name }}" width="255px" height="255px">
        <div class="card-body">
          <h5><strong>个人简历</strong></h5>
          <p>一个乐观向上的码农</p>
          <hr>
          <h5><strong>注册于</strong></h5>
          <p>today</p>
        </div>
      </div>

    </div>
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="card">
          <div class="card-body">
            <h1 class="mb-0" style="font-size: 22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
          </div>
        </div>
        <hr>

        {{-- 用户发布内容 --}}
        <div class="card">
          <div class="card-body">
            暂无数据 ~_~
          </div>
        </div>
      </div>
</div>
@endsection