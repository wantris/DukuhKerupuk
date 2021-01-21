{{-- Login Modal CUSTOMER --}}
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  role="document">
      <div class="modal-content" style=" border-radius:20px">
        <div class="modal-header" style="border: none">
          <button type="button" class="close mr-1 mt-1" data-dismiss="modal" aria-label="Close" style="width: 31px; height:31px; border-radius:50%;padding:0;float:right !important; border:3px solid #25C666">
            <span aria-hidden="true" style="color:  #25C666">&times;</span>
          </button>
        </div>
        <div class="modal-body " style="padding: 0 !important">  
          <h4 class="modal-title mt-2 text-center"  id="exampleModalLabel">Login <b><span style="color: #25C666">Dukuh</span><span> Kerupuk</span></b></h4>
          
          <div class="separator mt-5 mb-3">Atau</div>
          <div class="container-fluid pt-4 pb-3" style="background-color:  #25C666">
            <div class="row pr-4 pl-4">
              <div class="col-lg-12 col-md-12 col-sm-12" >
                <form action="" method="POST">
                  @method('POST')
                  @csrf
                    <div class="form-group">
                      <div class="input-group mb-3">  
                        <input type="email" name="email" class="form-control login-input pl-4 @error('email') is-invalid @enderror" style="border-radius: 20px; height:50px" aria-describedby="emailHelp" placeholder="Email">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="input-group " id="show_hide_password">
                          <input type="password" name="password" class="form-control pl-4 login-input password-input  @error('password') is-invalid @enderror" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Password..">
                          <div class="input-group-prepend">
                            <a href="" class="input-group-text" style="background-color: #fff; border:none;border-top-right-radius: 20px; border-bottom-right-radius: 20px; text-decoration:none"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                      </div>
                    </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row mt-4">
              <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="form-group text-center" >
                  <input type="submit" class="facebook-btn" style="background-color:#25C666 !important " value="Masuk">
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>