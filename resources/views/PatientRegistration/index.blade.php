<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Patient Registration | Unico Hospital</title>
  <link rel="icon" href="{{ asset('img/favicon_icon.png') }}" type="image/png">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('assets/css/patientRegistration.css') }}" />
    <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet"/>

<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body >
<div class="page-wrapper">
     <!-- Header -->
    <header class="site-header">
        <div class="contact-header" id="contactHeader">        
          <div class="contact-header__fallback" id="bgFallback"></div>
              <img class="contact-header__bg" id="bgImage" src="{{ asset('assets/img/header-bg.webp') }}" alt="Header background" />

          <div class="contact-header__content col-12 col-md-7 col-lg-6">
           
           <img src="{{ asset('assets/img/unico_icon.jpg') }}"
            alt="Unico Hospital Logo" class="logo-icon1"
            />
                
            <h1 class="contact-header__title">Patient Registration</h1>
            <p class="contact-header__desc">
              Complete the temporary registration form before visiting Unico Hospital.
Your information will be saved securely to help speed up the check-in process at the reception desk.
            </p>
          </div>
        </div> 
    </header>

<section class="form-seciton p-sm-5 mb-5">
    <form id="patientRegistrationForm" enctype="multipart/form-data">
    @csrf  
     <!-- <div class="info-strip">
          <div class="info-chip"><i class="fa-solid fa-lock"></i> Secure & Encrypted</div>
          <div class="info-chip"><i class="fa-solid fa-shield-halved"></i> HIPAA Compliant</div>
          <div class="info-chip"><i class="fa-solid fa-headset"></i> 24/7 Support</div>
          <div class="info-chip"><i class="fa-solid fa-clock"></i> Quick Registration</div>
        </div> -->
    <div class="row">

      <!-- Success Alert (shown via JS) -->
    <div class="alert alert-success d-flex align-items-center gap-2 d-none " id="successAlert" role="alert">
    <i class="fa-solid fa-circle-check fs-5"></i>
    <span id="successMessage">Patient registered successfully!</span>
    </div>

    <!-- Error Alert (shown via JS) -->
    <div class="alert alert-danger d-flex align-items-center gap-2 d-none " id="photoErrorAlert" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i>
    <span id="photoErrorMessage">Please upload a patient photo before submitting.</span>
    </div>
    <div class="col-lg-12 col-sm-12">   
        <!-- Progress steps -->        

        <!-- Main Card -->
        <div class="form-card">
          <div class="card-inner">

                     <!-- ────────────────────────────────────
                    PHOTO UPLOAD SECTION
              ──────────────────────────────────── -->

             <div class="col-md-6"> 

              <div class="section-heading">
                <div class="section-icon" style="background:linear-gradient(135deg,#7c3aed,#a78bfa);">
                  <i class="fa-solid fa-camera"></i>
                </div>
                <div>
                  <h5>Patient Photo</h5>
                  <p>Upload a clear passport-size photograph</p> 
                </div>
              </div>

              <div class="photo-upload-card d-flex align-items-center" id="photoUploadCard">
                <!-- Circular preview -->
                 <div class="row justify-content-center align-items-center">
                    <div class="col-5">
                         <div class="photo-preview-ring" id="photoRing" onclick="document.getElementById('photoInput').click()">
                          <i class="fas fa-user placeholder-icon" id="photoPlaceholderIcon"></i>
                          <img id="photoPreviewImg" src="" alt="Patient photo preview" />
                          <div class="overlay-hover"><i class="fas fa-camera"></i></div>
                        </div>
                    </div>
                      <div class="col-7 ">
                        <!-- Info + buttons -->
                          <div class="photo-upload-body">
                            <h6>Upload Patient Photo <em class="text-danger">*</em></h6> 
                            <p>JPG, PNG or WEBP · Max 5 MB · Passport or ID style recommended</p>
                            <div class="d-flex align-items-center flex-wrap gap-2">
                              <a href="javascript:void(0);" style="text-decoration: none;" class="upload-trigger-btn" onclick="document.getElementById('photoInput').click()">
                                <i class="fas fa-upload"></i> Choose Photo
                              </a>
                              <a href="javascript:void(0);" style="text-decoration: none;" class="remove-photo-btn" id="removePhotoBtn" onclick="removePhoto()">
                                <i class="fas fa-trash-alt"></i> Remove
                              </a>
                            </div>
                            <div class="photo-file-name" id="photoFileName"></div>
                          </div>
                      </div>
                 </div>                        
                <input type="file" id="photoInput" name="patient_photo" accept="image/*"  capture="user" style="display:none" onchange="handlePhotoUpload(event)" />
              </div>
            </div>
       

              <hr class="form-divider">
            <!-- ── STEP 1: Personal Info ── -->
            <div class="form-step active-step" id="step1">
              <div class="section-heading">
                <div class="section-icon"><i class="fa-solid fa-user"></i></div>
                <div>
                  <h5>Personal Information</h5>
                  <p>Basic identity details</p>
                </div>
              </div>

              <div class="row g-3">
                <!-- Full Name -->
                <div class="col-md-4 col-lg-3">
                <label class="form-label">Full Name (পুরো নাম):</label> <em class="text-danger">*</em>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Your Name" >
                </div>
                <small class="text-danger error-text" id="full_name_error"></small>
                </div>
              <!-- Mother Name -->
                <div class="col-md-4 col-lg-3">
                <label class="form-label">Mother Name (মাতার নাম): </label> 
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter Mother's Name" >
                </div>
                <small class="text-danger error-text" id="mother_name_error"></small>
                </div>

                <!-- Father Name -->
                <div class="col-md-4 col-lg-3">
                <label class="form-label">Father Name (পিতার নাম):</label> 
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Father's Name">
                </div>
                <small class="text-danger error-text" id="father_name_error"></small>
                </div>

                <!-- Age -->

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Age (বয়স): <em class="text-danger">*</em></label>

                    <div class="input-group age-group">

                        <span class="input-group-text">
                            <i class="fa-solid fa-hourglass-half"></i>
                        </span>

                        <input type="number"
                            class="form-control"
                            id="age_year"
                            name="age_year"
                            placeholder="YY">

                        <span class="input-group-text">M</span>

                        <input type="number"
                            class="form-control"
                            id="age_month"
                            name="age_month"
                             min="0"
                              max="12"
                            placeholder="MM">

                        <span class="input-group-text">D</span>

                        <input type="number"
                            class="form-control"
                            id="age_day"
                            name="age_day"
                            min="0"
                            max="31"
                            placeholder="DD">

                     

                    </div>
                </div>
                
           
                <div class="col-md-4 col-lg-3">
                    <label class="form-label">Date of Birth (জন্ম তারিখ):<em class="text-danger">*</em></label> 
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                       <input type="date" id="dob" name="dob" class="form-control">

                    </div>
                    <small class="text-danger error-text" id="dob_error"></small>
                </div>


                <div class="col-md-4 col-lg-3">
                    <label class="form-label">NID No. (জাতীয় পরিচিতি নম্বর):<em class="text-danger">*</em></label> 
                    <div class="input-group">
                       <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                       <input type="number" id="nid" name="nid" class="form-control" placeholder="Enter NID No.">
                    </div>
                    <small class="text-danger error-text" id="nid_error"></small>
                </div>   
               
                <div class="col-md-7 col-lg-5">
                  <label class="form-label">Religion (ধর্ম): <em class="text-danger">*</em> </label>
                    <div class="gender-group d-flex gap-3 flex-wrap">
                      <div class="gender-card">
                        <input type="radio" name="religion" id="rm" value="Islam">
                        <label for="rm">
                            <i class="fa-solid fa-star-and-crescent"></i> Islam
                        </label>
                      </div>

                      <div class="gender-card">
                          <input type="radio" name="religion" id="rh" value="Hindu">
                          <label for="rh">
                              <i class="fa-solid fa-om"></i> Hindu
                          </label>
                      </div>
                      <div class="gender-card">
                          <input type="radio" name="religion" id="rc" value="Christian">
                          <label for="rc">
                              <i class="fa-solid fa-cross"></i> Christian
                          </label>
                      </div>  
                      <div class="gender-card">
                          <input type="radio" name="religion" id="rb" value="Buddha">
                          <label for="rb">
                              <i class="fa-solid fa-dharmachakra"></i> Buddha
                          </label>
                      </div> 

                      <div class="gender-card">
                          <input type="radio" name="religion" id="ro" value="Other">
                          <label for="ro">
                              <i class="fa-solid fa-hands-praying"></i> Other
                          </label>
                      </div>
                    <small class="text-danger error-text" id="religion_error"></small>
                  </div>
                  {{-- <select class="form-select" id="religion" name="religion">                    
                    <option value="">Select religion</option>
                    <option>Islam</option>
                    <option>Hindu</option>
                    <option>Christian</option>
                    <option>Other</option>
                  </select> --}}
                <small class="text-danger error-text" id="religion_error"></small>
                </div>

                <div class="col-md-5 col-lg-4">
                  <label class="form-label">Gender (লিঙ্গ):<em class="text-danger">*</em></label> 
                 <div class="gender-group d-flex gap-3 flex-wrap">

                      <div class="gender-card">
                        <input type="radio" name="gender" id="gm" value="Male">
                        <label for="gm">
                            <i class="fa-solid fa-mars"></i> Male
                        </label>
                      </div>

                      <div class="gender-card">
                          <input type="radio" name="gender" id="gf" value="Female">
                          <label for="gf">
                              <i class="fa-solid fa-venus"></i> Female
                          </label>
                      </div>

                      <div class="gender-card">
                          <input type="radio" name="gender" id="go" value="Other">
                          <label for="go">
                              <i class="fa-solid fa-genderless"></i> Other
                          </label>
                      </div>
                    <small class="text-danger error-text" id="gender_error"></small>
                  </div>
                </div>
               
              <div class="col-md-6 col-lg-6">
                <label class="form-label">Marital Status (বৈবাহিক অবস্থা):   <em class="text-danger">*</em> </label>
              
                      <div class="gender-group d-flex gap-3 flex-wrap">

                          <div class="gender-card">
                            <input type="radio" name="marital_status" id="ms1" value="Single">
                            <label for="ms1">
                              <i class="fa-solid fa-user"></i> Single
                            </label>
                          </div>

                          <div class="gender-card">
                            <input type="radio" name="marital_status" id="ms2" value="Married">
                            <label for="ms2">
                              <i class="fa-solid fa-ring"></i> Married
                            </label>
                          </div>

                          <div class="gender-card">
                            <input type="radio" name="marital_status" id="ms3" value="Divorced">
                            <label for="ms3">
                              {{-- <i class="fa-solid fa-heart-crack"></i> --}}
                               Divorced
                            </label>
                          </div>

                          <div class="gender-card">
                            <input type="radio" name="marital_status" id="ms4" value="Widowed">
                            <label for="ms4">
                              {{-- <i class="fa-solid fa-cross"></i>  --}}
                              Widowed
                            </label>
                          </div>

                          <small class="text-danger error-text" id="marital_error"></small>
                        </div>
                {{-- <select class="form-select" id="marital" name="marital_status">
                  <option value="">Select status</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Others">Others</option>
                </select> --}}
                {{-- <small class="text-danger error-text" id="marital_error"></small> --}}
              </div>

              <!-- Spouse Name Field -->
                {{-- <div class="col-md-4 col-lg-3" id="spouseField" style="display: none;">
                  <label class="form-label">Spouse Name</label>

                  <div class="input-group">
                    <span class="input-group-text">
                      <i class="fa-regular fa-user"></i>
                    </span>

                    <input type="text"
                          class="form-control"
                          id="spouseName"
                          name="spouse_name"
                          placeholder="e.g. John Doe">
                  </div>
                  <small class="text-danger error-text" id="spouse_name_error"></small>
                </div> --}}
                <div class="section-heading">
                <div class="section1-icon"><i class="fa-solid fa-user"></i></div>
                <div>
                  <h5>Contact Details</h5>
                  <p>Contact details</p>
                </div>
              </div>

               <div class="col-md-12 col-lg-12">
                  <label class="form-label">Present Address (বর্তমান ঠিকানা): <em class="text-danger">*</em></label> 
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-house"></i></span>
                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address Name" ></textarea>
                    <small class="text-danger error-text" id="address_error"></small>
                  </div>
                </div>

                 <div class="col-md-4 col-lg-3">
                    <label class="form-label">District/City (জেলা/শহর):  <em class="text-danger">*</em></label>

                    <select class="form-select" id="district" name="district">
                        <option value="">Select District</option>

                        <option value="Bagerhat">Bagerhat</option>
                        <option value="Bandarban">Bandarban</option>
                        <option value="Barguna">Barguna</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Bhola">Bhola</option>
                        <option value="Bogura">Bogura</option>
                        <option value="Brahmanbaria">Brahmanbaria</option>
                        <option value="Chandpur">Chandpur</option>
                        <option value="Chattogram">Chattogram</option>
                        <option value="Chuadanga">Chuadanga</option>
                        <option value="Comilla">Comilla</option>
                        <option value="Cox's Bazar">Cox's Bazar</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Dinajpur">Dinajpur</option>
                        <option value="Faridpur">Faridpur</option>
                        <option value="Feni">Feni</option>
                        <option value="Gaibandha">Gaibandha</option>
                        <option value="Gazipur">Gazipur</option>
                        <option value="Gopalganj">Gopalganj</option>
                        <option value="Habiganj">Habiganj</option>
                        <option value="Jamalpur">Jamalpur</option>
                        <option value="Jashore">Jashore</option>
                        <option value="Jhalokathi">Jhalokathi</option>
                        <option value="Jhenaidah">Jhenaidah</option>
                        <option value="Joypurhat">Joypurhat</option>
                        <option value="Khagrachari">Khagrachari</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Kishoreganj">Kishoreganj</option>
                        <option value="Kurigram">Kurigram</option>
                        <option value="Kushtia">Kushtia</option>
                        <option value="Lakshmipur">Lakshmipur</option>
                        <option value="Lalmonirhat">Lalmonirhat</option>
                        <option value="Madaripur">Madaripur</option>
                        <option value="Magura">Magura</option>
                        <option value="Manikganj">Manikganj</option>
                        <option value="Meherpur">Meherpur</option>
                        <option value="Moulvibazar">Moulvibazar</option>
                        <option value="Munshiganj">Munshiganj</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Naogaon">Naogaon</option>
                        <option value="Narail">Narail</option>
                        <option value="Narayanganj">Narayanganj</option>
                        <option value="Narsingdi">Narsingdi</option>
                        <option value="Natore">Natore</option>
                        <option value="Netrokona">Netrokona</option>
                        <option value="Nilphamari">Nilphamari</option>
                        <option value="Noakhali">Noakhali</option>
                        <option value="Pabna">Pabna</option>
                        <option value="Panchagarh">Panchagarh</option>
                        <option value="Patuakhali">Patuakhali</option>
                        <option value="Pirojpur">Pirojpur</option>
                        <option value="Rajbari">Rajbari</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Rangamati">Rangamati</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Satkhira">Satkhira</option>
                        <option value="Shariatpur">Shariatpur</option>
                        <option value="Sherpur">Sherpur</option>
                        <option value="Sirajganj">Sirajganj</option>
                        <option value="Sunamganj">Sunamganj</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Tangail">Tangail</option>
                        <option value="Thakurgaon">Thakurgaon</option>
                    </select>

                    <small class="text-danger error-text" id="district_error"></small>
                    </div>
          <!-- Thana -->
                <div class="col-md-4 col-lg-3">
                    <label class="form-label">Thana / P.S (থানা / পৌরসভা):  <em class="text-danger">*</em> </label>                 
                  <select class="form-select" id="thana" name="thana">
                      <option value="">Select Thana</option>
                  </select>
                   

                    <small class="text-danger error-text" id="thana_error"></small>
                </div>

                <div class="col-md-4 col-lg-3">
                  <label class="form-label">Mobile Number (মোবাইল নম্বর): <em class="text-danger">*</em> </label> 
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" >
                  </div>
                  <small class="text-danger error-text" id="mobile_error"></small>
                </div>
                <!-- <div class="col-md-4 col-lg-3">
                  <label class="form-label">Country</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-flag"></i></span>
                    <input type="text" class="form-control" id="country" name="country" placeholder="e.g. Bangladesh" required>
                  </div>
                </div> -->
              <!-- Email -->
                <div class="col-md-4 col-lg-3">
                  <label class="form-label">Email (ইমেইল):</label> 
                  <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                  </div>
                  <small class="text-danger error-text" id="email_error"></small>
                </div>

                <div class="col-md-4 col-lg-3">
                  <label class="form-label">Emergency Contact Person Name (অ্যাক্সেস কন্টাক্ট ব্যক্তির নাম): <em class="text-danger">*</em> </label>  
                  <div class="input-group">
                      <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                      <input type="text" class="form-control" id="ec_name" name="ec_name" placeholder="Enter Emergency Contact Person Name">
                  </div>
                  <small class="text-danger error-text" id="ec_name_error"></small>
                </div>

                <div class="col-md-4 col-lg-3">
                  <label class="form-label">Emergency Contact Person Number (অ্যাক্সেস কন্টাক্ট ব্যক্তির নম্বর): <em class="text-danger">*</em> </label>   
                  <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-phone"></i></span>
                      <input type="number" class="form-control" id="ec_mobile" name="ec_mobile" placeholder="Enter Emergency Contact Person Number">
                  </div>
                  <small class="text-danger error-text" id="ec_mobile_error"></small>
                </div>

                
               

               <div class="col-md-3 col-lg-3">
                  <label class="form-label">Where Your Heard About Us (আপনি কোথা থেকে আমাদের সম্পর্কে জানেন): <em class="text-danger">*</em></label> 
                  <div class="input-group">
                     <select class="form-select" id="heardAbout" name="heard_about_us">
                        <option value="">Select Option</option>
                        <option value="Director & Shareholders Ref.">Director & Shareholders Ref.</option>
                        <option value="Employee Reference">Employee Reference</option>
                        <option value="Media">Media</option>
                        <option value="Medical Campaign">Medical Campaign</option>
                        <option value="Referred By Our Patient">Referred By Our Patient</option>
                        <option value="Self">Self</option>
                     </select>
                    <small class="text-danger error-text" id="heardAbout_error"></small>
                  </div>
                </div>


                <div class="form-check m-2 mt-3">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="{{ route('terms.conditions') }}" target="_blank">Terms & Conditions</a> and Privacy Policy
                    </label>
                    <div class="text-danger small" id="terms_error"></div>
                </div>

               
                <!-- <div class="col-md-4 col-lg-3">
                  <label class="form-label">Alt. Phone</label>
                    <input type="text" class="form-control" id="address" placeholder="e.g. 123 Main Street" required>
                  </div>
                </div>
                <div class="col-md-4 col-lg-3">
                  <label class="form-label">Alt. Phone</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
                    <input type="text" class="form-control" id="altPhone" name="altPhone" placeholder="e.g. 01712345678" required>
                  </div>
                </div> -->
                 <div class="col-md-4 col-lg-3 " style="display:none;">
                  <label class="form-label">Pt. Category</label> <em class="text-danger">*</em>
                  <select class="form-select" id="marital" name="patient_category">
                    <option selected>General</option>
                    
                  </select>
                    <small class="text-danger error-text" id="category_error"></small>
                </div>




                  <!-- ────────────────────────────────────
                   PHOTO UPLOAD SECTION
              ──────────────────────────────────── -->
              <!-- <hr class="form-divider"> -->

        <div class="row g-3 ">

           <!-- <div class="col-md-6"> 
              <div class="section-heading">
                <div class="section-icon" style="background:linear-gradient(135deg,#0f766e,#14b8a6);">
                  <i class="fa-solid fa-signature"></i>
                </div>
                <div>
                  <h5>Digital Signature</h5>
                  <p>Sign inside the box below using mouse or touch</p>
                </div>
              </div>

              <div class="sig-card">
                <div class="sig-card-header">
                  <div>
                    <h6>Patient / Guardian Signature</h6>
                    <p>Draw your signature in the box below</p>
                  </div>
                  <div class="sig-pen-row">
                    <span class="sig-pen-label">Pen size:</span>
                    <button class="pen-size-btn active" data-size="2" onclick="setPenSize(this,2)"><span class="pen-dot" style="width:4px;height:4px;"></span></button>
                    <button class="pen-size-btn" data-size="4" onclick="setPenSize(this,4)"><span class="pen-dot" style="width:7px;height:7px;"></span></button>
                    <button class="pen-size-btn" data-size="7" onclick="setPenSize(this,7)"><span class="pen-dot" style="width:11px;height:11px;"></span></button>
                    <span class="sig-pen-label ms-2">Color:</span>
                    <input type="color" class="sig-color-input" id="sigColor" value="#0e2a45" title="Pen color" oninput="penColor=this.value" />
                  </div>
                </div>

                <div class="sig-canvas-wrap" id="sigCanvasWrap">
                  <canvas id="sigCanvas"></canvas>
                  <div class="sig-placeholder-label" id="sigPlaceholder">
                    <i class="fas fa-pen-nib"></i> Sign here…
                  </div>
                </div>

                <div class="sig-actions">
                  <button class="sig-btn sig-clear" onclick="clearSignature()">
                    <i class="fas fa-eraser"></i> Clear
                  </button>
                  <button class="sig-btn" onclick="undoStroke()">
                    <i class="fas fa-undo"></i> Undo
                  </button>
                  <button class="sig-btn sig-download" onclick="downloadSignature()">
                    <i class="fas fa-download"></i> Save PNG
                  </button>
                </div>

                <div class="sig-status" id="sigStatus">
                  <i class="fas fa-check-circle"></i> Signature captured
                </div>
              </div>
            </div> -->      
              <!-- <hr class="form-divider"> --> 
        </div>                
              </div>
              <hr class="form-divider">
              <div class="d-flex justify-content-end">
                
                <button type="submit"
                        class="btn-nav btn-primary-custom"
                        id="submitBtn">

                    Submit
                    <i class="fa-solid fa-arrow-right"></i>

                </button>
              </div>
            </div>  
            
          </div><!-- /card-inner -->
        </div><!-- /form-card -->

    </form>

      </div><!-- /page-wrapper -->
    </div>

</section>



  {{-- <section class="contact-bottom-map">
    <img src="https://cms.unicohospitals.com/admin/uploads/page/contact/1728365252akFCE.jpg" alt="Contact bottom image">
  </section> --}}


  </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    $(document).ready(function () {
    let isUpdating = false;

        // ====================================
        // DOB → AGE
        // ====================================
        $('#dob').on('change', function () {

            if (isUpdating) return;
            isUpdating = true;

            let dobValue = $(this).val();

            if (!dobValue) {
                $('#age_year').val('');
                $('#age_month').val('');
                $('#age_day').val('');
                isUpdating = false;
                return;
            }

            let dob = new Date(dobValue);
            let today = new Date();

            let years = today.getFullYear() - dob.getFullYear();
            let months = today.getMonth() - dob.getMonth();
            let days = today.getDate() - dob.getDate();

            // Days adjustment
            if (days < 0) {
                months--;

                let previousMonth = new Date(
                    today.getFullYear(),
                    today.getMonth(),
                    0
                );

                days += previousMonth.getDate();
            }

            // Months adjustment
            if (months < 0) {
                years--;
                months += 12;
            }

            $('#age_year').val(years);
            $('#age_month').val(months);
            $('#age_day').val(days);

            isUpdating = false;
        });


        // ====================================
        // AGE → DOB
        // ====================================
        $('#age_year, #age_month, #age_day').on('input', function () {

            if (isUpdating) return;
            isUpdating = true;

            let years = parseInt($('#age_year').val()) || 0;
            let months = parseInt($('#age_month').val()) || 0;
            let days = parseInt($('#age_day').val()) || 0;

            let today = new Date();

            // Calculate DOB
            let dob = new Date(
                today.getFullYear() - years,
                today.getMonth() - months,
                today.getDate() - days
            );

            // Format date
            let yyyy = dob.getFullYear();
            let mm = String(dob.getMonth() + 1).padStart(2, '0');
            let dd = String(dob.getDate()).padStart(2, '0');

            let formattedDOB = yyyy + '-' + mm + '-' + dd;

            $('#dob').val(formattedDOB);

            isUpdating = false;
        });



    // ── Photo size validation ──
    // $('#photoInput').on('change', function () {
    //     let file = this.files[0];
    //     $('#photoErrorAlert').addClass('d-none');

    //     if (file && file.size > 5 * 1024 * 1024) {
    //         $('#photoErrorMessage').text('Image must be less than 5MB!');
    //         $('#photoErrorAlert').removeClass('d-none');
    //         $(this).val('');
    //         return false;
    //     }
    // });

    // ── Form submit ──
    $('#patientRegistrationForm').on('submit', function (e) {
        e.preventDefault();

        // Clear previous state
        $('.error-text').html('');
        $('[name]').removeClass('is-invalid');
        $('#successAlert').addClass('d-none');
        $('#photoErrorAlert').addClass('d-none');

        // Photo required check
        // let photoFile = $('#photoInput')[0].files[0];
        // if (!photoFile) {
        //     $('#photoErrorMessage').text('Please upload a patient photo before submitting.');
        //     $('#photoErrorAlert').removeClass('d-none');

        //     // Scroll to top so user sees the message
        //     $('html, body').animate({ scrollTop: $('#photoErrorAlert').offset().top - 100 }, 400);
        //     return false;
        // }

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('patient.registration.store') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $('#submitBtn').prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm me-1"></span> Submitting...'
                );
            },
            success: function (response) {
                  let name = $('#name').val();
                  let phone = $('#phone').val();
                // Show success alert at top
                let msg = response.message ?? 'Patient registered successfully!';
                $('#successMessage').text(msg);
                $('#successAlert').removeClass('d-none');

                // Scroll to top
                $('html, body').animate({ scrollTop: $('#successAlert').offset().top - 100 }, 400);

                // Reset form
                $('#patientRegistrationForm')[0].reset();

                // Reset photo preview
                $('#photoPreviewImg').attr('src', '').hide();
                $('#photoPlaceholderIcon').show();
                $('#removePhotoBtn').hide();
                $('#photoFileName').text('');

                $('#submitBtn').prop('disabled', false).html(
                    'Submit <i class="fa-solid fa-arrow-right"></i>'
                );
              setTimeout(function () {

                let url = "/patientregistration/success"
                    + "?patient_id=" + encodeURIComponent(response.id);

                window.location.href = url;

            }, 2000);
            },
            error: function (xhr) {
                $('#submitBtn').prop('disabled', false).html(
                    'Submit <i class="fa-solid fa-arrow-right"></i>'
                );

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        // Map field name to error element id
                        // heard_about_us → heardAbout_error
                        let errorId = key + '_error';
                        if (key === 'heard_about_us') errorId = 'heardAbout_error';
                        if (key === 'marital_status') errorId = 'marital_error';
                        if (key === 'patient_photo') errorId = 'photoErrorMessage';

                        if (key === 'patient_photo') {
                            $('#photoErrorMessage').text(value[0]);
                            $('#photoErrorAlert').removeClass('d-none');
                        } else {
                            $('#' + errorId).html(value[0]);
                        }

                        $('[name="' + key + '"]').addClass('is-invalid');
                    });

                    // Scroll to first error
                    let firstError = $('.error-text:not(:empty)').first();
                    if (firstError.length) {
                        $('html, body').animate({ scrollTop: firstError.offset().top - 120 }, 400);
                    }

                } else {
                    alert('Something went wrong. Please try again.');
                }
            }
        });
    });

});
</script>

<script>
const thanaData = {
    Dhaka: [
        "Adabor","Badda","Banani","Bangshal","Cantonment","Chawkbazar",
        "Demra","Dhanmondi","Gulshan","Jatrabari","Khilgaon","Mirpur",
        "Mohammadpur","Motijheel","Pallabi","Ramna","Uttara East","Uttara West"
    ],

    Chattogram: [
        "Pahartali","Panchlaish","Kotwali","Double Mooring","Chandgaon"
    ]
};

document.getElementById("district").addEventListener("change", function () {
    const district = this.value;
    const thanaSelect = document.getElementById("thana");

    // reset
    thanaSelect.innerHTML = '<option value="">Select Thana</option>';

    if (thanaData[district]) {
        thanaData[district].forEach(function (thana) {
            let option = document.createElement("option");
            option.value = thana;
            option.text = thana;
            thanaSelect.appendChild(option);
        });
    }
});
</script>
<script src="{{ asset('assets/js/patientRegistration.js') }}"></script>
</body>
</html>