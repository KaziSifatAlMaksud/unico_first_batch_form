<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unico Hospital PLC — Add Doctor</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<style>
  .form-section-title {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: var(--primary);
    margin-bottom: 14px;
    margin-top: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .form-section-title::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--border);
  }
  .avatar-upload {
    width: 90px; height: 90px;
    border-radius: 50%;
    border: 2px dashed var(--border);
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    cursor: pointer;
    background: var(--bg);
    color: var(--muted);
    font-size: 10px;
    transition: all .2s;
    gap: 4px;
    position: relative;
    overflow: hidden;
  }
  .avatar-upload:hover { border-color: var(--primary); color: var(--primary); background: var(--primary-light); }
  .avatar-upload i { font-size: 22px; }
  .avatar-preview { width:100%;height:100%;object-fit:cover;position:absolute;top:0;left:0;border-radius:50%; }
  .required-star { color: var(--danger); margin-left: 2px; }
  .info-box {
    background: var(--primary-light);
    border: 1px solid rgba(37,99,235,.2);
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 11.5px;
    color: var(--primary);
    display: flex;
    align-items: flex-start;
    gap: 8px;
  }
  .info-box i { font-size: 14px; margin-top: 1px; flex-shrink: 0; }
  .schedule-slot {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 10px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 8px;
    margin-bottom: 6px;
    font-size: 12px;
  }
  .schedule-slot .day-label {
    width: 80px;
    font-weight: 600;
    color: var(--text);
    font-size: 11.5px;
  }
  .schedule-slot .form-check-input { margin-top: 0; }
  .qual-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--primary-light);
    color: var(--primary);
    border-radius: 20px;
    padding: 3px 10px;
    font-size: 11px;
    font-weight: 600;
    margin: 2px;
  }
  .qual-tag button {
    background: none; border: none;
    color: var(--primary);
    padding: 0; font-size: 12px;
    cursor: pointer; line-height: 1;
    opacity: .7;
  }
  .qual-tag button:hover { opacity: 1; }
  .profile-preview-card {
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    background: var(--surface);
    box-shadow: var(--shadow);
  }
  .profile-preview-banner {
    height: 60px;
    background: linear-gradient(135deg, var(--primary) 0%, #7c3aed 100%);
  }
  .profile-preview-body { padding: 0 14px 14px; }
  .profile-av-wrap { margin-top: -24px; margin-bottom: 8px; }
  .profile-av {
    width: 48px; height: 48px;
    border-radius: 50%;
    background: var(--primary-light);
    color: var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; font-weight: 700;
    border: 3px solid var(--surface);
  }
  .stat-row { display: flex; gap: 6px; margin-top: 10px; }
  .stat-mini { flex: 1; text-align: center; background: var(--bg); border-radius: 7px; padding: 7px 4px; }
  .stat-mini-val { font-size: 15px; font-weight: 700; color: var(--primary); }
  .stat-mini-label { font-size: 9px; color: var(--muted); margin-top: 1px; }
</style>
</head>
<body>
<div class="app-wrapper">
  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon"><i class="bi bi-heart-pulse-fill"></i></div>
      <div class="brand-text"><div class="brand-name">Unico Hospital</div><div class="brand-sub">Hospital Management</div></div>
    </div>
    <nav class="sidebar-nav">
      <div class="nav-section-label">Main</div>
      <a href="index.html" class="nav-link-item"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a>
      <a href="patient-queue.html" class="nav-link-item"><i class="bi bi-people-fill"></i><span>Patient Queue</span><span class="nav-badge">12</span></a>
      <a href="emergency.html" class="nav-link-item danger"><i class="bi bi-exclamation-octagon-fill"></i><span>Emergency</span><span class="nav-badge danger">3</span></a>
      <div class="nav-section-label">Clinical</div>
      <a href="lab-reports.html" class="nav-link-item"><i class="bi bi-clipboard2-pulse-fill"></i><span>Lab Reports</span></a>
      <a href="doctors.html" class="nav-link-item active"><i class="bi bi-person-badge-fill"></i><span>Doctors</span></a>
      <a href="billing.html" class="nav-link-item"><i class="bi bi-receipt-cutoff"></i><span>Billing</span></a>
      <a href="notifications.html" class="nav-link-item"><i class="bi bi-bell-fill"></i><span>Notifications</span><span class="nav-badge">5</span></a>
      <div class="nav-section-label">System</div>
      <a href="patient-search.html" class="nav-link-item"><i class="bi bi-search"></i><span>Patient Search</span></a>
      <a href="settings.html" class="nav-link-item"><i class="bi bi-gear-fill"></i><span>Settings</span></a>
    </nav>
    <div class="sidebar-footer"><div class="d-flex align-items-center gap-2"><div class="user-avatar">DA</div><div><div class="user-name">Dr. Admin</div><div class="user-role">Administrator</div></div></div></div>
  </aside>

  <div class="main-content">
    <!-- TOPBAR -->
    <header class="topbar">
      <button class="btn btn-icon d-lg-none" id="sidebarToggle"><i class="bi bi-list fs-5"></i></button>
      <div class="topbar-title d-none d-lg-block"><h5 class="mb-0 fw-600">Add Doctor</h5><small class="text-muted">Register a new doctor profile</small></div>
      <div class="topbar-search"><i class="bi bi-search"></i><input type="text" placeholder="Search..."></div>
      <div class="topbar-actions">
        <button class="btn btn-icon" id="themeToggle"><i class="bi bi-moon-fill"></i></button>
        <a href="notifications.html" class="btn btn-icon position-relative"><i class="bi bi-bell-fill"></i><span class="notif-badge">5</span></a>
        <div class="user-avatar">DA</div>
      </div>
    </header>

    <div class="page-body">
      <!-- Header -->
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <div class="hms-breadcrumb"><a href="index.html">Dashboard</a><span class="sep"><i class="bi bi-chevron-right"></i></span><a href="doctors.html">Doctors</a><span class="sep"><i class="bi bi-chevron-right"></i></span><span>Add Doctor</span></div>
          <h4 class="fw-700 mb-0">Register New Doctor</h4>
        </div>
        <div class="d-flex gap-2">
          <a href="{{ route('doctors') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i>Back to Doctors</a>
        </div>
      </div>

      <div class="row g-3">
        <!-- Main Form -->

        <div class="col-lg-8">
        <form action="{{ route('store_admission') }}" method="POST">
          @csrf

          <!-- Personal Info -->
          <div class="card mb-3">
            <div class="card-header"><h6 class="mb-0 fw-600"><i class="bi bi-person-fill me-2 text-primary"></i>Personal Information</h6></div>
            <div class="card-body">
              <!-- Avatar + Name -->
              <div class="d-flex align-items-start gap-3 mb-4">
                <div>
                  <div class="avatar-upload" id="avatarUpload" onclick="document.getElementById('avatarInput').click()">
                    <i class="bi bi-camera-fill"></i>
                    <span>Photo</span>
                  </div>
                  <input type="file" id="avatarInput" accept="image/*" class="d-none">
                  <div style="font-size:10px;color:var(--muted);text-align:center;margin-top:4px">Click to upload</div>
                </div>
                <div class="flex-grow-1">
                  <div class="row g-2">
                    <div class="col-md-2">
                      <label class="form-label">Title</label>
                      <select class="form-select form-select-sm" name="title">
                        <option>Dr.</option><option>Prof.</option>
                        <option>Assoc. Prof.</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">First Name <span class="required-star">*</span></label>
                      <input type="text"  name="first_name"class="form-control form-control-sm" placeholder="e.g. Rafiq">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label">Middle Name</label>
                      <input type="text" name="middle_name" class="form-control form-control-sm" placeholder="Optional">
                    </div>
                    <div class="col-md-3">
                      <label class="form-label">Last Name <span class="required-star">*</span></label>
                      <input type="text" name="last_name" class="form-control form-control-sm" placeholder="e.g. Islam">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row g-3">
                <div class="col-md-4">
                  <label class="form-label">Gender <span class="required-star">*</span></label>
                  <select class="form-select form-select-sm" name="gender">
                    <option value="">Select</option>
                    <option>Male</option><option>Female</option><option>Other</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Date of Birth</label>
                  <input type="date" name="dob" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                  <label class="form-label">Nationality</label>
                  <select class="form-select form-select-sm" name="nationality">
                    <option>Bangladeshi</option>
                    <option>Indian</option><option>Pakistani</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">NID / Passport</label>
                  <input type="text" name="nid_passport" class="form-control form-control-sm" placeholder="National ID">
                </div>
                <div class="col-md-4">
                  <label class="form-label">Phone <span class="required-star">*</span></label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input type="tel"  name="phone" class="form-control" placeholder="01X-XXXXXXXX">
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Email <span class="required-star">*</span></label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="doctor@hospital.com">
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Address</label>
                  <textarea class="form-control form-control-sm" name="address" rows="2" placeholder="Residential address..."></textarea>
                </div>
              </div>
            </div>
          </div>

          <!-- Professional Info -->
          <div class="card mb-3">
            <div class="card-header"><h6 class="mb-0 fw-600"><i class="bi bi-person-badge-fill me-2 text-primary"></i>Professional Information</h6></div>
            <div class="card-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Specialization <span class="required-star">*</span></label>
                  <select class="form-select form-select-sm" name="specialization_id">
                    <option  value="1">Select Specialization</option>
                    <option value="2">General Medicine</option>
                    <option value="3">Cardiology</option>
                    <option value="4">Neurology</option>
                    <option value="5">Orthopedics</option>
                    <option value="6">Gynecology</option>
                    <option value="7">Pediatrics</option>
                    <option value="8">Dermatology</option>
                    <option value="9">ENT</option>
                    <option value="10">Ophthalmology</option>
                    <option value="11">Psychiatry</option>
                    <option value="12">Oncology</option>
                    <option value="13">Emergency Medicine</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Department <span class="required-star">*</span></label>
                  <select class="form-select form-select-sm" name="department_id">
                    <option value="">Select Department</option>
                    <option value="1">OPD</option>
                    <option value="2">IPD</option>
                    <option value="3">ICU</option>
                    <option value="4">Emergency</option>
                    <option value="5">Surgery</option>
                    <option value="6">Outpatient</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">BMDC Reg. No. <span class="required-star">*</span></label>
                  <input type="text" name="bmdc_reg_no" class="form-control form-control-sm" placeholder="e.g. A-12345">
                </div>
                <div class="col-md-4">
                  <label class="form-label">Years of Experience</label>
                  <div class="input-group input-group-sm">
                    <input type="number" name="experience" class="form-control" placeholder="e.g. 10" min="0" max="60">
                    <span class="input-group-text">years</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Joining Date</label>
                  <input type="date" name="joining_date" class="form-control form-control-sm" value="2026-05-09">
                </div>
                <div class="col-md-4">
                  <label class="form-label">Designation</label>
                  <select name="designation"  class="form-select form-select-sm">
                    <option>Consultant</option>
                    <option>Senior Consultant</option>
                    <option>Professor</option>
                    <option>Associate Professor</option>
                    <option>Assistant Professor</option>
                    <option>Medical Officer</option>
                    <option>Resident</option>
                    <option>Intern</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Employee ID</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Auto-generated" readonly style="background:var(--bg)">
                </div>
                <div class="col-md-4">
                  <label class="form-label">Status</label>
                  <select class="form-select form-select-sm" name="status">
                    <option>Active</option>
                    <option>On Leave</option>
                    <option>Inactive</option>
                  </select>
                </div>

                <div class="form-section-title col-12 mb-0">Qualifications</div>
                <div class="col-12">
                  <div id="qualTags" class="mb-2">
                    <span class="qual-tag">MBBS <button type="button" onclick="this.parentElement.remove()">×</button></span>
                    <span class="qual-tag">FCPS (Medicine) <button type="button" onclick="this.parentElement.remove()">×</button></span>
                  </div>
                  <div class="d-flex gap-2">
                    <input type="text" class="form-control form-control-sm" id="qualInput" placeholder="Add qualification (e.g. MD, MRCP, PhD...)">
                    <button class="btn btn-outline-primary btn-sm" type="button" onclick="addQual()"><i class="bi bi-plus-lg"></i> Add</button>
                  </div>
                </div>

                <div class="col-12">
                  <label class="form-label">Bio / About</label>
                  <textarea class="form-control form-control-sm" rows="3" placeholder="Brief professional biography, areas of expertise..." name="bio"></textarea>
                </div>
              </div>
            </div>
          </div>

          <!-- Consultation & Fees -->
          <div class="card mb-3">
            <div class="card-header"><h6 class="mb-0 fw-600"><i class="bi bi-currency-dollar me-2 text-primary"></i>Consultation & Fees</h6></div>
            <div class="card-body">
              <div class="row g-3">
                <div class="col-md-4">
                  <label class="form-label">Consultation Fee <span class="required-star">*</span></label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">৳</span>
                    <input type="number" class="form-control" name="consultation_fee" placeholder="e.g. 800">
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Follow-up Fee</label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">৳</span>
                    <input type="number" class="form-control" name="followup_fee" placeholder="e.g. 400">
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Emergency Fee</label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">৳</span>
                    <input type="number" class="form-control" name="emergency_fee" placeholder="e.g. 1500">
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Patients Per Day (Max)</label>
                  <input type="number" class="form-control form-control-sm" name="patients_per_day" placeholder="e.g. 30" min="1">
                </div>
                <div class="col-md-4">
                  <label class="form-label">Appointment Duration</label>
                  <select class="form-select form-select-sm" name="appointment_duration">
                    <option>15 minutes</option>
                    <option>20 minutes</option>
                    <option>30 minutes</option>
                    <option>45 minutes</option>
                    <option>60 minutes</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label class="form-label">Chamber Room No.</label>
                  <input type="text" class="form-control form-control-sm" name="chamber_room" placeholder="e.g. Room 204">
                </div>
              </div>
            </div>
          </div>

          <!-- Weekly Schedule -->
          {{-- <div class="card mb-3">
            <div class="card-header"><h6 class="mb-0 fw-600"><i class="bi bi-calendar-week-fill me-2 text-primary"></i>Weekly Schedule</h6></div>
            <div class="card-body">
              <p style="font-size:11.5px;color:var(--muted)" class="mb-3">Set the doctor's working hours for each day. Uncheck days for off days.</p>
              <div id="scheduleContainer">
                <div class="schedule-slot">
                  <div class="form-check"><input class="form-check-input" type="checkbox" checked id="dayMon"><label class="form-check-label day-label" for="dayMon">Monday</label></div>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="09:00">
                  <span style="font-size:12px;color:var(--muted)">to</span>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="17:00">
                  <span class="badge-pill green ms-auto">On Duty</span>
                </div>
                <div class="schedule-slot"> 
                  <div class="form-check"><input class="form-check-input" type="checkbox" checked id="dayTue"><label class="form-check-label day-label" for="dayTue">Tuesday</label></div>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="09:00">
                  <span style="font-size:12px;color:var(--muted)">to</span>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="17:00">
                  <span class="badge-pill green ms-auto">On Duty</span>
                </div>
                <div class="schedule-slot">
                  <div class="form-check"><input class="form-check-input" type="checkbox" checked id="dayWed"><label class="form-check-label day-label" for="dayWed">Wednesday</label></div>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="09:00">
                  <span style="font-size:12px;color:var(--muted)">to</span>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="17:00">
                  <span class="badge-pill green ms-auto">On Duty</span>
                </div>
                <div class="schedule-slot">
                  <div class="form-check"><input class="form-check-input" type="checkbox" checked id="dayThu"><label class="form-check-label day-label" for="dayThu">Thursday</label></div>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="09:00">
                  <span style="font-size:12px;color:var(--muted)">to</span>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="17:00">
                  <span class="badge-pill green ms-auto">On Duty</span>
                </div>
                <div class="schedule-slot">
                  <div class="form-check"><input class="form-check-input" type="checkbox" id="dayFri"><label class="form-check-label day-label" for="dayFri">Friday</label></div>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="09:00" disabled>
                  <span style="font-size:12px;color:var(--muted)">to</span>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="13:00" disabled>
                  <span class="badge-pill gray ms-auto">Off Day</span>
                </div>
                <div class="schedule-slot">
                  <div class="form-check"><input class="form-check-input" type="checkbox" checked id="daySat"><label class="form-check-label day-label" for="daySat">Saturday</label></div>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="09:00">
                  <span style="font-size:12px;color:var(--muted)">to</span>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="14:00">
                  <span class="badge-pill green ms-auto">On Duty</span>
                </div>
                <div class="schedule-slot">
                  <div class="form-check"><input class="form-check-input" type="checkbox" id="daySun"><label class="form-check-label day-label" for="daySun">Sunday</label></div>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="09:00" disabled>
                  <span style="font-size:12px;color:var(--muted)">to</span>
                  <input type="time" class="form-control form-control-sm" style="width:120px" value="17:00" disabled>
                  <span class="badge-pill gray ms-auto">Off Day</span>
                </div>
              </div>
            </div>
          </div> --}}

          <!-- Action Buttons -->
          <div class="d-flex gap-2 justify-content-end">
            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-x me-1"></i>Cancel</button>
            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-floppy me-1"></i>Save as Draft</button>
            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-check-lg me-1"></i>Register Doctor</button>
          </div>
        </div>
       

        <!-- Sidebar -->
        <div class="col-lg-4">
          <!-- Profile Preview Card -->
          <div class="card mb-3">
            <div class="card-header"><h6 class="mb-0 fw-600"><i class="bi bi-eye-fill me-2 text-primary"></i>Profile Preview</h6></div>
            <div class="card-body p-2">
              <div class="profile-preview-card">
                <div class="profile-preview-banner"></div>
                <div class="profile-preview-body">
                  <div class="profile-av-wrap">
                    <div class="profile-av" id="profileAvatar">DR</div>
                  </div>
                  <div class="fw-700" style="font-size:14px" id="previewName">Dr. [Name]</div>
                  <div style="font-size:11px;color:var(--muted)" id="previewSpec">Specialization</div>
                  <div class="d-flex gap-2 mt-2 flex-wrap" id="previewQuals">
                    <span class="badge-pill blue">MBBS</span>
                    <span class="badge-pill purple">FCPS</span>
                  </div>
                  <div class="stat-row">
                    <div class="stat-mini"><div class="stat-mini-val">0</div><div class="stat-mini-label">Patients</div></div>
                    <div class="stat-mini"><div class="stat-mini-val" id="previewExp">0</div><div class="stat-mini-label">Yrs Exp.</div></div>
                    <div class="stat-mini"><div class="stat-mini-val">4.9</div><div class="stat-mini-label">Rating</div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Account Access -->
          <div class="card mb-3">
            <div class="card-header"><h6 class="mb-0 fw-600"><i class="bi bi-shield-lock-fill me-2 text-primary"></i>System Access</h6></div>
            <div class="card-body">
              <div class="row g-2">
                <div class="col-12">
                  <label class="form-label">Username <span class="required-star">*</span></label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" placeholder="e.g. dr.rafiq">
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Temporary Password <span class="required-star">*</span></label>
                  <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                    <input type="password" class="form-control" id="passInput" placeholder="Set password">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePass()"><i class="bi bi-eye" id="eyeIcon"></i></button>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Role</label>
                  <select class="form-select form-select-sm">
                    <option>Doctor</option>
                    <option>Senior Doctor</option>
                    <option>Head of Department</option>
                  </select>
                </div>
                <div class="col-12 mt-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="sendCreds" checked>
                    <label class="form-check-label" for="sendCreds" style="font-size:11.5px">Send login credentials via email</label>
                  </div>
                  <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" id="forceChange" checked>
                    <label class="form-check-label" for="forceChange" style="font-size:11.5px">Force password change on first login</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Info box -->
          <div class="info-box mb-3">
            <i class="bi bi-lightbulb-fill"></i>
            <span>The doctor will receive a welcome email with their credentials and a link to activate the account.</span>
          </div>

          <!-- Documents -->
          <div class="card">
            <div class="card-header"><h6 class="mb-0 fw-600"><i class="bi bi-file-earmark-text-fill me-2 text-primary"></i>Documents</h6></div>
            <div class="card-body">
              <div class="row g-2">
                <div class="col-12">
                  <label class="form-label">BMDC Certificate</label>
                  <input type="file" class="form-control form-control-sm" accept=".pdf,.jpg,.png">
                </div>
                <div class="col-12">
                  <label class="form-label">Degree / Qualification Docs</label>
                  <input type="file" class="form-control form-control-sm" accept=".pdf,.jpg,.png" multiple>
                </div>
                <div class="col-12">
                  <label class="form-label">Signature</label>
                  <input type="file" class="form-control form-control-sm" accept="image/*">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
<script>
  // Theme toggle
  const themeToggle = document.getElementById('themeToggle');
  if (themeToggle) {
    const saved = localStorage.getItem('hms-theme');
    if (saved === 'dark') { document.documentElement.setAttribute('data-theme','dark'); themeToggle.innerHTML='<i class="bi bi-sun-fill"></i>'; }
    themeToggle.addEventListener('click', () => {
      const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
      document.documentElement.setAttribute('data-theme', isDark ? '' : 'dark');
      themeToggle.innerHTML = isDark ? '<i class="bi bi-moon-fill"></i>' : '<i class="bi bi-sun-fill"></i>';
      localStorage.setItem('hms-theme', isDark ? '' : 'dark');
    });
  }

  // Sidebar mobile toggle
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar');
  if (sidebarToggle) sidebarToggle.addEventListener('click', () => sidebar.classList.toggle('open'));

  // Toggle password visibility
  function togglePass() {
    const input = document.getElementById('passInput');
    const icon = document.getElementById('eyeIcon');
    if (input.type === 'password') { input.type = 'text'; icon.className = 'bi bi-eye-slash'; }
    else { input.type = 'password'; icon.className = 'bi bi-eye'; }
  }

  // Qualification tags
  function addQual() {
    const input = document.getElementById('qualInput');
    const val = input.value.trim();
    if (!val) return;
    const tag = document.createElement('span');
    tag.className = 'qual-tag';
    tag.innerHTML = `${val} <button type="button" onclick="this.parentElement.remove()">×</button>`;
    document.getElementById('qualTags').appendChild(tag);
    input.value = '';
  }
  document.getElementById('qualInput').addEventListener('keydown', e => { if (e.key === 'Enter') { e.preventDefault(); addQual(); }});

  // Schedule checkboxes toggle time inputs
  document.querySelectorAll('#scheduleContainer .form-check-input').forEach(cb => {
    cb.addEventListener('change', function() {
      const slot = this.closest('.schedule-slot');
      const inputs = slot.querySelectorAll('input[type="time"]');
      const badge = slot.querySelector('.badge-pill');
      inputs.forEach(i => i.disabled = !this.checked);
      if (this.checked) { badge.className = 'badge-pill green ms-auto'; badge.textContent = 'On Duty'; }
      else { badge.className = 'badge-pill gray ms-auto'; badge.textContent = 'Off Day'; }
    });
  });
</script>
</body>
</html>
