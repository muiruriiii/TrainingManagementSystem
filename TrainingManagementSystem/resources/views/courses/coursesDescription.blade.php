@include('templates.descriptionNavbar')
{{--//--}}
{{--//use App\Models\Users;--}}
{{--//use Illuminate\Support\Facades\Auth;--}}
{{--//--}}
{{--//$user=Users::find(Auth::user()->id);--}}
{{--//--}}
{{--//if($user->paymentStatus == 'Approved'){--}}
{{--//--}}
{{--//    echo view('courses/customerService');--}}
{{--//}--}}
{{--//else{--}}
{{--//--}}
{{--//    echo view('payments/paypalPayment');--}}
{{--//}--}}
{{--//--}}
<h3 id="heading"> Course Description</h3>
    <div class="descContainer text-center">
        <div class="description">
        {{$courses->courseDescription}}
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut blanditiis distinctio dolorem doloremque ea eius, eligendi harum inventore itaque magnam minus molestias non odio officiis rem velit veritatis voluptatem?
        <p>For further details...</p>
        </div>
        <div>
        <button>
            <a style="color: #fff;" href="{{url ('/paypalPayment/'.$courses->id)}}"> Make Payment
            </a>
        </button>
        </div>

    </div>

