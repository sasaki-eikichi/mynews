@extends('layouts.profile')
@section('title', 'Myプロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <input id="gender-m" type="radio"  name="gender" value='male' {{ $profile_form->gender == 'male' ? 'checked' : ''}}>
                            <label for="gender-m">男性</label>
                            <input id="gender-f" type="radio"  name="gender" value='male' {{ $profile_form->gender == 'male' ? 'checked' : ''}}>
                            <label for="gender-f">女性</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                        <textarea class="form-control" name="hobby" rows="20">{{ $profile_form->hobby }}</textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->hobby }}</textarea>
                        </div>
                      </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection