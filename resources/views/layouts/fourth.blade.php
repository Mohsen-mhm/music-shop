<hr class="text-light mt-5 mb-5"/>

<div class="card text-white bg-dark border-warning w-100 mb-3">
    <div class="card-header border-warning w-100">
        عضویت در خبرنامه
    </div>
    <div class="card-body row w-100 d-flex justify-content-between align-items-center">
        <small class="card-title col-md-6">برای عضویت در خبرنامه ایمیل خود را وارد کنید...</small>
        <div class="col-md-6 d-flex justify-content-between align-items-center mb-3">
            <input id="email" type="email" style="border-radius: 0 0.375rem 0.375rem 0"
                   class="border-secondary bg-dark text-light form-control @error('email') is-invalid @enderror mt-2"
                   name="email" placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}" required
                   autocomplete="email">
            <button class="btn btn-outline-warning mt-2" style="border-radius: 0.375rem 0 0 0.375rem">عضویت</button>
            @error('email')
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>
    </div>
</div>
<style>
    #email:focus {
        direction: ltr;
    }

    #email:focus::placeholder {
        color: transparent;
    }
</style>
