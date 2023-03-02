@include('templates.sideBar')
<h3 id="heading"> {{$courses->courseName}} </h3>

@foreach($coursetopics as $coursetopic)
<div class="topiclist">
    <a href="{{url ('/topicContent/'.$coursetopic->id)}}">
        <h3>Topic {{ $coursetopic-> topicNumber }} :
        {{ $coursetopic-> topicName }}</h3>
    </a>
</div>
@endforeach

