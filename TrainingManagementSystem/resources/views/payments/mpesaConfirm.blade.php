{{--@if($message == "Payment Complete")--}}
{{--    @include('dashboard.dashboardSideNav')--}}
{{--@else--}}
{{--    @include('common.header')--}}
{{--@endif--}}
<body>
<main>
    <div>
        <form method = "post" id = "addForm" action = "{{ url('/confirmTransaction') }}" class="row g-3 form">
            @csrf
            <h3 class = "text-center">MPESA Confirmation</h3>
            @if(session()->has('message'))
                <div class="alert alert-sucess">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="col-12">
                @if($errors->has('transaction'))
                    <div class = "alert alert-danger" role = "alert">
                        {{ $errors->first('transaction') }}
                    </div>
                @endif
                <label for="transaction" class="form-label">Transaction Code</label>
                <input type="text" class="form-control" id="transaction" name = "transaction" placeholder="e.g. RB97B5WMYN">
            </div>

            <div class="col-12 text-center">
                <button type="submit">Confirm</button>
            </div>
        </form>

    </div>
</main>
</body>
