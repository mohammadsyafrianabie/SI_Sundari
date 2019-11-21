  <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
          <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                  <div class="col-lg">
                      <div class="p-5">
                          <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">Membuat Akun Warung Sundari!</h1>
                          </div>
                          <form class="user">
                              <div class="form-group row">
                                  <div class="col-sm-12 mb-3 mb-sm-0">
                                      <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <input type="Email" class="form-control form-control-user" id="email" name="email" placeholder="Email">
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
                                  </div>
                                  <div class="col-sm-6">
                                      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulang Sandi">
                                  </div>
                              </div>
                              <div class="form-group">
                              <div class="col-sm-12 mb-3 mb-sm-0">
                                <select name=pertanyaan id="pilihan">
                                    <option value="Admin"> Admin </option>
                                    <option value="Pelanggan"> Pelanggan </option>
                               </select>
                               </div>
                               </div>
                              <button type="submit" class="btn btn-primary btn-user btn-block">
                                  Buat Akun
                              </button>
                              <hr>
                              <div class="text-center">
                                  <a class="small" href="">Lupa Password?</a>
                              </div>
                              <div class="text-center">
                                  <a class="small" href="<?= base_url('auth'); ?>">Sudah memiliki akun? Login!</a>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>