@include('templates.sideBar')

<h3 id="heading"> {{$courses->courseName}} </h3>
<div class="descContainer text-center">
    <div class="description">
        {{$courses->courseDescription}}.
        This course entails {{$coursetopics}} topic(s).
        <br>
        <div>To start learning more about the course click <a style="color: rgb(160,82,45);" href="{{url('listTopics/'.$courseID)}}" >here</a>.</div>
        <br>
        <p>Once you have completed watching all the videos and reading through all the notes,</p>
        <p>kindly check out the 'complete course' checkbox to get your certificate. </p>

    </div>

</div>

