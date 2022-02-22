<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <form action="{{ route('trigger') }}" method="post" id="exampleForm">
        @csrf
        <input type="text" name="text" id="text">
        <input type="submit" value="Triger">
    </form>

    <div id="div-data"></div>

    <script>
        $("#exampleForm").on('submit', function(e) {

            e.preventDefault();
            console.log("submit");

            var data = {
                "_token": "{{ csrf_token() }}",
                text: $("#text").val(),
            };

            $.ajax({
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // }
                    type: 'POST',
                    url: '/trigger',
                    data: JSON.stringify(data),
                    contentType: 'application/json'
                })
                .done(function(res) {
                    console.log(JSON.stringify(res));
                    document.querySelector('#div-data').innerHTML = JSON.stringify(res);
                })
                .fail(function(error) {
                    console.log('Oops... ' + JSON.stringify(error.responseJSON));
                })
                .always(() => console.log("The request is over !"));
        });

        // sendData = () => {
        //     $.ajax({
        //             type: 'POST',
        //             url: 'https://your-api.com/authentication',
        //             data: JSON.stringify(data),
        //             contentType: 'application/json'
        //         })
        //         .done(function(res) {
        //             alert(JSON.stringify(res));
        //         })
        //         .fail(function(error) {
        //             alert('Oops... ' + JSON.stringify(error.responseJSON));
        //         })
        //         .always(() => alert("The request is over !"));
        // }
    </script>
</body>

</html>
