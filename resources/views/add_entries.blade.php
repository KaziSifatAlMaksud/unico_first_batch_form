<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patient Admission Assessment Form</title>
<link href="{{ asset('assets/css/form_css.css') }}" rel="stylesheet">
</head>
<body>

<p class="page-title">Patient Admission Assessment</p>

@if(session('success'))

    <div class="alert-success">
        {{ session('success') }}
    </div>

@endif

<form action="{{ url('/all_entries/store') }}" method="POST">
    @csrf

<div class="form-card">

  <!-- HEADER -->
  <div class="form-header">
    <div class="hfield">
      <label>Date</label>
      <input type="date" id="admDate" name="admission_date" value="2026-05-10">
    </div>
    <div class="hfield">
      <label>Initiated at</label>
      <input type="time" id="admTime" name="initiated_at" value="12:20">
    </div>
    <div class="hfield">
      <label>How admitted</label>
      <select id="howAdmitted" name="admission_method">
        <option value="stretcher" selected>Stretcher</option>
        <option value="wheelchair">Wheelchair</option>
        <option value="ambulatory">Ambulatory</option>
        <option value="ambulance">Ambulance</option>
      </select>
    </div>
    <div class="hfield">
      <label>Bystander present</label>
      <select id="bystander" name="bystander_present">
        <option value="yes" selected>Yes</option>
        <option value="no">No</option>
      </select>
    </div>
  </div>

  <!-- GENERAL -->
  <div class="section">
    <div class="section-header">General Information</div>
    <div class="section-body">

      <div class="form-row">
        <span class="fl">General condition:</span>
        <input type="text" id="genCondition" name="general_condition" class="inp-lg"  placeholder="e.g. Alert, Drowsy…">
      </div>

      <div class="form-row">
        <span class="fl">Respiratory Support:</span>
        <select id="respSupport" name="respiratory_support">
          <option selected>Room air</option>
          <option>O2 Mask</option>
          <option>NIV</option>
          <option>Mechanical Ventilation</option>
        </select>
        <input type="text" id="respDetail" name="respiratory_support_detail" class="inp-md" placeholder="Details">
        <span class="fl fl-sm" style="margin-left:12px;">Mother tongue:</span>
        <select id="motherTongue" name="mother_tongue">
          <option selected>Bangla</option><option>English</option><option>Hindi</option><option>Other</option>
        </select>
        <span class="fl fl-xs">Can speak:</span>
        <select id="canSpeak" name="can_speak">
          <option selected>Bangla</option><option>English</option><option>Hindi</option><option>Other</option>
        </select>
      </div>

      <div class="form-row">
        <span class="fl">Lines/Tubes/Drains:</span>
        <select id="linesPresent" name="has_lines_drains" onchange="toggleLines()">
          <option value="No" selected>No</option>
          <option value="Yes">Yes</option>
        </select>
        <span class="fl fl-xs">Specify:</span>
        <div class="cbgroup" id="linesGroup" style="opacity:0.4;pointer-events:none;">
          <label class="cblabel"><input type="checkbox" name="line" value="CV Line"> CV Line</label>
          <label class="cblabel"><input type="checkbox" name="line" value="IV Cannula"> IV Cannula</label>
          <label class="cblabel"><input type="checkbox" name="line" value="Foleys Catheta"> Foleys Catheta</label>
          <label class="cblabel"><input type="checkbox" name="line" value="ICD"> ICD</label>
          <label class="cblabel"><input type="checkbox" name="line" value="Ryles Tube"> Ryles Tube</label>
          <label class="cblabel"><input type="checkbox" name="line" value="Wound Drain"> Wound Drain</label>
          <label class="cblabel"><input type="checkbox" name="line" value="Tracheostomy Tube"> Tracheostomy Tube</label>
          <label class="cblabel"><input type="checkbox" name="line" value="Peg Tube"> Peg Tube</label>
          <label class="cblabel"><input type="checkbox" name="line" value="Pig Line"> Pig Line</label>
        </div>
      </div>

      <div class="form-row">
        <span class="fl">Height:</span>
        <input type="number"  id="height" name="height_cm" class="inp-sm" placeholder="cm"> <span style="font-size:11px;color:var(--text-muted);">cm</span>
        <span class="fl fl-sm" style="margin-left:16px;">Weight:</span>
        <input type="number" id="weight" name="weight_kg" class="inp-sm" value="41" placeholder="kg"> <span style="font-size:11px;color:var(--text-muted);">kg</span>
        <span class="fl" style="min-width:180px;margin-left:16px;">Cultural/Religious Needs:</span>
        <select id="culturalNeeds" name="cultural_needs"><option selected>No</option><option>Yes</option></select>
        <span class="fl fl-sm" style="margin-left:12px;">Allergies:</span>
        <select id="allergies" name="allergies"><option selected>No</option><option>Yes</option></select>
        <span style="font-size:11px;color:var(--text-muted);margin-left:4px;">Pain:</span>
        <select id="pain" name="pain_present" style="width:70px;"><option selected>No</option><option>Yes</option></select>
      </div>

    </div>
  </div>

  <!-- GCS -->
  <div class="section">
    <div class="section-header">GCS — Glasgow Coma Scale</div>
    <div class="section-body">
      <div class="gcs-grid">
        <div class="gcs-cell">
          <label>Eyes open (E)</label>
          <select id="gcsE" name="gcs_eyes" onchange="calcGCS()">
            <option value="4">4 — Spontaneous</option>
            <option value="3" selected>3 — To voice</option>
            <option value="2">2 — To pain</option>
            <option value="1">1 — None</option>
          </select>
        </div>
        <div class="gcs-cell">
          <label>Verbal response (V)</label>
          <select id="gcsV" name="gcs_verbal" onchange="calcGCS()">
            <option value="5">5 — Oriented</option>
            <option value="4">4 — Confused</option>
            <option value="3" selected>3 — Words</option>
            <option value="2">2 — Sounds</option>
            <option value="1">1 — None</option>
          </select>
        </div>
        <div class="gcs-cell">
          <label>Motor response (M)</label>
          <select id="gcsM" name="gcs_motor" onchange="calcGCS()">
            <option value="6">6 — Obeys</option>
            <option value="5">5 — Localises</option>
            <option value="4">4 — Withdraws</option>
            <option value="3" selected>3 — Flexion</option>
            <option value="2">2 — Extension</option>
            <option value="1">1 — None</option>
          </select>
        </div>
        <div class="gcs-cell" style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:4px;">
          <label>Total score</label>
          <div class="gcs-total" id="gcsTotal">9</div>
        </div>
      </div>
    </div>
  </div>

  <!-- VITALS -->
  <div class="section">
    <div class="section-header">Vital Signs</div>
    <div class="section-body">
      <div class="vitals-grid">
        <div class="vital-cell">
          <label>Temp</label>
          <div class="vital-input-wrap"><input type="number" id="temp" name="temp_fahrenheit" value="99"> <span class="unit">°F</span></div>
        </div>
        <div class="vital-cell">
          <label>Pulse</label>
          <div class="vital-input-wrap"><input type="number" id="pulse" name="pulse_per_min" value="112"> <span class="unit">/min</span></div>
        </div>
        <div class="vital-cell">
          <label>Resp Rate</label>
          <div class="vital-input-wrap"><input type="number" id="resp" name="resp_rate_per_min"> <span class="unit">/min</span></div>
        </div>
        <div class="vital-cell">
          <label>BP</label>
          <div class="bp-wrap">
            <input type="number" id="bpSys" name="bp_systolic" value="120">
            <span class="bp-sep">/</span>
            <input type="number" id="bpDia" name="bp_diastolic" value="90">
            <span class="unit">mmHg</span>
          </div>
        </div>
        <div class="vital-cell">
          <label>SpO2</label>
          <div class="vital-input-wrap"><input type="number" id="spo2" name="spo2_percent" value="97" max="100"> <span class="unit">%</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- VENTILATOR -->
  <div class="section">
    <div class="section-header">Invasive / Non-Invasive / Hiflow Ventilation</div>
    <div class="section-body">
      <div class="form-row">
        <span class="fl">Ventilation:</span>
        <select id="ventilation" name="ventilation_type" onchange="toggleVentilator()">
          <option value="No" selected>No</option>
          <option value="Invasive">Invasive</option>
          <option value="Non-Invasive">Non-Invasive</option>
          <option value="Hiflow">Hiflow</option>
        </select>
      </div>
      <div id="ventFields" style="display:none; margin-top:6px;">
        <div class="vent-grid">
          <div class="vent-cell"><label>Mode</label><select name="vent_mode"><option>CPAP</option><option>BiPAP</option><option>SIMV</option><option>AC</option></select></div>
          <div class="vent-cell"><label>Rate</label><input type="number" name="vent_rate" placeholder="breaths/min"></div>
          <div class="vent-cell"><label>TV (mL)</label><input type="number" name="vent_tv" placeholder="Tidal volume"></div>
          <div class="vent-cell"><label>Exp TV</label><input type="number" name="vent_exp_tv" placeholder="Exp tidal vol"></div>
          <div class="vent-cell"><label>Total RR</label><input type="number" name="vent_total_rr" placeholder="RR"></div>
          <div class="vent-cell"><label>I:E Ratio</label><input type="text" name="vent_ie_ratio" placeholder="e.g. 1:2"></div>
          <div class="vent-cell"><label>FiO2 (%)</label><input type="number" placeholder="FiO2"></div>
          <div class="vent-cell"><label>PEEP/CPAP</label><input type="number" placeholder="cmH2O"></div>
          <div class="vent-cell"><label>Peak Airway P.</label><input type="number" placeholder="cmH2O"></div>
          <div class="vent-cell"><label>Plateau</label><input type="number" placeholder="cmH2O"></div>
          <div class="vent-cell"><label>Flow (L/min)</label><input type="number" placeholder="Flow"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ORIENTATION & AIDS -->
  <div class="section">
    <div class="section-header">Orientation &amp; Personal Aids</div>
    <div class="section-body">

      <div class="form-row">
        <span class="fl">Orientation (Patient/Attendant):</span>
        <div class="orient-checks">
          <label class="orient-check"><input type="checkbox" name="orient_side_rails" id="orientSideRails"> Side rails</label>
          <label class="orient-check"><input type="checkbox" name="orient_privacy" id="orientPrivacy"> Patient rights of privacy and confidentiality</label>
          <label class="orient-check"><input type="checkbox" name="orient_visitor" id="orientVisitor"> Visitor Policy</label>
        </div>
      </div>

      <div style="margin-top:8px;">
        <div class="aids-grid">
          <div class="aid-cell">
            <label>Dentures</label>
            <select name="dentures">
              <option>No</option>
              <option>Upper</option>
              <option>Lower</option>
              <option>Both</option>
            </select>
          </div>
          <div class="aid-cell">
            <label>Eyewear</label>
            <select name="eyewear">
              <option>No</option>
              <option>Glasses</option>
              <option>Contact lenses</option>
            </select>
          </div>
          <div class="aid-cell">
            <label>Hearing Aid</label>
            <select name="hearing_aid">
              <option>No</option>
              <option>Left</option>
              <option>Right</option>
              <option>Both</option>
            </select>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- VULNERABILITY & DVT -->
  <div class="section">
    <div class="section-header">Vulnerability Assessment &amp; DVT — Modified WELLS Scoring</div>
    <div class="section-body">
      <div class="vuln-dvt-grid">

        <!-- VULNERABILITY -->
        <div class="vuln-col">
          <div class="sub-title">Vulnerability Assessment</div>
          <table class="vuln-table">
            <thead>
              <tr><th>Parameters</th><th>Yes / No</th></tr>
            </thead>
            <tbody>
              <tr><td>Children &lt;16 yrs</td><td><select name="children_under_16"><option selected>No</option><option>Yes</option></select></td></tr>
              <tr><td>Adolescent</td><td><select name="adolescent"><option selected>No</option><option>Yes</option></select></td></tr>
              <tr><td>Elderly &gt;65 years</td><td><select name="elderly_over_65"><option>No</option><option selected>Yes</option></select></td></tr>
              <tr><td>Frail elderly</td><td><select name="frail_elderly"><option selected>No</option><option>Yes</option></select></td></tr>
              <tr><td>Physically challenged</td><td><select name="physically_challenged"><option selected>No</option><option>Yes</option></select></td></tr>
              <tr><td>Cognitive impairment</td><td><select name="cognitive_impairment"><option selected>No</option><option>Yes</option></select></td></tr>
              <tr><td>Sensory impairment</td><td><select name="sensory_impairment"><option selected>No</option><option>Yes</option></select></td></tr>
              <tr><td>Language barrier</td><td><select name="language_barrier"><option selected>No</option><option>Yes</option></select></td></tr>
              <tr><td>At risk of violence</td><td><select name="at_risk_of_violence"><option selected>No</option><option>Yes</option></select></td></tr>
            </tbody>
          </table>
        </div>

        <!-- DVT -->
        <div class="dvt-col">
          <div class="sub-title">DVT Assessment — Modified WELLS Scoring</div>
          <table class="dvt-table">
            <thead>
              <tr><th>Clinical Characteristics</th><th style="text-align:center;">Score</th><th style="text-align:center;">Tick</th></tr>
            </thead>
            {{-- <tbody id="dvtBody">
              <tr><td>Active Cancer (previous 6 months or currently receiving palliative treatment)</td><td class="score-cell">+1</td><td class="tick-cell"><input type="checkbox" name="dvt_active_cancer" onchange="calcDVT()"></td></tr>
              <tr><td>Paralysis, paresis or recent plaster immobilization of the lower extremities</td><td class="score-cell">+1</td><td class="tick-cell"><input type="checkbox" name="dvt_paralysis" onchange="calcDVT()"></td></tr>
              <tr><td>Recently bedridden for &gt;3 days or major surgery within 12 weeks</td><td class="score-cell">+1</td><td class="tick-cell"><input type="checkbox" name="dvt_bedridden" onchange="calcDVT()"></td></tr>
              <tr><td>Localized tenderness along the distribution of the deep venous system</td><td class="score-cell">+1</td><td class="tick-cell"><input type="checkbox" name="dvt_tenderness" onchange="calcDVT()"></td></tr>
              <tr><td>Entire leg swollen</td><td class="score-cell">+1</td><td class="tick-cell"><input type="checkbox" name="dvt_swollen" onchange="calcDVT()"></td></tr>
              <tr><td>Calf swelling &gt;3 cm compared to asymptomatic leg</td><td class="score-cell">+1</td><td class="tick-cell"><input type="checkbox" name="dvt_calf_swelling" onchange="calcDVT()"></td></tr>
              <tr><td>Pitting oedema confined to the symptomatic leg</td><td class="score-cell">+1</td><td class="tick-cell"><input type="checkbox" name="dvt_pitting_oedema" onchange="calcDVT()"></td></tr>
              <tr><td>Collateral superficial veins (non-varicose)</td><td class="score-cell">+1</td><td class="tick-cell"><input type="checkbox" name="dvt_collateral_veins" onchange="calcDVT()"></td></tr>
            </tbody> --}}
          </table>
          <div style="margin-top:8px;display:flex;align-items:center;gap:10px;">
            <span style="font-size:12px;font-weight:600;color:var(--navy);">WELLS Total Score:</span>
            <div id="dvtScore" style="background:var(--navy);color:#fff;border-radius:4px;padding:4px 14px;font-size:16px;font-weight:700;">0</div>
            <span id="dvtRisk" style="font-size:12px;font-weight:600;color:var(--text-muted);"></span>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <div class="form-footer">
    <button class="btn btn-outline" onclick="resetForm()">Reset</button>
    <button class="btn btn-primary" onclick="submitForm()">Save &amp; Submit</button>
  </div>

</div>
</form>

<div class="toast" id="toast">✓ Form submitted successfully!</div>
<script src="{{ asset('assets/js/patient.js') }}"></script>
</body>
</html>