<h2>hello {{$user->name}}</h2>

<div class="">
<h2>you created {{$post->title}}</h2>
<p>{{$post->body}}</p>

<img class="w-[15rem]" src="{{$message->embed(('storage/'.$post->image))}}" alt="">
</div>