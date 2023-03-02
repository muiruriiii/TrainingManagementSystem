@include('templates.sideBar')

<h3 id="heading"> {{$coursetopics->courses->courseName}} </h3>

<div class="topiclist">
    <a href="{{url('courseNotes/'.$coursetopics->id)}}">
        <h3>Course Notes</h3>
    </a>
</div>
<div class="topiclist">
    <a href="{{url('courseVideos/'.$coursetopics->id)}}">
        <h3>Course Videos</h3>
    </a>
</div>
