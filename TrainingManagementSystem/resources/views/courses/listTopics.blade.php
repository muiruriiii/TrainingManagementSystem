@include('templates.sideBar')

<div class="topicContainer text-center">
@foreach($coursetopics as $coursetopic)

    <div class="topiclist">

        <a href="{{url ('/topicContent/'.$coursetopic->id)}}">
            <h3>Topic {{ $coursetopic-> topicNumber }} :
            {{ $coursetopic-> topicName }}</h3>
        </a>
        <span>
             <a href="{{url('courseNotes/'.$coursetopic->id)}}">
                 <input type="checkbox">
                 Notes
             </a>
        </span>
        <span>
            <a href="{{url('courseVideos/'.$coursetopic->id)}}">
                 <input type="checkbox">
                Videos
            </a>
        </span>
    </div>
    <div class="topiclist">
        <h4>Print certificate</h4>
    </div>
@endforeach
</div>

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
