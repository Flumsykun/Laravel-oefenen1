<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Show all posts</h2>
{{--    @foreach($posts as $post)--}}
        <div style="background-color: gray; padding: 10px; margin: 10px;">
            <h3>{{$post['title']}} by {{$post->user->name}}</h3>
            <p>{{$post['body']}}</p>
            <p><a href="{{route('post.edit', ['post' => $post])}}">Edit</a></p>
            <form action="{{route('post.destroy', compact('post'))}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>
            <a href="{{route ('home')}}">Terug naar home</a>
        </div>
{{--    @endforeach--}}
</body>
</html>
