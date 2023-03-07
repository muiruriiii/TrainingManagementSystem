
<center>

<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid rgb(160,82,45);">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid rgb(160,82,45);">
        <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
        <br><br>
        <br>

        <span style="font-size:25px;"><i>This is to certify that</i></span>
        <br><br>
        <br>

        <span style="font-size:30px;"><b> {{ $user->firstName .' '.$user->lastName }} </b></span><br/><br/>
        <br>
        <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
        <br>
        <span style="font-size:30px"><b>{{$courses-> courseName}}</b></span> <br/><br/>
        <br><br><br>
        <span style="font-size:25px"><i>dated</i></span><br>
        <br>

        <span style="font-size:30px">
            <?php
            echo date('F, Y');
            ?>
        </span>

    </div>

</div>
</center>
<style>
    @page  {
        margin: 0 20px;
    }
</style>
<script src="{{asset("js/certificate.js")}}"></script>
