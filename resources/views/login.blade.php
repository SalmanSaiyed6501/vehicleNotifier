<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SFHS - Vehicle Management</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('cms/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('cms/css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('cms/css/demo.css') }}">
	<link rel="icon" type="image/x-icon" href="{{asset('cms/img/schoolLogo.png')}}" >
</head>
<body style="background: #1D4533;">
    <div class="container">
        <div class="row justify-center align-items-center">
            <div class="col-md-5 col-sm-12 card mt-5 mx-auto p-4 rounded">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{asset('cms/img/schoolLogo.png')}}" height="50" width="50">&nbsp;&nbsp;
                    <div>
                        <h5 class="m-0 text-danger"><b>St. Francis' High School, Vapi</b></h5>
                        <h6 class="m-0 text-warning"><b>Vehicle Documents Management</b></h6>
                    </div>
                </div>
                <hr class="hr" />
                <form action="{{ route('vehicle.authenticate') }}" method="POST">
                    @csrf
                    <label for=""><h6>Email</h6></label>
                    <input type="email" name="email" class="form-control mb-4" required>
                    <label for=""><h6>Password</h6></label>
                    <input type="password" name="password" class="form-control mb-4" required>
                    <label for=""><h6>Session</h6></label>
                    <select name="session" class="form-control">
                        @foreach ( $session as $value)
                        <option value="{{ $value->id }}">{{ $value->session }}</option>
                        @endforeach
                    </select>
                    <hr class="hr" />
                    <div style="text-align: end;">
                        <button type="submit" class="btn text-white p-2" style="background: #450C3F;"><h6 class="m-0">Login</h6></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('cms/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('cms/js/core/popper.min.js') }}"></script>
<script src="{{ asset('cms/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('cms/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('cms/js/ready.min.js') }}"></script>
<script src="{{ asset('cms/js/demo.js') }}"></script>
<script>
    $(document).ready(function () {

        const successMessage = @json(session('success'));
        const errorMessage = @json(session('error'));

        if (successMessage) {
            $.notify({
                message: successMessage,
                title: "Success",
                icon: "la la-check-circle"
            }, {
                type: "success",
                placement: {
                    from: "top",
                    align: "right"
                },
                time: 1200
            });

            setTimeout(function () {
                window.location.href = "/";
            }, 1300);
        }

        if (errorMessage) {
            $.notify({
                message: errorMessage,
                title: "Error",
                icon: "la la-times-circle"
            }, {
                type: "danger",
                placement: {
                    from: "top",
                    align: "right"
                },
                time: 1000
            });
        }

    });
</script>

</html>