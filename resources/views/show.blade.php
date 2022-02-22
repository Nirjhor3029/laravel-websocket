<!DOCTYPE html>

<html>

<head>

    <title>Laravel WebSocket Example</title>

</head>

<body>

    <h1>Laravel Sockets</h1>

    <div id="div-data"></div>

    <script src='{{ asset('/') }}/js/app.js'></script>

    <script>
        window.Echo.channel('Show')
            .listen('ShowEvent', (e) => {
                console.log(e)
                console.log(e.message);
                document.querySelector('#div-data').innerHTML = e.message
            })
        // window.Echo.channel('EventTriggered')
        //     .listen('GetRequestEvent', (e) => {
        //         console.log(e)
        //         console.log(e.message);
        //         document.querySelector('#div-data').innerHTML = e.message
        //     })
    </script>

</body>


</html>
