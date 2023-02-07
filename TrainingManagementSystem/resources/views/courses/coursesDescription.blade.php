@include('templates.descriptionNavbar')

<h3 id="heading"> Course Description</h3>
    <div class="descContainer text-center">
        <div class="description">
        {{$courses->courseDescription}}

        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut blanditiis distinctio dolorem doloremque ea eius, eligendi harum inventore itaque magnam minus molestias non odio officiis rem velit veritatis voluptatem?
        <p>For further details...</p>

        </div>
        <div>
            <p>
                To access a course, kindly <a style="color:rgb(160,82,45);" href="{{url('/login')}}"> log in </a> then make payment
            </p>
        </div>
        <div>
        <button>
            <a style="color: #fff;" href="{{url ('/paypalPayment/'.$courses->id)}}"> Make Payment
            </a>
        </button>
        </div>

    </div>

