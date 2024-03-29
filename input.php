<html>
<head>

<title>Add new Vinyl</title>
</head>

<style>
html,
body,
.intro {
  height: 100%;
}

@media (min-width: 550px) and (max-width: 750px) {
  html,
  body,
  .intro {
    height: 750px;
  }
}

@media (min-width: 800px) and (max-width: 850px) {
  html,
  body,
  .intro {
    height: 750px;
  }
}

.mask-custom {
  backdrop-filter: blur(15px);
  background-color: rgba(255,255,255,.2);
  border-radius: 3em;
  border: 2px solid rgba(255,255,255,.1);
  background-clip: padding-box;
  box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
}
</style>

<body>
<section class="intro">
  <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/glassmorphism-article/img5.jpg');">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-7 col-xl-6">
            <div class="card mask-custom">
              <div class="card-body p-5 text-white">

                <div class="my-4">

                  <h2 class="text-center mb-5">Register Form</h2>

                  <form>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                      <div class="col-12 col-md-6 mb-4">
                        <div class="form-outline form-white">
                          <input type="text" id="form3Example1" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example1">First name</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 mb-4">
                        <div class="form-outline form-white">
                          <input type="text" id="form3Example2" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example2">Last name</label>
                        </div>
                      </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline form-white mb-4">
                      <input type="email" id="form3Example3" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline form-white mb-4">
                      <input type="password" id="form3Example4" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                      <input
                        class="form-check-input me-2"
                        type="checkbox"
                        value=""
                        id="form2Example3"
                        checked
                      />
                      <label class="form-check-label" for="form2Example3">
                        Subscribe to our newsletter
                      </label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-light btn-block mb-4">Sign up</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                      <p>or sign up with:</p>
                      <button type="button" class="btn btn-light btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                      </button>

                      <button type="button" class="btn btn-light btn-floating mx-1">
                        <i class="fab fa-google"></i>
                      </button>

                      <button type="button" class="btn btn-light btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                      </button>

                      <button type="button" class="btn btn-light btn-floating mx-1">
                        <i class="fab fa-github"></i>
                      </button>
                    </div>
                  </form>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>

