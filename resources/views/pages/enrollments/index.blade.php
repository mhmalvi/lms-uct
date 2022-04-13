<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Enrollment form - UCT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors/switch.css') }}" />
    <!-- Color Alternatives -->
    <style>
        .form-group {
            margin: 1rem auto;
        }

        .wizard-forms .card {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .actions li span,
        .actions li button {
            height: 50px;
            width: 95px;
            line-height: 52px;
            font-size: 15px;
        }

        textarea {
            min-height: 90px;
        }

    </style>

    </link>
</head>

<body>
    <div class="clearfix"></div>
    <div class="wrapper">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-4">
                    <div class="steps-area steps-area-fixed">
                        <div class="image-holder"><img src="{{ asset('assets/img/side-img.jpg') }}" alt="" /></div>
                        <div class="steps clearfix">
                            <ul class="tablist multisteps-form__progress">
                                <li class="multisteps-form__progress-btn js-active current"><span>1</span></li>
                                <li class="multisteps-form__progress-btn"><span>2</span></li>
                                <li class="multisteps-form__progress-btn last"><span>3</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form class="multisteps-form__form" action="{{ route('enrollment.store') }}" id="wizard" method="POST">
                        @csrf
                        <div class="form-area position-relative">
                            <!-- div 1 -->
                            @include('pages.enrollments.step1')
                            <!-- div 2 -->
                            @include('pages.enrollments.step2')
                            <!-- div 3 -->
                            @include('pages.enrollments.step3')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/conditionize.flexible.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/wizard-main.js') }}"></script>
    <script src="{{ asset('assets/js/switch.js') }}"></script>
    <script>
        $("#files").change(function() {
            filename = this.files[0].name;
            // console.log(filename);
        });

        function UploadFile() {
            var reader = new FileReader();
            var file = document.getElementById("attach").files[0];
            reader.onload = function() {
                document.getElementById("fileContent").value = reader.result;
                document.getElementById("filename").value = file.name;
                document.getElementById("wizard").submit();
            };
            reader.readAsDataURL(file);
        }

        $(document).ready(function() {
            $(".conditional").conditionize();
        });
    </script>
</body>

</html>
