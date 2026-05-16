<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ADL Assessment Form</title>
<style>



  /* ══ PATIENT HEADER ══ */
  .pat-top {
    display: grid;
    grid-template-columns: 1fr 180px;
  }
  .pat-lbl {
    font-size: 9.5px; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.8px; color: rgba(255,255,255,0.65); display: block; margin-bottom: 2px;
  }
  .pat-top-cell input {
    background: transparent; border: none;
    border-bottom: 1px solid rgba(255,255,255,0.35);
    color: #fff; font-family: inherit; font-size: 12px;
    width: 100%; padding: 1px 0; outline: none;
  }
  .pat-top-cell input::placeholder { color: rgba(255,255,255,0.35); }

  .pat-row {
    display: flex; align-items: center; flex-wrap: wrap;
    gap: 14px; padding: 5px 10px; font-size: 11px;
  }
  .pat-row:last-child { border-bottom: none; }
  .pat-row .pr-lbl { font-weight: 700; color: rgba(255,255,255,0.85); white-space: nowrap; }
  .pat-row input[type="text"],
  .pat-row input[type="date"],
  .pat-row input[type="time"],
  .pat-row input[type="number"] {
    background: transparent; border: none;
    border-bottom: 1px solid rgba(255,255,255,0.35);
    color: #fff; font-family: inherit; font-size: 11px;
    outline: none; padding: 1px 2px;
  }
  .pat-row input[type="date"],
  .pat-row input[type="time"] { color-scheme: dark; }
  .pat-row label { display: flex; align-items: center; gap: 3px; cursor: pointer; color: rgba(255,255,255,0.82); }
  .pat-row input[type="checkbox"] { accent-color: #e8c080; width: 11px; height: 11px; }
  .pr-w70 { width: 70px; }
  .pr-w90 { width: 90px; }
  .pr-w50 { width: 50px; }

  /* ══ SECTION BLOCKS ══ */
  .section { border-bottom: 2px solid var(--border); }
  .section:last-child { border-bottom: none; }
  .sec-sub {
    padding: 3px 10px;
    font-size: 10.5px; color: var(--text-muted);
    font-style: italic;
    background: #f8f9fb;
    border-bottom: 1px solid var(--border-light);
  }

  /* ══ ADL TABLE ══ */
  .adl-table { width: 100%; border-collapse: collapse; }
  .adl-table th {
    background: var(--subrow);
    color: var(--navy);
    font-weight: 700; font-size: 10.5px;
    text-transform: uppercase; letter-spacing: 0.3px;
    padding: 5px 8px;
    border: 1px solid var(--border-light);
    text-align: left;
  }
  .adl-table td {
    padding: 4px 8px;
    border: 1px solid var(--border-light);
    vertical-align: middle;
    font-size: 11.5px;
  }
  .adl-table tr:nth-child(even) td { background: #f8fafc; }
  .adl-table tr:nth-child(odd) td { background: #fff; }

  .adl-table td.act-cell {
    font-weight: 500; color: var(--navy);
    width: 160px; background: #f0f4f8 !important;
  }
  .adl-table td.loa-cell { width: 320px; }

  .cb-row { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
  .cb-row label { display: flex; align-items: center; gap: 4px; cursor: pointer; font-size: 11.5px; white-space: nowrap; }
  .cb-row input[type="checkbox"] { accent-color: var(--navy); width: 12px; height: 12px; }

  .rem-input {
    width: 100%; border: none;
    border-bottom: 1px solid var(--border);
    font-family: inherit; font-size: 11px;
    padding: 1px 2px; background: transparent;
    outline: none; color: var(--text);
  }
  .rem-input:focus { border-bottom-color: var(--navy); }

  ══ FUNCTIONAL TOLERANCE ══
  .ft-table { width: 100%; border-collapse: collapse; }
  .ft-table td {
    padding: 5px 8px;
    border: 1px solid var(--border-light);
    vertical-align: middle;
    font-size: 11.5px;
  }
  .ft-table tr:nth-child(even) td { background: #f8fafc; }
  .ft-lbl {
    font-weight: 600; color: var(--navy);
    background: #f0f4f8 !important;
    width: 150px; white-space: nowrap;
  }
  .ft-wide { width: 100%; border-collapse: collapse; }
  .ft-wide td { padding: 5px 8px; border: 1px solid var(--border-light); font-size: 11.5px; vertical-align: middle; }
  .ft-wide .ft-lbl { background: #f0f4f8 !important; font-weight: 600; color: var(--navy); }



  /* ══ OVERALL STATUS ══ */
  .os-table { width: 100%; border-collapse: collapse; }
  .os-table td {
    padding: 5px 8px;
    border: 1px solid var(--border-light);
    vertical-align: middle;
    font-size: 11.5px;
  }
  .os-table tr:nth-child(even) td { background: #f8fafc; }
  .os-lbl { font-weight: 600; color: var(--navy); background: #e8eef8 !important; width: 170px; white-space: nowrap; }
</style>
 <link rel="stylesheet" href="{{ asset('assets/css/form_css.css') }}">

</head>
<body>
  <p class="page-title">ACTIVITY OF DAILY LIVING (ADL)</p>
<form id="mainForm" action="{{ route('form3.store') }}"   method="POST" enctype="multipart/form-data">
@csrf
<div class="page-wrap">

  <!-- ══ PATIENT HEADER ══ -->
  <div class="form-header">
    <div class="pat-top">
      <div class="hfield">
        <span class="pat-lbl">Patient's Name</span>
        <input type="text" class="pr-lbl" name="patient_name" placeholder="Full name">
      </div>
      <div class="hfield " style="margin-left:20px;">
        <span class="pat-lbl">UHID</span>
        <input type="text" class="pr-lbl" name="uhid" placeholder="Unit ID">
      </div>
    </div>

    <div class="pat-row">
      <div  class="hfield">
        <span class="pr-lbl">Age:</span>
        <input type="number" name="age" class="pr-w50" placeholder="yrs"> 
      </div>
      <span class="pr-lbl" style="margin-left:10px;">Gender:</span>
      <label><input type="checkbox" name="gender" value="M"> M</label>
      <label><input type="checkbox" name="gender" value="F"> F</label>

      <div class="hfield" >
        <span class="pr-lbl" style="margin-left:10px;">Date of Assessment:</span>
        <input type="date" name="assessment_date">

      </div>

      <div class="hfield" >
        <span class="pr-lbl" style="margin-left:6px;">Time:</span>
        <input type="time" name="assessment_time">
      </div>
    </div>

    <div class="pat-row">
    
       <div class="hfield" >
           <span class="pr-lbl">Height:</span>
           <input type="number" name="height_cm" class="pr-w70" placeholder="cm"> 
           <span style="color:rgba(255,255,255,0.65);font-size:10.5px;">cm</span>
          
       </div>
       <div class="hfield" > 
        <span class="pr-lbl" style="margin-left:12px;">Weight:</span>
        <input type="number" name="weight_kg" class="pr-w70" placeholder="kg"> 
        <span style="color:rgba(255,255,255,0.65);font-size:10.5px;">kg</span>
      </div>
       <div class="hfield" >
          <span class="pr-lbl" style="margin-left:12px;">BMI:</span>
          <input type="number" name="bmi" class="pr-w70" placeholder="kg/m²" step="0.1">
            <span style="color:rgba(255,255,255,0.65);font-size:10.5px;">kg/m²</span>
      </div>
    </div>

    <div class="pat-row">
      <span class="pr-lbl">Location:</span>
      <label><input type="checkbox" name="location" value="OPD"> OPD</label>
      <label><input type="checkbox" name="location" value="IPD"> IPD</label>
      <label><input type="checkbox" name="location" value="Others"> Others</label>
    </div>

    <div class="hfield">
      <label >Consultant:</label>
      <input type="text" name="consultant"   id="admTime" class="pr-w90" style="width:220px;" placeholder="Doctor name">
    </div>
  </div>

  <!-- ══ BASIC ADL ══ -->
  <div class="section">
    <div class="section-header blue">Basic ADL (BADL)</div>
    <div class="sec-sub">Self-care (Derived from Barthel Index / Katz ADL)</div>
    <table class="adl-table">
      <thead>
        <tr>
          <th style="width:160px;">Activity</th>
          <th>Level of Assistance</th>
          <th style="width:160px;">Remarks</th>
        </tr>
      </thead>
      <tbody id="badlBody">
        <!-- rows injected by JS -->
      </tbody>
    </table>
  </div>

  <!-- ══ MOBILITY ADL ══ -->
  <div class="section">
    <div class="section-header">Mobility-Related ADL</div>
    <div class="sec-sub">Critical for post-CABG, valve surgery, elderly CR patients</div>
    <table class="adl-table">
      <thead>
        <tr>
          <th style="width:160px;">Activity</th>
          <th>Level of Assistance</th>
          <th style="width:160px;">Remarks</th>
        </tr>
      </thead>
      <tbody id="mobilityBody">
      </tbody>
    </table>
  </div>

  <!-- ══ INSTRUMENTAL ADL ══ -->
  <div class="section">
    <div class="section-header olive">Instrumental ADL (IADL)</div>
    <div class="sec-sub">Lawton IADL – predicts CR adherence &amp; independence</div>
    <table class="adl-table">
      <thead>
        <tr>
          <th style="width:160px;">Activity</th>
          <th>Level of Assistance</th>
          <th style="width:160px;">Remarks</th>
        </tr>
      </thead>
      <tbody id="iadlBody">
      </tbody>
    </table>
  </div>

  <!-- ══ FUNCTIONAL TOLERANCE ══ -->
  <div class="section">
    <div class="section-header teal">Functional Tolerance During ADL</div>
    <table class="ft-wide">
      <tbody>
        <tr>
          <td class="ft-lbl">During ADL, patient reports:</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="ft_symptom" value="No symptoms"> No symptoms</label>
              <label><input type="checkbox" name="ft_symptom" value="Fatigue"> Fatigue</label>
              <label><input type="checkbox" name="ft_symptom" value="Dyspnoea"> Dyspnoea</label>
              <label><input type="checkbox" name="ft_symptom" value="Chest discomfort"> Chest discomfort</label>
              <label><input type="checkbox" name="ft_symptom" value="Dizziness"> Dizziness</label>
              <span style="color:var(--text-muted);">Others:</span>
              <input type="text" class="inp-lg" name="ft_others" placeholder="Specify">
            </div>
          </td>
        </tr>
        <tr>
          <td class="ft-lbl">Borg RPE during ADL:</td>
          <td>
            <div class="cb-row">
              <input type="number" class="inline w50" name="borg_rpe" min="6" max="20" placeholder="6–20"> / 20
              <span style="margin-left:16px;color:var(--text-muted);">Rest breaks needed:</span>
              <label><input type="checkbox" name="rest_breaks" value="Yes"> Yes</label>
              <label><input type="checkbox" name="rest_breaks" value="No"> No</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="ft-lbl">Assistive Devices / Support:</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="assistive" value="Caregiver assistance"> Caregiver assistance</label>
              <label><input type="checkbox" name="assistive" value="Walking aid"> Walking aid</label>
              <label><input type="checkbox" name="assistive" value="Toilet aid"> Toilet aid</label>
              <label><input type="checkbox" name="assistive" value="Bath chair"> Bath chair</label>
              <span style="color:var(--text-muted);">Others:</span>
              <input type="text" class="inline w120" name="assistive_others" placeholder="Specify">
            </div>
          </td>
        </tr>
        <tr>
          <td class="ft-lbl">ADL Safety &amp; Risk:</td>
          <td>
            <div class="cb-row" style="flex-wrap:wrap;gap:14px;">
              <span>Falls in last 6 months:
                <label style="display:inline-flex;align-items:center;gap:3px;margin-left:4px;"><input type="checkbox" name="falls_6m" value="Yes"> Yes</label>
                <label style="display:inline-flex;align-items:center;gap:3px;margin-left:6px;"><input type="checkbox" name="falls_6m" value="No"> No</label>
              </span>
              <span style="margin-left:10px;">Fear of falling:
                <label style="display:inline-flex;align-items:center;gap:3px;margin-left:4px;"><input type="checkbox" name="fear_fall" value="Yes"> Yes</label>
                <label style="display:inline-flex;align-items:center;gap:3px;margin-left:6px;"><input type="checkbox" name="fear_fall" value="No"> No</label>
              </span>
            </div>
            <div class="cb-row" style="margin-top:5px;">
              <span>Environmental barriers at home:
                <label style="display:inline-flex;align-items:center;gap:3px;margin-left:4px;"><input type="checkbox" name="env_barriers" value="Yes"> Yes</label>
                <label style="display:inline-flex;align-items:center;gap:3px;margin-left:6px;"><input type="checkbox" name="env_barriers" value="No"> No</label>
              </span>
            </div>
          </td>
        </tr>
        <tr>
          <td class="ft-lbl">Sleeping disturbance:</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="sleep_dist" value="Yes"> Yes</label>
              <label><input type="checkbox" name="sleep_dist" value="No"> No</label>
              <span style="margin-left:10px;color:var(--text-muted);">Remarks:</span>
              <input type="text" class="inline w200" name="sleep_remarks" placeholder="Remarks">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ══ OVERALL STATUS ══ -->
  <div class="section">
    <div class="section-header navy">Overall ADL Status &amp; Recommendation</div>
    <table class="os-table">
      <tbody>
        <tr>
          <td class="os-lbl">Overall ADL Status:</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="adl_status" value="Independent"> Independent</label>
              <label><input type="checkbox" name="adl_status" value="Modified independence"> Modified independence</label>
              <label><input type="checkbox" name="adl_status" value="Partially dependent"> Partially dependent</label>
              <label><input type="checkbox" name="adl_status" value="Fully dependent"> Fully dependent</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="os-lbl">Continue ADL Progression:</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="adl_prog" value="Yes"> Yes</label>
              <label><input type="checkbox" name="adl_prog" value="No"> No</label>
              <span style="margin-left:10px;color:var(--text-muted);">Remarks:</span>
              <input type="text" class="inline w200" name="adl_prog_remarks" placeholder="Remarks">
            </div>
          </td>
        </tr>
        <tr>
          <td class="os-lbl">Recommendations:</td>
          <td>
            <div class="cb-row" style="flex-wrap:wrap;gap:6px 14px;">
              <label><input type="checkbox" name="recommendation" value="Suitable for standard CR program"> Suitable for standard CR program</label>
              <label><input type="checkbox" name="recommendation" value="Requires supervised / low-intensity CR"> Requires supervised / low-intensity CR</label>
              <label><input type="checkbox" name="recommendation" value="Needs ADL-focused prehabilitation before CR"> Needs ADL-focused prehabilitation before CR</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="os-lbl">Patient / Family Education:</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="education" value="Provided"> Provided</label>
              <label><input type="checkbox" name="education" value="Pending"> Pending</label>
              <label><input type="checkbox" name="education" value="Scheduled"> Scheduled, Date:</label>
              <input type="date" name="education_date">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ══ SIGNATURE ══ -->
  <div class="sig-grid">
    <div class="sig-cell">
      <label>Name &amp; Signature of the Physiotherapist</label>
      <input type="text" name="physio_name" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Date and Time</label>
      <input type="datetime-local" name="physio_datetime">
    </div>
    <div class="sig-cell">
      <label>Verified by</label>
      <input type="text" name="verified_name" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Emp. ID</label>
      <input type="text" name="emp_id" placeholder="Employee ID">
    </div>
  </div>

  <!-- ══ FOOTER ══ -->
  <div class="form-footer">
    <button type="button" class="btn btn-outline" onclick="resetForm()">Reset</button>
    <button type="submit" class="btn btn-primary" >Save &amp; Submit</button>
  </div>

</div>
</form>

<div class="toast" id="toast">✓ ADL Assessment saved successfully!</div>

<script>
  /* ── ADL row data ── */
  const badlActivities = [
    'Feeding / Eating',
    'Grooming (face, hair, etc)',
    'Oral Care / Brushing',
    'Bathing / Shower',
    'Dressing / Undressing',
    'Toileting / Commode',
    'Bladder & Bowel control',
  ];

  const mobilityActivities = [
    'Bed mobility (rolling)',
    'Sit ↔ Stand',
    'Transfer Bed ↔ Chair',
    'Walking / Ambulation',
    'Stair Climbing',
  ];

  const iadlActivities = [
    'Using telephone',
    'Medication management',
    'Meal preparation',
    'Light housework',
    'Shopping',
    'Handling finances',
    'Transportation',
  ];

  function buildADLRows(activities, tbodyId, prefix) {
    const tbody = document.getElementById(tbodyId);
    activities.forEach((act, i) => {
      const n = `${prefix}_${i}`;
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="act-cell" data-label="Activity">${act}</td>
        <td class="loa-cell" data-label="Level of Assistance">
          <div class="cb-row">
            <label><input type="checkbox" name="${n}_loa" value="Independent"> Independent</label>
            <label><input type="checkbox" name="${n}_loa" value="Partial"> Partial</label>
            <label><input type="checkbox" name="${n}_loa" value="Full Assistance"> Full Assistance</label>
          </div>
        </td>
        <td class="rem-cell" data-label="Remarks"><input type="text" class="rem-input" name="${n}_rem" placeholder="—"></td>
      `;
      tbody.appendChild(tr);
    });
  }

  buildADLRows(badlActivities, 'badlBody', 'badl');
  buildADLRows(mobilityActivities, 'mobilityBody', 'mob');
  buildADLRows(iadlActivities, 'iadlBody', 'iadl');

  /* ── Reset ── */
  function resetForm() {
    if (confirm('Reset all fields?')) document.getElementById('mainForm').reset();
  }

  /* ── Submit ── */
  function submitForm() {
    const t = document.getElementById('toast');
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
  }
</script>
</body>
</html>