@extends('layouts.main5')

@section('konten')
    
<div class="container pt-5">
    <div class="d-flex justify-content-center mt-3">
      <div class="card rounded-15" style="width: 1030px; height: 515px; background-color: #E6E4E8; border: 2px solid #FFFFFF;">
            <div class="row">
              <div class="col-6 d-none d-md-block">
                <div class="rounded-15" style="height: 510px; border-bottom-right-radius: 300px; background-color: #E1C3EC;">
                  <img src="{{ asset('assets/img/bg5.png') }}" alt="gambar-forgot-password" class="mt-5 mx-5" width="356px">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="px-5 pt-5 mt-5">
                  <h4 class="fw-bold">Reset Password</h4>
                  <p class="" style="color: #66615F;">Please enter your New Password</p>
                  <form>
                    <div class="mb-3 mt-4">
                      <label for="" class="mb-2">New Password</label>
                      <input type="text" class="form-control w-75" placeholder="Enter New Password">
                    </div>
                    <div class="mb-3">
                      <label for="" class="mb-2">Confirm Password</label>
                      <input type="text" class="form-control w-75" placeholder="Enter Confirm Password">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary w-75 fs-14 fw-bold rounded-5" style="background: #FF7979 ;">Save New Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
      </div>
    </div>
</div>
@endsection