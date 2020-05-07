<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Channel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <ul>

            </ul>

            <form action="">
                <select name="" id="">

                    @foreach($channels as $channel)
                    <option value="{{$channel->id}} "> {{$channel->name}} </option>
                    @endforeach
                </select>
            </form>


        </div>
    </div>
</body>

</html>