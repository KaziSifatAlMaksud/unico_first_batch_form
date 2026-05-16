<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>End-of-Life Care Form (ELF)</title>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --navy: #1a3a5c; --navy-light: #eef3f8; --navy-mid: #2d5a8e;
  --border: #c8d4e0; --border-light: #e2eaf2;
  --text: #1e2d3d; --text-muted: #5a7a9a;
  --bg: #f4f7fa; --white: #ffffff; --input-bg: #fafcff;
  --success: #15803d; --radius: 5px; --radius-sm: 3px;
  --row-alt: #f0f5fa;
}
body { font-family: 'Segoe UI', system-ui, sans-serif; font-size: 11.5px; background: var(--bg); color: var(--text); padding: 10px; }

.form-card { margin: 0 auto; background: var(--white); border-radius: var(--radius); box-shadow: 0 2px 12px rgba(26,58,92,0.1); overflow: hidden; border: 1px solid var(--border); }



/* ── PATIENT BAR ── */
.patient-bar { background: #1c7da3; padding: 0; display: grid; grid-template-columns: 1fr 200px; }
.pb-cell { padding: 4px 10px; display: flex; align-items: center; gap: 6px; border-right: 1px solid rgba(255,255,255,0.2); }
.pb-cell:last-child { border-right: none; }
.pb-cell label { font-size: 10px; color: rgba(255,255,255,0.8); font-weight: 700; text-transform: uppercase; white-space: nowrap; }
.pb-cell input { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: #fff; border-radius: 3px; padding: 2px 6px; font-size: 11px; height: 22px; outline: none; flex: 1; }
.pb-cell input::placeholder { color: rgba(255,255,255,0.4); }

/* ── INFO GRID ── */
.info-grid { display: grid; grid-template-columns: 1fr 1fr; border-bottom: 1px solid var(--border); }
.info-cell { padding: 3px 10px; display: flex; align-items: center; gap: 6px; border-right: 1px solid var(--border); border-bottom: 1px solid var(--border-light); font-size: 11px; background: #f7f9fc; }
.info-cell:nth-child(even) { border-right: none; }
.info-cell label { font-weight: 600; color: var(--navy); white-space: nowrap; }
.info-cell input { flex: 1; height: 22px; padding: 1px 5px; font-size: 10.5px; border: 1px solid var(--border); border-radius: 3px; background: var(--white); outline: none; }
.cblabel { display: inline-flex; align-items: center; gap: 3px; cursor: pointer; font-size: 11px; white-space: nowrap; user-select: none; }
.cblabel input[type="checkbox"] { width: 12px; height: 12px; accent-color: var(--navy); cursor: pointer; }

/* ── CONSULTANT ROW ── */
.consultant-row { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; padding: 3px 10px; border-bottom: 1px solid var(--border); font-size: 11px; background: #f7f9fc; }
.consultant-row label { font-weight: 600; color: var(--navy); white-space: nowrap; }
.consultant-row input[type="text"], .consultant-row input[type="date"] { height: 22px; padding: 1px 5px; font-size: 10.5px; border: 1px solid var(--border); border-radius: 3px; background: var(--white); outline: none; }

/* ── PLAN OF CARE ROW ── */
.plan-row { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; padding: 4px 10px; border-bottom: 1px solid var(--border); font-size: 11px; background: var(--navy-light); }
.plan-row label { font-weight: 600; color: var(--navy); white-space: nowrap; }
.plan-row input[type="text"] { height: 22px; padding: 1px 5px; font-size: 10.5px; border: 1px solid var(--border); border-radius: 3px; outline: none; }

/* ── SECTION HEADER ── */
.sec-hd { background: var(--navy); color: #fff; padding: 5px 12px; font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.6px; border-bottom: 1px solid var(--border); }

/* ── INSIGHT ROWS ── */
.insight-item { border-bottom: 1px solid var(--border-light); }
.insight-item:last-child { border-bottom: none; }
.insight-label { padding: 4px 12px 2px; font-weight: 600; color: var(--navy); font-size: 11px; background: var(--row-alt); border-bottom: 1px dashed var(--border-light); }
.insight-sub { display: flex; align-items: center; gap: 16px; padding: 2px 28px; border-bottom: 1px dashed var(--border-light); font-size: 11px; }
.insight-sub:last-child { border-bottom: none; }
.sub-who { font-weight: 600; color: var(--text-muted); min-width: 48px; font-size: 10.5px; }
.yn-group { display: inline-flex; gap: 8px; align-items: center; }
.yn-group .cblabel { font-size: 11px; }

/* ── SINGLE ROW (yes/no only, no patient/family split) ── */
.single-row { display: flex; align-items: center; gap: 16px; padding: 4px 12px; border-bottom: 1px solid var(--border-light); font-size: 11px; background: var(--row-alt); }
.single-row .row-lbl { font-weight: 600; color: var(--navy); min-width: 260px; }

/* ── STRESSORS SECTION ── */
.stressor-label { padding: 4px 12px 0; font-weight: 600; color: var(--navy); font-size: 11px; background: var(--row-alt); }

/* ── FREE TEXT ROWS ── */
.free-row { padding: 4px 12px; border-bottom: 1px solid var(--border-light); }
.free-row label { font-size: 10.5px; color: var(--text-muted); margin-bottom: 3px; display: block; }
.free-row input[type="text"] { width: 100%; border: none; border-bottom: 1px dashed var(--border); background: transparent; font-size: 11px; height: 22px; padding: 1px 3px; outline: none; }

/* ── SIGNATURE TABLE ── */
.sig-table { width: 100%; border-collapse: collapse; font-size: 11px; border-top: 2px solid var(--navy); }
.sig-table th { background: var(--navy-light); color: var(--navy); font-weight: 700; font-size: 10.5px; padding: 4px 10px; border: 1px solid var(--border); text-align: left; }
.sig-table td { padding: 6px 10px; border: 1px solid var(--border-light); vertical-align: middle; }
.sig-table tr:nth-child(even) td { background: var(--row-alt); }
.sig-table input { width: 100%; border: none; border-bottom: 1px solid var(--border); background: transparent; font-size: 11px; height: 20px; padding: 1px 3px; outline: none; }

/* ── FOOTER ── */
.form-footer { background: var(--navy-light); padding: 8px 14px; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); }
.footer-ref { font-size: 10px; color: var(--text-muted); }
.btn-group { display: flex; gap: 8px; }
.btn { padding: 5px 18px; border-radius: 3px; font-size: 11.5px; font-weight: 600; cursor: pointer; border: 1px solid transparent; transition: all 0.15s; }
.btn-outline { background: var(--white); border-color: var(--border); color: var(--text-muted); }
.btn-outline:hover { border-color: var(--navy-mid); color: var(--navy); }
.btn-primary { background: var(--navy); color: #fff; }
.btn-primary:hover { background: var(--navy-mid); }
.toast { position: fixed; top: 20px; right: 20px; background: var(--success); color: #fff; padding: 10px 16px; border-radius: 5px; font-size: 12px; font-weight: 600; box-shadow: 0 4px 16px rgba(0,0,0,0.2); transform: translateX(120%); transition: transform 0.3s ease; z-index: 9999; }
.toast.show { transform: translateX(0); }

@media (max-width: 700px) {
  .top-header, .info-grid { grid-template-columns: 1fr; }
}
@media print {
  body { background: #fff; padding: 0; }
  .btn-group { display: none; }
  .form-card { box-shadow: none; }
}
</style>
</head>
<body>
<form id="mainForm" action="{{ route('form9.store') }}"   method="POST" enctype="multipart/form-data">
@csrf
<div class="form-card">



  <!-- PATIENT BAR -->
  <div class="patient-bar">
    <div class="pb-cell"><label>Patient's Name:</label><input type="text" name="patient_name" weight="300" placeholder="Full Name"></div>
    <div class="pb-cell"><label>UHID:</label><input type="text" name="uhid" placeholder="UHID"></div>
  </div>

  <!-- INFO GRID -->
  <div class="info-grid">
    <div class="info-cell"><label>Gender:</label>
      <label class="cblabel"><input type="checkbox" name="gender" value="M"> M</label>
      <label class="cblabel"><input type="checkbox" name="gender" value="F"> F</label>
    </div>
    <div class="info-cell"><label>Age:</label><input type="number" name="age" style="width:60px;"></div>
    <div class="info-cell"><label>Department:</label><input type="text" name="department"></div>
    <div class="info-cell"><label>Bed/Cabin:</label><input type="text" name="bed_cabin"></div>
    <div class="info-cell" style="grid-column:1/-1;border-right:none;"><label>Consultant:</label><input type="text" name="consultant" style="max-width:300px;"></div>
  </div>

  <!-- CONSULTANT + DEPT + DATE ROW -->
  <div class="consultant-row">
    <label>Consultant:</label>
    <input type="text" name="consultant2" placeholder="Name" style="width:180px;">
    <label style="margin-left:10px;">Department:</label>
    <input type="text" name="dept2" placeholder="Department" style="width:140px;">
    <label style="margin-left:10px;">Date:</label>
    <input type="date" name="consult_date">
  </div>

  <!-- PLAN OF CARE -->
  <div class="plan-row">
    <label>Plan of Care:</label>
    <label class="cblabel"><input type="checkbox" name="plan" value="ICU"> ICU</label>
    <label class="cblabel"><input type="checkbox" name="plan" value="Room"> Room</label>
    <label class="cblabel"><input type="checkbox" name="plan" value="Ward"> Ward</label>
    <label class="cblabel"><input type="checkbox" name="plan" value="Other"> Other</label>
    <span style="color:var(--text-muted);font-size:10.5px;">(Specify)</span>
    <input type="text" name="plan_other" placeholder="Specify…" style="width:160px;">
  </div>

  <!-- INSIGHT TO THE CONDITION ASSESSED -->
  <div class="sec-hd">Insight to the Condition Assessed</div>

  <!-- Helper macro rendered inline for each insight item -->

  <!-- 1. Awareness of the Diagnosis -->
  <div class="insight-item">
    <div class="insight-label">Awareness of the Diagnosis:</div>
    <div class="insight-sub">
      <span class="sub-who">Patient</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="aware_diag_pt" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="aware_diag_pt" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="aware_diag_pt" value="Comatose"> Comatose</label>
      </div>
    </div>
    <div class="insight-sub">
      <span class="sub-who">Family</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="aware_diag_fam" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="aware_diag_fam" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- 2. Recognition of the Dying Status -->
  <div class="insight-item">
    <div class="insight-label">Recognition of the Dying Status:</div>
    <div class="insight-sub">
      <span class="sub-who">Patient</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="recog_dying_pt" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="recog_dying_pt" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="recog_dying_pt" value="Comatose"> Comatose</label>
      </div>
    </div>
    <div class="insight-sub">
      <span class="sub-who">Family</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="recog_dying_fam" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="recog_dying_fam" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- 3. Communication of Bed News to -->
  <div class="insight-item">
    <div class="insight-label">Communication of Bed News to:</div>
    <div class="insight-sub">
      <span class="sub-who">Patient</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="comm_bed_pt" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="comm_bed_pt" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="comm_bed_pt" value="Comatose"> Comatose</label>
      </div>
    </div>
    <div class="insight-sub">
      <span class="sub-who">Family</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="comm_bed_fam" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="comm_bed_fam" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- 4. Plan of care explained and discussed with -->
  <div class="insight-item">
    <div class="insight-label">Plan of care explained and discussed with:</div>
    <div class="insight-sub">
      <span class="sub-who">Patient</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="plan_exp_pt" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="plan_exp_pt" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="plan_exp_pt" value="Comatose"> Comatose</label>
      </div>
    </div>
    <div class="insight-sub">
      <span class="sub-who">Family</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="plan_exp_fam" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="plan_exp_fam" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- 5. Understanding of planned care -->
  <div class="insight-item">
    <div class="insight-label">Understanding of planned care:</div>
    <div class="insight-sub">
      <span class="sub-who">Patient</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="understand_pt" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="understand_pt" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="understand_pt" value="Comatose"> Comatose</label>
      </div>
    </div>
    <div class="insight-sub">
      <span class="sub-who">Family</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="understand_fam" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="understand_fam" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- 6. Psychological Stressors -->
  <div class="insight-item">
    <div class="insight-label">Psychological Stressors:</div>
    <div class="insight-sub">
      <span class="sub-who">Patient</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="psych_pt" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="psych_pt" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="psych_pt" value="Comatose"> Comatose</label>
      </div>
    </div>
    <div class="insight-sub">
      <span class="sub-who">Family</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="psych_fam" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="psych_fam" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- Clinical psychologist -->
  <div class="single-row">
    <span class="row-lbl">Clinical psychologist's Consultation required</span>
    <label class="cblabel"><input type="checkbox" name="clin_psych" value="Yes"> Yes</label>
    <label class="cblabel"><input type="checkbox" name="clin_psych" value="No"> No</label>
  </div>

  <!-- 7. Social Stressors -->
  <div class="insight-item">
    <div class="insight-label">Social Stressors:</div>
    <div class="insight-sub">
      <span class="sub-who">Patient</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="social_pt" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="social_pt" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="social_pt" value="Comatose"> Comatose</label>
      </div>
    </div>
    <div class="insight-sub">
      <span class="sub-who">Family</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="social_fam" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="social_fam" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- Medical social worker -->
  <div class="single-row">
    <span class="row-lbl">Medical Social worker's Consultations required</span>
    <label class="cblabel"><input type="checkbox" name="msw" value="Yes"> Yes</label>
    <label class="cblabel"><input type="checkbox" name="msw" value="No"> No</label>
  </div>

  <!-- 8. Religious / Spiritual needs -->
  <div class="insight-item">
    <div class="insight-label">Religious / Spiritual needs / Reaction to Illness assessed:</div>
    <div class="insight-sub">
      <span class="sub-who">Patient</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="relig_pt" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="relig_pt" value="No"> No</label>
        <label class="cblabel"><input type="checkbox" name="relig_pt" value="Comatose"> Comatose</label>
      </div>
    </div>
    <div class="insight-sub">
      <span class="sub-who">Family</span>
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="relig_fam" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="relig_fam" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- Religious traditional needs -->
  <div class="insight-item">
    <div class="insight-label">Religious, traditional needs identified:</div>
    <div class="insight-sub" style="padding-left:12px;">
      <div class="yn-group">
        <label class="cblabel"><input type="checkbox" name="trad_needs" value="Yes"> Yes</label>
        <label class="cblabel"><input type="checkbox" name="trad_needs" value="No"> No</label>
      </div>
    </div>
  </div>

  <!-- If yes specify -->
  <div class="free-row">
    <label>(If yes please specify)</label>
    <input type="text" name="trad_needs_specify" placeholder="…">
  </div>

  <!-- Identified special needs -->
  <div style="padding:6px 12px;border-bottom:1px solid var(--border);font-size:11px;background:var(--navy-light);">
    <div style="font-weight:600;color:var(--navy);margin-bottom:3px;">Identified special needs: <span style="font-weight:400;color:var(--text-muted);">(Despair, suffering, guilt, or forgiveness now, at all time of impending death, at death and after death):</span></div>
    <div style="display:flex;gap:12px;align-items:center;">
      <label class="cblabel"><input type="checkbox" name="special_needs" value="Yes"> Yes</label>
      <label class="cblabel"><input type="checkbox" name="special_needs" value="No"> No</label>
    </div>
  </div>
  <div class="free-row">
    <label>(If yes please specify):</label>
    <input type="text" name="special_needs_specify" placeholder="…">
  </div>

  <!-- SIGNATURE TABLE -->
  <div style="height:12px;background:var(--bg);border-top:1px solid var(--border);"></div>
  <table class="sig-table">
    <thead>
      <tr>
        <th style="width:16%;">Signature</th>
        <th style="width:24%;">Name</th>
        <th style="width:16%;">Emp. ID</th>
        <th style="width:24%;">Date</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-weight:600;color:var(--navy);background:var(--navy-light);">Doctor</td>
        <td><input type="text" name="doc_name" placeholder="Full name"></td>
        <td><input type="text" name="doc_empid" placeholder="ID"></td>
        <td><input type="date" name="doc_date" style="width:100%;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;height:20px;outline:none;padding:1px 3px;"></td>
        <td><input type="time" name="doc_time" style="width:100%;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;height:20px;outline:none;padding:1px 3px;"></td>
      </tr>
      <tr>
        <td style="font-weight:600;color:var(--navy);background:var(--navy-light);">Verified by</td>
        <td><input type="text" name="ver_name" placeholder="Full name"></td>
        <td><input type="text" name="ver_empid" placeholder="ID"></td>
        <td><input type="date" name="ver_date" style="width:100%;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;height:20px;outline:none;padding:1px 3px;"></td>
        <td><input type="time" name="ver_time" style="width:100%;border:none;border-bottom:1px solid var(--border);background:transparent;font-size:11px;height:20px;outline:none;padding:1px 3px;"></td>
      </tr>
    </tbody>
  </table>

  <!-- FOOTER -->
  <div class="form-footer">
    <span class="footer-ref">UHP/MS/IPD-027/VER-00/24 &nbsp;&nbsp; AF/LES/DNR/v01/Jan2026 – AF09</span>
    <div class="btn-group">
      <button type="button" class="btn btn-outline" onclick="resetForm()">Reset</button>
      <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Save &amp; Submit</button>
    </div>
  </div>

</div>
</form>
<div class="toast" id="toast">✓ Form submitted successfully!</div>
<script>
function confirmSubmit() {
    if (confirm("Are you sure you want to submit this form?")) {
        document.getElementById("mainForm").submit();
    }
}
function resetForm() {
  if (confirm('Reset all form fields?')) document.getElementById('mainForm').reset();
}
</script>
</body>
</html>