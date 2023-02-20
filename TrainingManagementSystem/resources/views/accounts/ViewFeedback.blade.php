@include('templates.dashboardSideBar')
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />


</head>
<body>

<h3 style="color: rgb(160,82,45);" id="heading"> User Feedback </h3>
<h3 style="color: rgb(160,82,45);" id="heading"> All |<a id="heading" href="ViewTrashedFeedback"> Trashed </a> </h3>

<table>
    <tr>
        <th>Email</th>
        <th>Feedback</th>
        <th>Status</th>
        <th colspan="2">Action</th>
    </tr>
    @if(count($feedback) > 0 )
        @foreach($feedback as $feedback)
            <tr>
                <td>{{ $feedback-> email }}</td>
                <td>{{ $feedback-> feedback }}</td>
                <td>{{ $feedback-> status }}</td>
                <td><a class="editbutton" href="{{url ('EditFeedback/'.$feedback->id) }}">Edit</a></td>
                <td><a class="deletebutton" href="{{url ('DeleteFeedback/'.$feedback->id) }}">Delete</a></td>

            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6"class="text-center"><b>No Testimonials Made</b></td>
        </tr>
    @endif
</table>
{{--<div class="d-flex justify-content-center">--}}
{{--    --}}{{--    To display on each side of the selected page if the pages are too many--}}
{{--    {{$feedback->onEachSide(1)->links()}}--}}
{{--</div>--}}
</body>
</html>
