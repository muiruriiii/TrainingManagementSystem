@include('templates.sideBar')

<div class="topicContainer text-center">
    <center>
        <h5 style="color: black; padding: 10px;">You are eligible to get a certificate. To access it make sure you have completed the course and check the 'complete course' checkbox below! </h5>
    <input type="checkbox" id="option-all" onchange="checkAll(this)"> Completed Course
    </center>
@foreach($coursetopics as $coursetopic)
    <div class="topiclist">
        <a href="{{url ('/topicContent/'.$coursetopic->id)}}">
            <h3>Topic {{ $coursetopic-> topicNumber }} :
            {{ $coursetopic-> topicName }}</h3>
        </a>
        <span>
             <a href="{{url('courseNotes/'.$coursetopic->id)}}">
                   <input type="checkbox" id="notes">
                 Notes
             </a>
        </span>
        <span>
            <a href="{{url('courseVideos/'.$coursetopic->id)}}">
                   <input type="checkbox" id="videos">
                Videos
            </a>
        </span>
    </div>

@endforeach
    <button disabled="true" id="btn">
            <a href="{{url('certificate/'.$courseID)}}" @click.prevent="printCertificate" target="_blank">
                Print Certificate
            </a>
    </button>
</div>
<script>
    var checkboxes = document.querySelectorAll("input[type = 'checkbox']");
    var btn = document.getElementById("btn");
    function checkAll(myCheckbox) {
        //If checkbox is checked
        if(myCheckbox.checked == true){
            checkboxes.forEach(function (checkbox){
                checkbox.checked = true;
                btn.removeAttribute("disabled");
            });
            window.alert("You have successfully completed the course!\n You can proceed to print your certificate!");
            {{--setTimeout(function(){location.href="{{url('certificate/'.$courseID)}}" } , 1000);--}}
            window.open("{{url('certificate/'.$courseID)}}", '_blank');
        }
        //If checkbox is not checked
        else{
            checkboxes.forEach(function (checkbox){
                checkbox.checked = false;
                btn.disabled = "true";
            });
        }

    }
</script>


{{--<div class="float-container">--}}
{{--    <div class="float-child">--}}
{{--        @foreach($coursetopics as $coursetopics)--}}
{{--        <div class="">--}}
{{--                <h3><b>Topic {{ $coursetopics-> topicNumber }} :--}}
{{--                {{ $coursetopics-> topicName }}</b></h3>--}}

{{--        <span>--}}
{{--            <a href="{{url('courseNotes/'.$coursetopics->id)}}">--}}
{{--             Notes--}}
{{--            </a>--}}
{{--        </span>--}}
{{--        <span>--}}
{{--            <a href="{{url('courseVideos/'.$coursetopics->id)}}">--}}
{{--                Videos--}}
{{--            </a>--}}
{{--        </span>--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}

{{--    <div class="float-child2">--}}
{{--        <div class="">--}}
{{--            <iframe class="pdf" src="{{asset($coursetopic->id)}}">--}}
{{--            </iframe>--}}
{{--        </div>--}}
{{--      {{$coursetopics->id}}--}}
{{--    </div>--}}

{{--</div>--}}

