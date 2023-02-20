@include('templates.dashboardSideBar')
<div>
{{$courses}}

</div>

<center><div class="cardBox">
    <div style="box-shadow: 0 4px 8px 0 black;"class="card">
        <div>
            <div class="numbers">
                {{$users}}
            </div>
            <a style="text-decoration: none;" href="" class="cardName">USERS</a>
        </div>
        <div class="iconBox">
            <ion-icon name="people-outline"></ion-icon>
        </div>
    </div>
        <div style="box-shadow: 0 4px 8px 0 black;"class="card">
            <div>
                <div class="numbers">
                    {{$courses}}
                </div>
                <a style="text-decoration: none;" href="" class="cardName">TOTAL COURSES</a>
            </div>
            <div class="iconBox">
                <ion-icon name="folder-open-outline"></ion-icon>
            </div>
        </div>
        <div style="box-shadow: 0 4px 8px 0 black;"class="card">
            <div>
                <div class="numbers">
                    {{$noCourseUsers}}
                </div>
                <a style="text-decoration: none;" href="" class="cardName">LOGGED IN USERS WITH ACCESS TO NO COURSE</a>
            </div>
            <div class="iconBox">
                <ion-icon name="people-outline"></ion-icon>
            </div>
        </div>
    </div></center>
