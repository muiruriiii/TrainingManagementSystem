@include('templates.descriptionNavbar')

<h3 id="heading"></h3>
<div class="float-container">
        <img class="float-child" src="{{$courses->courseProfile}}" alt="Course Profile"/>
        <div class="float-child2">
            <div class="">
                <p class="text-left font-weight-bold text-dark"> Course Name: {{$courses->courseName}}
                </p>
                <p class="text-left text-dark">
                    Description: {{$courses->courseDescription}}
                </p>
                <p class="text-left" style="color: rgb(160,82,45);font-weight: bold;">Price: 25 USD | 3,202.50 KSH </p>

                <div class="col col-md-11 text-right">
                    <span style="display: inline-block"><button class="buttondesc"><a style="color: #fff;" href="{{url ('/mpesaPayment/'.$courses->id)}}"><b>Make Payment</b></a></button></span>
                </div>
            </div>
        </div>
        <table>
            <tr>
                <th>Leeson No </th>
                <th>Lesson Name</th>
            </tr>
            @if(count($coursetopics) > 0 )
                @foreach($coursetopics as $coursetopic)
                    <tr>
                        <td>{{ $coursetopic-> topicNumber }}</td>
                        <td>{{ $coursetopic-> topicName }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"class="text-center"><b>No Topics Currently Available</b></td>
                </tr>
            @endif
        </table>
    </div>
</div>


