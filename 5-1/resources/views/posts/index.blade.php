@extends('layouts.app')
@section('content')
<div class="mx-auto" style="width: 400px;">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ホーム</li>
            <li class="list-group-item">
                <form action="{{route('posts.store')}}"  method="post">
                @csrf
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="md-3">
                        <input type="text" name="body" class="form-control" placeholder="いまどうしてる？">
                    </div>
                    <br>
                    <div class="d-flex flex-row-reverse">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="submit" class="btn btn-info" value="つぶやく">
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <br>
    <ul class="list-group">
      @foreach($posts as $post)
      <li class="list-group-item">
          <div class="d-flex justify-content-between">
             <b>{{ $users->find($post->user_id)->name }}</b>
             <div>{{ $post->created_at }}</div>
          </div>
          <br>
          <div>{{ $post->body}}</div>
          <div class="d-flex flex-row-reverse">
          @if($users->find($post->user_id)->id === Auth::user()->id)
              <a href="{{route('posts.destory', ['id' => $post->id])}}" class="btn btn-danger btn-sm">削除</a>
          @endif
          </div>
      </li>
      @endforeach
      
    </ul>
</div>

@endsection