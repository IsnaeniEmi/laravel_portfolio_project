 @extends("layouts.public.app")

 @section("title")
   Contact Us
 @endsection

 @section("content")
   <!-- Page content-->
   <section class="py-5">
     <div class="container px-5">
       <div class="bg-light rounded-4 py-4 px-4 px-md-5 mb-4">
         <div class="mb-3">
           <h1 class="fw-bolder mb-3">Contact</h1>
           <p>
             <span class="fas fa-map me-2"></span>
             Alamat : {{ $user->alamat }}
           </p>
           <p>
             <span class="fas fa-phone me-2"></span>
             Telepon : {{ $user->telepon }}
           </p>
           <p>
             <span class="fas fa-envelope me-2"></span>
             Email : {{ $user->email }}
           </p>
         </div>
       </div>
       <!-- Contact form-->
       <div class="bg-light rounded-4 py-5 px-4 px-md-5">
         <div class="text-center mb-5">
           <h1 class="fw-bolder">Let's work together!</h1>
         </div>
         <div class="row gx-5 justify-content-center">
           <div class="col-lg-8 col-xl-6">
             <form id="contactForm" action="{{ route("create_contact") }}" method="POST">
               @csrf
               <!-- Name input-->
               <div class="form-floating mb-3">
                 <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text"
                   placeholder="Enter your name..." data-sb-validations="required" />
                 <label for="nama_lengkap">Full name</label>
                 <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
               </div>
               <!-- Email address input-->
               <div class="form-floating mb-3">
                 <input class="form-control" id="email" name="email" placeholder="name@example.com"
                   data-sb-validations="required,email" />
                 <label for="email">Email address</label>
                 <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                 <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
               </div>
               <!-- Phone number input-->
               <div class="form-floating mb-3">
                 <input class="form-control" id="telepon" name="telepon" type="tel" placeholder="(123) 456-7890"
                   data-sb-validations="required" />
                 <label for="telepon">Phone number</label>
                 <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
               </div>
               <!-- Message input-->
               <div class="form-floating mb-3">
                 <textarea class="form-control" id="pesan" name="pesan" type="text" placeholder="Enter your message here..."
                   style="height: 10rem" data-sb-validations="required"></textarea>
                 <label for="pesan">Message</label>
                 <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
               </div>
               <!-- Submit Button-->
               <div class="d-grid"><button class="btn btn-primary btn-lg border-0" id="submitButton" type="submit"
                   style="background-color: #008ABA">Submit</button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </section>
 @endsection
