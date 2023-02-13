@include('templates.descriptionNavbar')

<h3 id="heading"> Course Description</h3>
    <div class="descContainer text-center">
        <div class="description">
        {{$courses->courseDescription}}

        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut blanditiis distinctio dolorem doloremque ea eius, eligendi harum inventore itaque magnam minus molestias non odio officiis rem velit veritatis voluptatem?
        <p>For further details...</p>

        </div>

        <div>
        <button>
            <a style="color: #fff;" href="{{url ('/mpesaPayment/'.$courses->id)}}"> Make Payment
            </a>
        </button>
        </div>

    </div>

