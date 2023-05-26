@extends('layouts.app')

@section('content')
    <h2 class="text-light text-center">اتصال به درگاه پرداخت</h2>
    <div class="d-flex justify-content-center align-items-center text-light mt-5">
        <button class="btn btn-success ms-2 me-2" onclick="document.querySelector('#payment-success').submit()">پرداخت
            موفق
        </button>
        <form action="{{ route('cart.payment.success', $order->id) }}" method="POST" id="payment-success"
              class="d-none">@csrf</form>


        <button class="btn btn-danger ms-2 me-2" onclick="document.querySelector('#payment-fail').submit()">پرداخت
            ناموفق
        </button>
        <form action="{{ route('cart.payment.fail', $order->id) }}" method="POST" id="payment-fail"
              class="d-none">@csrf</form>


        <button class="btn btn-warning ms-2 me-2" onclick="document.querySelector('#payment-cancel').submit()">لغو پرداخت
        </button>
        <form action="{{ route('cart.payment.cancel', $order->id) }}" method="POST" id="payment-cancel"
              class="d-none">@csrf</form>
    </div>
@endsection
