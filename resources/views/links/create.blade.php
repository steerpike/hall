<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Link</title>
</head>
<body>
    <h1>Create a Link</h1>
    <form action="/links" method="post">
        {{ csrf_field() }}
        <div>
            <input type="text" name="title" id="title" placeholder="title">
        </div>
        <div>
            <input type="text" name="url" id="url" placeholder="url">
        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit">Create Link</button>
        </div>
    </form>
</body>
</html>