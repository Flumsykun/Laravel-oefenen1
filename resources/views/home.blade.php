<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@auth
    <p>Hi, {{ auth()->user()->name }}</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    <div style="border: 3px solid black">
        <h2>Create a new post</h2>
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <input name="title" type="text" placeholder="title">
            <textarea name="body" placeholder="bodycontent..."></textarea>
            <button>Save Post</button>
        </form>
    </div>

    <div style="border: 3px solid black">
        <h2>All posts</h2>
        @foreach($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                <p>Created at: {{$post->created_at ? $post->created_at->format('Y-m-d H:i:s') : 'N/A'}}</p>                <p>{{$post['body']}}</p>
                <p><a href="{{route('post.edit', compact('post'))}}">Edit</a></p>
                <form action="{{route('post.destroy', compact('post'))}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>
            </div>
        @endforeach
    </div>
@else
    <div style="border: 3px solid black">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 3px solid black">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>
@endauth
</body>
</html>
