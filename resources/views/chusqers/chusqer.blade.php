<div class="card @isset($user) @if($user->id == $chusqer->user_id) mine @endif @endisset">
    <div class="card-divider">
        <p>Añadido por <a href="/{{ $chusqer->user->slug }}">{{ $chusqer->user->name }}</a> - <a href="{{ url('/') }}/chusqers/{{ $chusqer['id'] }}">Leer más</a></p>
    </div>
    <p class="chusqer-content">
        <img src="{{ $chusqer->image }}" alt="">{{ $chusqer->content }}
    </p>
    <p class="chusqer-hashtags text-right">
        @foreach($chusqer->hashtags as $hashtag)
            <a href="/hashtag/{{ $hashtag->slug }}"><span class="label label-primary">{{ $hashtag->slug }}</span></a>
        @endforeach
    </p>


    <div class="card-section">
        <a href="{{ route('chusqer.like', array('user' => Auth::user(),'chusqer' => $chusqer)) }}" class="button warning"><img src="@if(session('dislike'))http://www.levadura.agency/images/icon-corazon.png @else http://www.muskelgesellschaft.ch/wp-content/uploads/2017/10/heart-157895_960_720.png @endif" alt="" width="20" height="20"></a>
        <p>Total Likes: <strong>@if ($chusqer->likes()->count() == 0)No tiene Likes @else <a href="{{route('users.like',array('chusqer' => $chusqer))}}">{{$chusqer->likes()->count()}} </a>@endif </strong></p>

        @if(session('dislike'))

            <p style="background-color: red; color: white;">{{session('dislike')}}</p>

        @elseif(session('like'))
            <p style="background-color: green; color: white;">{{session('like')}}</p>

        @endif
    </div>


    @if(Auth::user() && Auth::user()->amI())
    <div class="card-section">
        @can('update', $chusqer)
            <a href="{{ Route('chusqers.edit', $chusqer) }}" class="button warning">Editar</a>
        @endcan









        @can('delete', $chusqer)
        <form action="{{ Route('chusqers.delete', $chusqer->id) }}" method="POST" id="chusqer-actions-buttons">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="button alert">Borra</button>

        </form>
        @endcan
    </div>

    @endif
</div>