<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="api-base-url" content="{{ URL::to('/') }}" />
    <title>Enroll Now</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <div class="bg-light">
        <div class="container" id="enrollment">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/uct-logo.png') }}" class="p-3" width="180">
                    </div>

                    <form-component></form-component>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/enrollment.js') }}" defer></script>
</body>
</html>