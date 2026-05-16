<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unico Hospital PLC — Doctors</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<style>


  /* ── Star rating ── */
  .star-rating { color: #f59e0b; font-size: 10px; display:inline-flex; gap:1px; }

  /* ── View toggle ── */
  .view-toggle { display:flex; gap:4px; }
  .view-btn {
    width:30px; height:30px; border-radius:7px;
    border:1px solid var(--border); background:var(--bg);
    color:var(--muted); display:flex; align-items:center;
    justify-content:center; cursor:pointer; font-size:14px;
    transition: all .15s;
  }
  .view-btn.active { background:var(--primary); border-color:var(--primary); color:#fff; }

  /* ── Table view ── */
  .table-view { display:none; }
  .table-view.visible { display:block; }
  .grid-view  { display:none; }
  .grid-view.visible  { display:grid;  grid-template-columns: repeat(auto-fill, minmax(230px,1fr)); gap:16px; }

  /* ── Dept filter pills ── */
  .dept-filter { display:flex; flex-wrap:wrap; gap:6px; margin-bottom:16px; }
  .dept-pill {
    padding: 4px 12px; border-radius:20px; font-size:11.5px;
    font-weight:600; border:1px solid var(--border);
    background:var(--surface); color:var(--muted);
    cursor:pointer; transition:all .15s; white-space:nowrap;
  }
  .dept-pill:hover  { border-color:var(--primary); color:var(--primary); }
  .dept-pill.active { background:var(--primary); border-color:var(--primary); color:#fff; }

  /* ── Summary stat cards ── */
  .sum-card {
    background:var(--surface); border:1px solid var(--border);
    border-radius:var(--radius); padding:14px 16px;
    box-shadow:var(--shadow); display:flex; align-items:center; gap:12px;
  }
  .sum-icon {
    width:38px;height:38px;border-radius:9px;
    display:flex;align-items:center;justify-content:center;font-size:17px;
  }
  .sum-icon.blue   {background:var(--primary-light);color:var(--primary);}
  .sum-icon.green  {background:var(--success-light);color:var(--success);}
  .sum-icon.amber  {background:var(--warning-light);color:var(--warning);}
  .sum-icon.purple {background:var(--purple-light); color:var(--purple);}
  .sum-val   {font-size:20px;font-weight:700;line-height:1;}
  .sum-label {font-size:10.5px;color:var(--muted);margin-top:2px;}
</style>
</head>
<body>
<div class="app-wrapper">

  <!-- ── SIDEBAR ── -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="brand-icon"><i class="bi bi-heart-pulse-fill"></i></div>
      <div class="brand-text"><div class="brand-name">Unico Hospital</div><div class="brand-sub">Hospital Management</div></div>
    </div>
    <nav class="sidebar-nav">
      <div class="nav-section-label">Main</div>
      <a href="index.html"         class="nav-link-item"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a>
      <a href="patient-queue.html" class="nav-link-item"><i class="bi bi-people-fill"></i><span>Patient Queue</span><span class="nav-badge">12</span></a>
      <a href="emergency.html"     class="nav-link-item danger"><i class="bi bi-exclamation-octagon-fill"></i><span>Emergency</span><span class="nav-badge danger">3</span></a>
      <div class="nav-section-label">Clinical</div>
      <a href="lab-reports.html"   class="nav-link-item"><i class="bi bi-clipboard2-pulse-fill"></i><span>Lab Reports</span></a>
      <a href="doctors.html"       class="nav-link-item active"><i class="bi bi-person-badge-fill"></i><span>Doctors</span></a>
      <a href="billing.html"       class="nav-link-item"><i class="bi bi-receipt-cutoff"></i><span>Billing</span></a>
      <a href="notifications.html" class="nav-link-item"><i class="bi bi-bell-fill"></i><span>Notifications</span><span class="nav-badge">5</span></a>
      <div class="nav-section-label">System</div>
      <a href="patient-search.html" class="nav-link-item"><i class="bi bi-search"></i><span>Patient Search</span></a>
      <a href="settings.html"       class="nav-link-item"><i class="bi bi-gear-fill"></i><span>Settings</span></a>
    </nav>
    <div class="sidebar-footer">
      <div class="d-flex align-items-center gap-2">
        <div class="user-avatar">DA</div>
        <div><div class="user-name">Dr. Admin</div><div class="user-role">Administrator</div></div>
      </div>
    </div>
  </aside>

  <!-- ── MAIN CONTENT ── -->
  <div class="main-content">

    <!-- TOPBAR -->
    <header class="topbar">
      <button class="btn btn-icon d-lg-none" id="sidebarToggle"><i class="bi bi-list fs-5"></i></button>
      <div class="topbar-title d-none d-lg-block">
        <h5 class="mb-0 fw-600">Doctors</h5>
        <small class="text-muted">Manage doctor profiles and schedules</small>
      </div>
      <div class="topbar-search"><i class="bi bi-search"></i><input type="text" id="searchInput" placeholder="Search doctors..."></div>
      <div class="topbar-actions">
        <button class="btn btn-icon" id="themeToggle"><i class="bi bi-moon-fill"></i></button>
        <a href="notifications.html" class="btn btn-icon position-relative"><i class="bi bi-bell-fill"></i><span class="notif-badge">5</span></a>
        <div class="user-avatar">DA</div>
      </div>
    </header>

    <div class="page-body">

      <!-- Page Header -->
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
          <div class="hms-breadcrumb"><a href="index.html">Dashboard</a><span class="sep"><i class="bi bi-chevron-right"></i></span><span>Doctors</span></div>
          <h4 class="fw-700 mb-0">Doctor Directory</h4>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-download me-1"></i>Export</button>
          <a href="{{ route('add_doctor') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>Add Doctor</a>
        </div>
      </div>

      <!-- Summary Stats -->
      <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
          <div class="sum-card">
            <div class="sum-icon blue"><i class="bi bi-person-badge-fill"></i></div>
            <div><div class="sum-val">{{ $totalDoctors }}</div><div class="sum-label">Total Doctors</div></div>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="sum-card">
            <div class="sum-icon green"><i class="bi bi-circle-fill" style="font-size:10px"></i></div>
            <div><div class="sum-val">{{ $activeDoctors }}</div><div class="sum-label">Active Today</div></div>
          </div>
        </div>
        {{-- <div class="col-6 col-xl-3">
          <div class="sum-card">
            <div class="sum-icon amber"><i class="bi bi-calendar-check-fill"></i></div>
            <div><div class="sum-val">148</div><div class="sum-label">Appointments Today</div></div>
          </div>
        </div> --}}
        {{-- <div class="col-6 col-xl-3">
          <div class="sum-card">
            <div class="sum-icon purple"><i class="bi bi-graph-up"></i></div>
            <div><div class="sum-val">4.8</div><div class="sum-label">Avg. Rating</div></div>
          </div>
        </div> --}}

      </div>

      <!-- Department Filter -->
      <div class="dept-filter" id="deptFilter">
        <span class="dept-pill active" data-dept="all">All Departments</span>
        <span class="dept-pill" data-dept="General Medicine">General Medicine</span>
        <span class="dept-pill" data-dept="Cardiology">Cardiology</span>
        <span class="dept-pill" data-dept="Neurology">Neurology</span>
        <span class="dept-pill" data-dept="Orthopedic">Orthopedic</span>
        <span class="dept-pill" data-dept="Gynecology">Gynecology</span>
        <span class="dept-pill" data-dept="Pediatrics">Pediatrics</span>
        <span class="dept-pill" data-dept="Dermatology">Dermatology</span>
      </div>

      <!-- Controls Bar -->
      <div class="card mb-3">
        <div class="card-body py-2 px-3">
          <div class="row g-2 align-items-center">
            <div class="col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" id="cardSearch" placeholder="Search by name, specialization...">
              </div>
            </div>
            <div class="col-md-2">
              <select class="form-select form-select-sm" id="statusFilter">
                <option value="all">All Status</option>
                <option value="Active">Active</option>
                <option value="On Leave">On Leave</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-select form-select-sm" id="sortFilter">
                <option>Sort: Name A–Z</option>
                <option>Sort: Name Z–A</option>
                <option>Sort: Most Patients</option>
                <option>Sort: Highest Rated</option>
              </select>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-end gap-2">
              <span style="font-size:11.5px;color:var(--muted)" id="countLabel">Showing 8 doctors</span>
              <div class="view-toggle">
                <button class="view-btn active" id="gridBtn" title="Grid view"><i class="bi bi-grid-fill"></i></button>
                <button class="view-btn" id="listBtn" title="List view"><i class="bi bi-list-ul"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ── GRID VIEW ── -->

      {{-- {{ $doctors }} --}}

      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      <div class="grid-view visible" id="gridView">

        @foreach ($doctors as $doctor)
          
        <!-- Card 1 -->
        <div class="doctor-card" data-name="{{ $doctor->first_name }} {{ $doctor->last_name }}" data-dept="{{ $doctor->department->name }}" data-status="{{ $doctor->status }}">
          <div class="doctor-card-banner banner-blue"></div>
          <div class="doctor-card-body">
            <div class="doctor-avatar-wrap">
              <div class="doctor-av blue" style="z-index: 99;">{{ strtoupper(substr($doctor->first_name, 0, 1) . substr($doctor->last_name, 0, 1)) }}</div>
              <span class="badge-pill green">{{ $doctor->status }}</span>
            </div>
            <div class="doctor-name">{{ $doctor->title }} {{ $doctor->first_name }} {{ $doctor->last_name }}</div>
            <div class="doctor-spec">{{ $doctor->specialization->name }}</div>
            <div class="doctor-dept"><i class="bi bi-building me-1"></i>{{ $doctor->department->name }} · Room {{ $doctor->chamber_room }}</div>
            <div class="doctor-quals">
              <span class="qual-chip">MBBS</span><span class="qual-chip">FCPS</span><span class="qual-chip">MD</span>
            </div>
            <div style="margin-top:6px;font-size:10.5px;color:var(--muted)">
              <span class="star-rating">★★★★★</span> <span class="fw-600" style="color:var(--text)">4.9</span> · {{ $doctor->experience }} yrs exp.
            </div>
            <div class="doctor-stats">
              <div class="ds-item"><div class="ds-val">00</div><div class="ds-label">Patients</div></div>
              <div class="ds-item"><div class="ds-val">00</div><div class="ds-label">Today</div></div>
              <div class="ds-item"><div class="ds-val">৳ {{ $doctor->consultation_fee }}</div><div class="ds-label">Fee</div></div>
            </div>
          </div>
          <div class="doctor-footer">
            <a href="doctor-profile.html" class="btn btn-xs btn-primary flex-grow-1 text-center">View Profile</a>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-calendar3"></i></button>
            {{-- <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-telephone"></i></button> --}}
          </div>
        </div>

        @endforeach

        <!-- Card 2 -->
        {{-- <div class="doctor-card" data-name="Dr. Asif Hossain" data-dept="Cardiology" data-status="Active">
          <div class="doctor-card-banner banner-red"></div>
          <div class="doctor-card-body">
            <div class="doctor-avatar-wrap">
              <div class="doctor-av red">AH</div>
              <span class="badge-pill green">Active</span>
            </div>
            <div class="doctor-name">Dr. Asif Hossain</div>
            <div class="doctor-spec">Cardiology</div>
            <div class="doctor-dept"><i class="bi bi-building me-1"></i>IPD · Room 205</div>
            <div class="doctor-quals">
              <span class="qual-chip">MBBS</span><span class="qual-chip">MRCP</span>
            </div>
            <div style="margin-top:6px;font-size:10.5px;color:var(--muted)">
              <span class="star-rating">★★★★★</span> <span class="fw-600" style="color:var(--text)">4.8</span> · 15 yrs exp.
            </div>
            <div class="doctor-stats">
              <div class="ds-item"><div class="ds-val">2,105</div><div class="ds-label">Patients</div></div>
              <div class="ds-item"><div class="ds-val">22</div><div class="ds-label">Today</div></div>
              <div class="ds-item"><div class="ds-val">৳1,200</div><div class="ds-label">Fee</div></div>
            </div>
          </div>
          <div class="doctor-footer">
            <a href="doctor-profile.html" class="btn btn-xs btn-primary flex-grow-1 text-center">View Profile</a>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-calendar3"></i></button>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-telephone"></i></button>
          </div>
        </div> --}}

        <!-- Card 3 -->
        {{-- <div class="doctor-card" data-name="Dr. Sadia Rahman" data-dept="Neurology" data-status="Active">
          <div class="doctor-card-banner banner-purple"></div>
          <div class="doctor-card-body">
            <div class="doctor-avatar-wrap">
              <div class="doctor-av purple">SR</div>
              <span class="badge-pill green">Active</span>
            </div>
            <div class="doctor-name">Dr. Sadia Rahman</div>
            <div class="doctor-spec">Neurology</div>
            <div class="doctor-dept"><i class="bi bi-building me-1"></i>OPD · Room 112</div>
            <div class="doctor-quals">
              <span class="qual-chip">MBBS</span><span class="qual-chip">FCPS</span><span class="qual-chip">PhD</span>
            </div>
            <div style="margin-top:6px;font-size:10.5px;color:var(--muted)">
              <span class="star-rating">★★★★★</span> <span class="fw-600" style="color:var(--text)">5.0</span> · 10 yrs exp.
            </div>
            <div class="doctor-stats">
              <div class="ds-item"><div class="ds-val">980</div><div class="ds-label">Patients</div></div>
              <div class="ds-item"><div class="ds-val">15</div><div class="ds-label">Today</div></div>
              <div class="ds-item"><div class="ds-val">৳1,000</div><div class="ds-label">Fee</div></div>
            </div>
          </div>
          <div class="doctor-footer">
            <a href="doctor-profile.html" class="btn btn-xs btn-primary flex-grow-1 text-center">View Profile</a>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-calendar3"></i></button>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-telephone"></i></button>
          </div>
        </div> --}}

        <!-- Card 4 -->
        {{-- <div class="doctor-card" data-name="Dr. Mahbub Karim" data-dept="Orthopedic" data-status="Active">
          <div class="doctor-card-banner banner-green"></div>
          <div class="doctor-card-body">
            <div class="doctor-avatar-wrap">
              <div class="doctor-av green">MK</div>
              <span class="badge-pill green">Active</span>
            </div>
            <div class="doctor-name">Dr. Mahbub Karim</div>
            <div class="doctor-spec">Orthopedic Surgery</div>
            <div class="doctor-dept"><i class="bi bi-building me-1"></i>Surgery · OT Block</div>
            <div class="doctor-quals">
              <span class="qual-chip">MBBS</span><span class="qual-chip">MS (Ortho)</span>
            </div>
            <div style="margin-top:6px;font-size:10.5px;color:var(--muted)">
              <span class="star-rating">★★★★☆</span> <span class="fw-600" style="color:var(--text)">4.7</span> · 18 yrs exp.
            </div>
            <div class="doctor-stats">
              <div class="ds-item"><div class="ds-val">3,420</div><div class="ds-label">Patients</div></div>
              <div class="ds-item"><div class="ds-val">8</div><div class="ds-label">Today</div></div>
              <div class="ds-item"><div class="ds-val">৳1,500</div><div class="ds-label">Fee</div></div>
            </div>
          </div>
          <div class="doctor-footer">
            <a href="doctor-profile.html" class="btn btn-xs btn-primary flex-grow-1 text-center">View Profile</a>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-calendar3"></i></button>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-telephone"></i></button>
          </div>
        </div> --}}

        <!-- Card 5 -->
        {{-- <div class="doctor-card" data-name="Dr. Nasreen Sultana" data-dept="Gynecology" data-status="On Leave">
          <div class="doctor-card-banner banner-rose"></div>
          <div class="doctor-card-body">
            <div class="doctor-avatar-wrap">
              <div class="doctor-av rose">NS</div>
              <span class="badge-pill amber">On Leave</span>
            </div>
            <div class="doctor-name">Dr. Nasreen Sultana</div>
            <div class="doctor-spec">Gynecology & Obstetrics</div>
            <div class="doctor-dept"><i class="bi bi-building me-1"></i>Maternity · Room 310</div>
            <div class="doctor-quals">
              <span class="qual-chip">MBBS</span><span class="qual-chip">FCOG</span>
            </div>
            <div style="margin-top:6px;font-size:10.5px;color:var(--muted)">
              <span class="star-rating">★★★★★</span> <span class="fw-600" style="color:var(--text)">4.9</span> · 14 yrs exp.
            </div>
            <div class="doctor-stats">
              <div class="ds-item"><div class="ds-val">1,870</div><div class="ds-label">Patients</div></div>
              <div class="ds-item"><div class="ds-val">0</div><div class="ds-label">Today</div></div>
              <div class="ds-item"><div class="ds-val">৳900</div><div class="ds-label">Fee</div></div>
            </div>
          </div>
          <div class="doctor-footer">
            <a href="doctor-profile.html" class="btn btn-xs btn-primary flex-grow-1 text-center">View Profile</a>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-calendar3"></i></button>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-telephone"></i></button>
          </div>
        </div> --}}

        <!-- Card 6 -->
        {{-- <div class="doctor-card" data-name="Dr. Imran Chowdhury" data-dept="Pediatrics" data-status="Active">
          <div class="doctor-card-banner banner-teal"></div>
          <div class="doctor-card-body">
            <div class="doctor-avatar-wrap">
              <div class="doctor-av teal">IC</div>
              <span class="badge-pill green">Active</span>
            </div>
            <div class="doctor-name">Dr. Imran Chowdhury</div>
            <div class="doctor-spec">Pediatrics</div>
            <div class="doctor-dept"><i class="bi bi-building me-1"></i>OPD · Room 108</div>
            <div class="doctor-quals">
              <span class="qual-chip">MBBS</span><span class="qual-chip">DCH</span><span class="qual-chip">FCPS</span>
            </div>
            <div style="margin-top:6px;font-size:10.5px;color:var(--muted)">
              <span class="star-rating">★★★★★</span> <span class="fw-600" style="color:var(--text)">4.8</span> · 9 yrs exp.
            </div>
            <div class="doctor-stats">
              <div class="ds-item"><div class="ds-val">760</div><div class="ds-label">Patients</div></div>
              <div class="ds-item"><div class="ds-val">20</div><div class="ds-label">Today</div></div>
              <div class="ds-item"><div class="ds-val">৳700</div><div class="ds-label">Fee</div></div>
            </div>
          </div>
          <div class="doctor-footer">
            <a href="doctor-profile.html" class="btn btn-xs btn-primary flex-grow-1 text-center">View Profile</a>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-calendar3"></i></button>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-telephone"></i></button>
          </div>
        </div> --}}

        <!-- Card 7 -->
        {{-- <div class="doctor-card" data-name="Dr. Fahmida Begum" data-dept="Dermatology" data-status="Active">
          <div class="doctor-card-banner banner-amber"></div>
          <div class="doctor-card-body">
            <div class="doctor-avatar-wrap">
              <div class="doctor-av amber">FB</div>
              <span class="badge-pill green">Active</span>
            </div>
            <div class="doctor-name">Dr. Fahmida Begum</div>
            <div class="doctor-spec">Dermatology</div>
            <div class="doctor-dept"><i class="bi bi-building me-1"></i>OPD · Room 115</div>
            <div class="doctor-quals">
              <span class="qual-chip">MBBS</span><span class="qual-chip">DDV</span>
            </div>
            <div style="margin-top:6px;font-size:10.5px;color:var(--muted)">
              <span class="star-rating">★★★★☆</span> <span class="fw-600" style="color:var(--text)">4.6</span> · 7 yrs exp.
            </div>
            <div class="doctor-stats">
              <div class="ds-item"><div class="ds-val">540</div><div class="ds-label">Patients</div></div>
              <div class="ds-item"><div class="ds-val">14</div><div class="ds-label">Today</div></div>
              <div class="ds-item"><div class="ds-val">৳600</div><div class="ds-label">Fee</div></div>
            </div>
          </div>
          <div class="doctor-footer">
            <a href="doctor-profile.html" class="btn btn-xs btn-primary flex-grow-1 text-center">View Profile</a>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-calendar3"></i></button>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-telephone"></i></button>
          </div>
        </div> --}}

        <!-- Card 8 -->
        {{-- <div class="doctor-card" data-name="Dr. Zahir Ahmed" data-dept="Cardiology" data-status="Inactive">
          <div class="doctor-card-banner banner-indigo"></div>
          <div class="doctor-card-body">
            <div class="doctor-avatar-wrap">
              <div class="doctor-av indigo">ZA</div>
              <span class="badge-pill gray">Inactive</span>
            </div>
            <div class="doctor-name">Dr. Zahir Ahmed</div>
            <div class="doctor-spec">Interventional Cardiology</div>
            <div class="doctor-dept"><i class="bi bi-building me-1"></i>Cath Lab · Floor 3</div>
            <div class="doctor-quals">
              <span class="qual-chip">MBBS</span><span class="qual-chip">DCard</span><span class="qual-chip">FSCAI</span>
            </div>
            <div style="margin-top:6px;font-size:10.5px;color:var(--muted)">
              <span class="star-rating">★★★★★</span> <span class="fw-600" style="color:var(--text)">4.9</span> · 22 yrs exp.
            </div>
            <div class="doctor-stats">
              <div class="ds-item"><div class="ds-val">4,890</div><div class="ds-label">Patients</div></div>
              <div class="ds-item"><div class="ds-val">0</div><div class="ds-label">Today</div></div>
              <div class="ds-item"><div class="ds-val">৳2,000</div><div class="ds-label">Fee</div></div>
            </div>
          </div>
          <div class="doctor-footer">
            <a href="doctor-profile.html" class="btn btn-xs btn-primary flex-grow-1 text-center">View Profile</a>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-calendar3"></i></button>
            <button class="btn btn-xs btn-outline-secondary"><i class="bi bi-telephone"></i></button>
          </div>
        </div> --}}

      </div><!-- /grid-view -->

      <!-- ── TABLE VIEW ── -->
      <div class="table-view" id="tableView">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-600">Doctor List</h6>
            <span class="text-muted" style="font-size:11px">8 doctors</span>
          </div>
          <div class="table-responsive">
            <table class="hms-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Doctor</th>
                  <th>Specialization</th>
                  <th>Department</th>
                  <th>Patients</th>
                  <th>Today</th>
                  <th>Rating</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              {{-- <tbody>
                <tr>
                  <td>1</td>
                  <td><div class="d-flex align-items-center gap-2"><div class="doc-av blue" style="width:30px;height:30px;font-size:10px">RI</div><div><div class="fw-600">Dr. Rafiq Islam</div><div style="font-size:10px;color:var(--muted)">MBBS, FCPS · 12 yrs</div></div></div></td>
                  <td>General Medicine</td>
                  <td>OPD</td>
                  <td>1,240</td>
                  <td>18</td>
                  <td><span class="star-rating">★★★★★</span> 4.9</td>
                  <td><span class="badge-pill green">Active</span></td>
                  <td><div class="d-flex gap-1"><a href="doctor-profile.html" class="btn btn-xs btn-outline-primary">View</a><button class="btn btn-xs btn-outline-secondary">Edit</button></div></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><div class="d-flex align-items-center gap-2"><div class="doc-av red" style="width:30px;height:30px;font-size:10px">AH</div><div><div class="fw-600">Dr. Asif Hossain</div><div style="font-size:10px;color:var(--muted)">MBBS, MRCP · 15 yrs</div></div></div></td>
                  <td>Cardiology</td>
                  <td>IPD</td>
                  <td>2,105</td>
                  <td>22</td>
                  <td><span class="star-rating">★★★★★</span> 4.8</td>
                  <td><span class="badge-pill green">Active</span></td>
                  <td><div class="d-flex gap-1"><a href="doctor-profile.html" class="btn btn-xs btn-outline-primary">View</a><button class="btn btn-xs btn-outline-secondary">Edit</button></div></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td><div class="d-flex align-items-center gap-2"><div class="doc-av purple" style="width:30px;height:30px;font-size:10px">SR</div><div><div class="fw-600">Dr. Sadia Rahman</div><div style="font-size:10px;color:var(--muted)">MBBS, FCPS, PhD · 10 yrs</div></div></div></td>
                  <td>Neurology</td>
                  <td>OPD</td>
                  <td>980</td>
                  <td>15</td>
                  <td><span class="star-rating">★★★★★</span> 5.0</td>
                  <td><span class="badge-pill green">Active</span></td>
                  <td><div class="d-flex gap-1"><a href="doctor-profile.html" class="btn btn-xs btn-outline-primary">View</a><button class="btn btn-xs btn-outline-secondary">Edit</button></div></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td><div class="d-flex align-items-center gap-2"><div class="doc-av green" style="width:30px;height:30px;font-size:10px">MK</div><div><div class="fw-600">Dr. Mahbub Karim</div><div style="font-size:10px;color:var(--muted)">MBBS, MS (Ortho) · 18 yrs</div></div></div></td>
                  <td>Orthopedic Surgery</td>
                  <td>Surgery</td>
                  <td>3,420</td>
                  <td>8</td>
                  <td><span class="star-rating">★★★★☆</span> 4.7</td>
                  <td><span class="badge-pill green">Active</span></td>
                  <td><div class="d-flex gap-1"><a href="doctor-profile.html" class="btn btn-xs btn-outline-primary">View</a><button class="btn btn-xs btn-outline-secondary">Edit</button></div></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td><div class="d-flex align-items-center gap-2"><div class="doc-av amber" style="width:30px;height:30px;font-size:10px">NS</div><div><div class="fw-600">Dr. Nasreen Sultana</div><div style="font-size:10px;color:var(--muted)">MBBS, FCOG · 14 yrs</div></div></div></td>
                  <td>Gynecology</td>
                  <td>Maternity</td>
                  <td>1,870</td>
                  <td>0</td>
                  <td><span class="star-rating">★★★★★</span> 4.9</td>
                  <td><span class="badge-pill amber">On Leave</span></td>
                  <td><div class="d-flex gap-1"><a href="doctor-profile.html" class="btn btn-xs btn-outline-primary">View</a><button class="btn btn-xs btn-outline-secondary">Edit</button></div></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td><div class="d-flex align-items-center gap-2"><div class="doc-av blue" style="width:30px;height:30px;font-size:10px">IC</div><div><div class="fw-600">Dr. Imran Chowdhury</div><div style="font-size:10px;color:var(--muted)">MBBS, DCH, FCPS · 9 yrs</div></div></div></td>
                  <td>Pediatrics</td>
                  <td>OPD</td>
                  <td>760</td>
                  <td>20</td>
                  <td><span class="star-rating">★★★★★</span> 4.8</td>
                  <td><span class="badge-pill green">Active</span></td>
                  <td><div class="d-flex gap-1"><a href="doctor-profile.html" class="btn btn-xs btn-outline-primary">View</a><button class="btn btn-xs btn-outline-secondary">Edit</button></div></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td><div class="d-flex align-items-center gap-2"><div class="doc-av amber" style="width:30px;height:30px;font-size:10px">FB</div><div><div class="fw-600">Dr. Fahmida Begum</div><div style="font-size:10px;color:var(--muted)">MBBS, DDV · 7 yrs</div></div></div></td>
                  <td>Dermatology</td>
                  <td>OPD</td>
                  <td>540</td>
                  <td>14</td>
                  <td><span class="star-rating">★★★★☆</span> 4.6</td>
                  <td><span class="badge-pill green">Active</span></td>
                  <td><div class="d-flex gap-1"><a href="doctor-profile.html" class="btn btn-xs btn-outline-primary">View</a><button class="btn btn-xs btn-outline-secondary">Edit</button></div></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td><div class="d-flex align-items-center gap-2"><div class="doc-av purple" style="width:30px;height:30px;font-size:10px">ZA</div><div><div class="fw-600">Dr. Zahir Ahmed</div><div style="font-size:10px;color:var(--muted)">MBBS, DCard, FSCAI · 22 yrs</div></div></div></td>
                  <td>Interventional Cardiology</td>
                  <td>Cath Lab</td>
                  <td>4,890</td>
                  <td>0</td>
                  <td><span class="star-rating">★★★★★</span> 4.9</td>
                  <td><span class="badge-pill gray">Inactive</span></td>
                  <td><div class="d-flex gap-1"><a href="doctor-profile.html" class="btn btn-xs btn-outline-primary">View</a><button class="btn btn-xs btn-outline-secondary">Edit</button></div></td>
                </tr>
              </tbody> --}}
            </table>
          </div>
          <div class="card-body border-top d-flex align-items-center justify-content-between py-2">
            <small class="text-muted">Showing 8 of 32 doctors</small>
            <nav><ul class="pagination pagination-sm mb-0">
              <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul></nav>
          </div>
        </div>
      </div><!-- /table-view -->

    </div><!-- /page-body -->
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Theme
  const themeToggle = document.getElementById('themeToggle');
  const saved = localStorage.getItem('hms-theme');
  if (saved === 'dark') { document.documentElement.setAttribute('data-theme','dark'); themeToggle.innerHTML='<i class="bi bi-sun-fill"></i>'; }
  themeToggle.addEventListener('click', () => {
    const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
    document.documentElement.setAttribute('data-theme', isDark ? '' : 'dark');
    themeToggle.innerHTML = isDark ? '<i class="bi bi-moon-fill"></i>' : '<i class="bi bi-sun-fill"></i>';
    localStorage.setItem('hms-theme', isDark ? '' : 'dark');
  });

  // Sidebar mobile
  document.getElementById('sidebarToggle').addEventListener('click', () =>
    document.getElementById('sidebar').classList.toggle('open'));

  // Grid / List toggle
  const gridBtn  = document.getElementById('gridBtn');
  const listBtn  = document.getElementById('listBtn');
  const gridView = document.getElementById('gridView');
  const tableView= document.getElementById('tableView');
  gridBtn.addEventListener('click', () => {
    gridBtn.classList.add('active'); listBtn.classList.remove('active');
    gridView.classList.add('visible'); tableView.classList.remove('visible');
  });
  listBtn.addEventListener('click', () => {
    listBtn.classList.add('active'); gridBtn.classList.remove('active');
    tableView.classList.add('visible'); gridView.classList.remove('visible');
  });

  // Department filter
  document.getElementById('deptFilter').addEventListener('click', e => {
    if (!e.target.classList.contains('dept-pill')) return;
    document.querySelectorAll('.dept-pill').forEach(p => p.classList.remove('active'));
    e.target.classList.add('active');
    filterCards();
  });

  // Status filter
  document.getElementById('statusFilter').addEventListener('change', filterCards);
  document.getElementById('cardSearch').addEventListener('input', filterCards);

  function filterCards() {
    const dept   = document.querySelector('.dept-pill.active').dataset.dept;
    const status = document.getElementById('statusFilter').value;
    const q      = document.getElementById('cardSearch').value.toLowerCase();
    const cards  = document.querySelectorAll('.doctor-card');
    let visible  = 0;
    cards.forEach(c => {
      const matchDept   = dept === 'all' || c.dataset.dept === dept;
      const matchStatus = status === 'all' || c.dataset.status === status;
      const matchQ      = c.dataset.name.toLowerCase().includes(q);
      const show = matchDept && matchStatus && matchQ;
      c.style.display = show ? '' : 'none';
      if (show) visible++;
    });
    document.getElementById('countLabel').textContent = `Showing ${visible} doctors`;
  }
</script>

</body>
</html>
