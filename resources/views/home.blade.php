<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
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

    <form action="{{ route('home') }}" method="GET">
        <label class="Inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true" for="sort">Sort by:</label>
        <select name="sort" id="id" onchange="this.form.submit()">
            @foreach($sortOptions as $key => $option)
                <option value="{{ $key }}" {{ $sort === $key ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        </select>
    </form>
    <div class="p-5 bg-white dark:bg-gray-900 antialiased grid justify-items-center flex flex-col space-y-4 ">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">All Posts</h5>
        @foreach($posts as $post)
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> {{$post['title']}}
                        by {{$post->user->name}}</h3>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> Created
                        at: {{$post->created_at ? $post->created_at->format('d-m-Y H:i:s') : 'N/A'}}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post['body']}}</p>
                    @if(auth()->check() && auth()->user()->id === $post->user->id)
                        <p class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            <a href="{{route('post.edit', ['post' => $post])}}">Edit</a></p>
                    @endif
                    @if(auth()->check() && auth()->user()->id === $post->user->id)
                        <form action="{{route('post.destroy', compact('post'))}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="submit">delete
                            </button>
                        </form>
                @endif
            </div>
        @endforeach
    </div>
@else
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create
                            an Account</h2>
                    </div>
                    <form class="space-y-6" action="/register" method="POST">
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                @csrf
                                <input autocomplete="off" name="name" type="text"
                                       class="flex w-full leading-6 text-black block text-sm font-medium leading-6 text-gray-900"
                                       placeholder="name"/>
                                <input name="email" type="text"
                                       class="flex w-full leading-6 text-black block text-sm font-medium leading-6 text-gray-900"
                                       placeholder="email">
                                <input name="password" type="password"
                                       class="flex w-full leading-6 text-black block text-sm font-medium leading-6 text-gray-900"
                                       placeholder="password" placeholder="password">
                                <button
                                    class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex items-center mt-15">
                    <div class="border-t border-2 border-gray-400 flex-grow"></div>
                    <div class="px-3 text-gray-800 font-bold text-sm">OR</div>
                    <div class="border-t border-2 border-gray-400 flex-grow"></div>
                </div>
                <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-auto" width="50"
                             height="52"
                             viewBox="0 0 50 52"><title>Logomark</title>
                            <path
                                d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z"
                                fill="#FF2D20" fill-rule="evenodd"/>
                        </svg>
                        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                            Sign in to your
                            account</h2>
                    </div>
                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form class="space-y-6" action="/login" method="POST">
                            @csrf

                            <input
                                class="flex w-full leading-6 text-black block text-sm font-medium leading-6 text-gray-900"
                                name="loginname" type="text"
                                placeholder="name">
                            <input class="flex w-full block text-sm font-medium leading-6 text-gray-900"
                                   name="loginpassword"
                                   type="password" placeholder="password">
                            <button
                                class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Log in
                            </button>
                        </form>
@endauth
</body>
</html>
