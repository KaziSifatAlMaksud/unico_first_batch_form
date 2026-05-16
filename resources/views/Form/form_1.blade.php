<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Assessment For Cardiac Rehabilitation (ACR) Form</title>
<link href="{{ asset('assets/css/form_css.css') }}" rel="stylesheet">
</head>
<body>

<p class="page-title">Assessment For Cardiac Rehabilitation (ACR) Form</p>


<form action="{{ route('store_admission') }}" method="POST" id="mainForm">
  @csrf

<div class="form-card">

  <!-- HEADER -->
  <div class="form-header">
    <div class="hfield">
      <label>Patient's Name</label>
      <input type="text" id="patientName" name="patient_name" value="">
    </div>
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
       <div class="hfield">
      <label>Consultant</label>
      <input type="text" id="consultant" name="consultant_present" value="">
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       1. CARDIAC DIAGNOSIS & CLINICAL STATUS
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">1 · Cardiac Diagnosis &amp; Clinical Status</div>
    <div class="section-body">

      <!-- Primary Diagnosis -->
      <div class="form-row">
        <span class="fl">Primary Diagnosis (tick all that apply):</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="PreopCABG"> Preop – CABG</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="PreopOHS"> Preop – OHS</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="PostCABG"> Post – CABG</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="PostOHS"> Post – OHS</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="PostPCI"> Post – PCI</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="Valve surgery"> Valve surgery</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="ACS/MI"> ACS / MI</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="Heart Failure"> Heart Failure</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="Congenital"> Congenital</label>
          <label class="cblabel"><input type="checkbox" name="p_diagnosis[]" value="Others"> Others</label>
        </div>
      </div>

      <!-- Date of Index cardiac event -->
      <div class="form-row">
        <span class="fl">Date of Index cardiac event/surgery:</span>

            <select name="cardiac_event_duration" style="width:120px;margin-left:3px;">
              <option value="1">&lt;30 Days</option>
              <option value="2">1–3 months</option>
              <option value="3">2–6 months</option>
              <option value="4">&gt;6 months</option>
            </select>

        <span class="fl">Left Ventricular Function:</span>

          <select name="left_ventricular_function" style="width:150px;margin-left:3px;">
            <option value="preserved">Preserved</option>
            <option value="mild">Mild</option>
            <option value="moderate">Moderate</option>
            <option value="severe">Severe</option>
          </select>
        <span class="fl fl-sm" style="margin-left:10px;">EF%:</span>
        <input type="number" id="efPercent" name="ef_percent" class="inp-sm" placeholder="%"> %
      
      </div>

      <!-- LV Function -->
      <div class="form-row">
         <span class="fl">Diagnosis:</span>
        <input type="text" name="diagnosis_text" class="inp-lg" placeholder="Enter diagnosis">
        <span class="fl fl-sm" style="margin-left:10px;">Planned Procedure:</span>
        <input type="text" name="planned_procedure" class="inp-lg" placeholder="Procedure">
        <span class="fl fl-sm" style="margin-left:10px;">DOS:</span>
        <input type="date" name="dos_date">
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       2. CARDIOVASCULAR STABILITY
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">2 · Cardiovascular Stability</div>
    <div class="section-body">

      <!-- Vitals row -->
      <div class="form-row">
        <span class="fl">Vitals:</span>
        <div class="vitals-grid">
          <div class="vital-cell">
            <label>Pulse</label>
            <div class="vital-input-wrap"><input type="number" name="pulse_per_min" class="inp-sm" value="112"> <span class="unit">/min</span></div>
          </div>
          <div class="vital-cell">
            <label>BP</label>
            <div class="bp-wrap">
              <input type="number" name="bp_systolic" value="120">
              <span class="bp-sep">/</span>
              <input type="number" name="bp_diastolic" value="90">
              <span class="unit">mmHg</span>
            </div>
          </div>
          <div class="vital-cell">
            <label>Temp</label>
            <div class="vital-input-wrap"><input type="number" name="temp_fahrenheit" value="99"> <span class="unit">°F</span></div>
          </div>
          <div class="vital-cell">
            <label>Resp Rate</label>
            <div class="vital-input-wrap"><input type="number" name="resp_rate"> <span class="unit">/min</span></div>
          </div>
          <div class="vital-cell">
            <label>SpO₂</label>
            <div class="vital-input-wrap"><input type="number" name="spo2_percent" value="97" max="100"> <span class="unit">%</span></div>
          </div>
        </div>
      </div>

      <!-- Heart Rhythm -->
      <div class="form-row">
        <span class="fl">Heart rhythm:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="heart_rhythm[]" value="Sinus rhythm"> Sinus rhythm</label>
          <label class="cblabel"><input type="checkbox" name="heart_rhythm[]" value="Atrial fibrillation"> Atrial fibrillation</label>
          <label class="cblabel"><input type="checkbox" name="heart_rhythm[]" value="Pacing"> Pacing</label>
          <label class="cblabel"><input type="checkbox" name="heart_rhythm[]" value="Others"> Others</label>
        </div>
      </div>

      <!-- Symptoms at rest -->
      <div class="form-row">
        <span class="fl">Symptoms at rest:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="symptoms_rest[]" value="Angina (Chest pain)"> Angina (Chest pain)</label>
          <label class="cblabel"><input type="checkbox" name="symptoms_rest[]" value="Dyspnoea"> Dyspnoea</label>
          <label class="cblabel"><input type="checkbox" name="symptoms_rest[]" value="Palpitations"> Palpitations</label>
          <label class="cblabel"><input type="checkbox" name="symptoms_rest[]" value="Syncope"> Syncope</label>
          <label class="cblabel"><input type="checkbox" name="symptoms_rest[]" value="Dizziness"> Dizziness</label>
          <label class="cblabel"><input type="checkbox" name="symptoms_rest[]" value="None"> None</label>
          <label class="cblabel"><input type="checkbox" name="symptoms_rest[]" value="Others"> Others</label>
          <input type="text" name="symptoms_rest_others" class="inp-lg" placeholder="If others, specify here">
        </div>
      </div>

    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       3. VULNERABILITY ASSESSMENT
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">3 · Vulnerability Assessment (If any present → defer CR enrollment)</div>
    <div class="section-body">
      <div class="form-row">
        <span class="fl">Contraindications to Exercise:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="contraindication[]" value="Unstable angina"> Unstable angina</label>
          <label class="cblabel"><input type="checkbox" name="contraindication[]" value="Decompensated heart failure"> Decompensated heart failure</label>
          <label class="cblabel"><input type="checkbox" name="contraindication[]" value="Arrhythmia"> Arrhythmia</label>
        </div>
      </div>
      <div class="form-row">
        <div class="cbgroup" style="margin-left:180px;">
          <label class="cblabel"><input type="checkbox" name="contraindication[]" value="Resting SBP >180 mmHg"> Resting SBP &gt;180 mmHg</label>
          <label class="cblabel"><input type="checkbox" name="contraindication[]" value="Resting DBP >110 mmHg"> Resting DBP &gt;110 mmHg</label>
          <label class="cblabel"><input type="checkbox" name="contraindication[]" value="Acute infection / fever"> Acute infection / fever</label>
          <label class="cblabel"><input type="checkbox" name="contraindication[]" value="Acute DVT / PE"> Acute DVT / PE</label>
        </div>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       4. COMORBIDITIES & RISK FACTORS
  ══════════════════════════════════════════════════════════ -->
    <div class="section-header">4 · Comorbidities &amp; Risk Factors (tick all that apply)</div>
    <div class="section-body">
      <div class="form-row">
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Hypertension"> Hypertension</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Diabetes mellitus"> Diabetes mellitus</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Dyslipidaemia"> Dyslipidaemia</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Chronic kidney disease"> Chronic kidney disease</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Stroke / TIA"> Stroke / TIA</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Peripheral vascular disease"> Peripheral vascular disease</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="COPD / asthma"> COPD / asthma</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Obesity"> Obesity (BMI
            <input type="number" name="obesity_bmi" class="inp-sm" placeholder="BMI" style="width:50px;margin-left:3px;">)</label>
        </div>
      </div>
      <div class="form-row">
         <span class="fl fl-sm" style="margin-left:20px;">Family History of :</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Cardiac (family)">  Cardiac</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Diabetes (family)"> Diabetes</label>
          <label class="cblabel"><input type="checkbox" name="comorbidity[]" value="Others (family)"> Others</label>
        </div>
        <span class="fl fl-sm" style="margin-left:20px;">Smoking status:</span>
        <select name="smoking" class="form-control">
            <option value="">Select Smoking Status</option>
            <option value="Current">Current</option>
            <option value="Ex-smoker">Ex-smoker</option>
            <option value="Never">Never</option>
        </select>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       5. EXERCISE CAPACITY & FUNCTIONAL ASSESSMENT
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">5 · Exercise Capacity &amp; Functional Assessment</div>
    <div class="section-body">

      <div class="sub-title">6-Minute Walk Test</div>

      <div class="form-row">
        <span class="fl">Distance:</span>
        <input type="number" name="walk_distance" class="inp-md" placeholder="meters"> <span class="unit">meters</span>
      </div>

      <table class="mob-table" style="margin-bottom:8px;">
        <thead><tr><th></th><th>HR (/min)</th><th>BP (mmHg)</th><th>SpO₂ (%)</th></tr></thead>
        <tbody>
          <tr>
            <td>Pre-test</td>
            <td><input type="number" name="pretest_hr" class="inp-sm" placeholder="HR"></td>
            <td>
              <div class="bp-wrap">
                <input type="number" name="pretest_bp_sys" style="width:45px;" placeholder="Sys">
                <span class="bp-sep">/</span>
                <input type="number" name="pretest_bp_dia" style="width:45px;" placeholder="Dia">
              </div>
            </td>
            <td><input type="number" name="pretest_spo2" class="inp-sm" placeholder="%"></td>
          </tr>
          <tr>
            <td>Post-test</td>
            <td><input type="number" name="posttest_hr" class="inp-sm" placeholder="HR"></td>
            <td>
              <div class="bp-wrap">
                <input type="number" name="posttest_bp_sys" style="width:45px;" placeholder="Sys">
                <span class="bp-sep">/</span>
                <input type="number" name="posttest_bp_dia" style="width:45px;" placeholder="Dia">
              </div>
            </td>
            <td><input type="number" name="posttest_spo2" class="inp-sm" placeholder="%"></td>
          </tr>
        </tbody>
      </table>

      <div class="form-row">
        <label class="cblabel"><input type="checkbox" name="mets_estimated"> Estimated METs:</label>
        <input type="number" name="mets_value" class="inp-sm" placeholder="METs" step="0.1">
        <span class="fl fl-sm" style="margin-left:20px;">Borg RPE (6–20) at Rest:</span>
        <input type="number" name="borg_rest" class="inp-sm" min="6" max="20" placeholder="6–20">
        <span class="fl fl-sm" style="margin-left:10px;">At peak exercise:</span>
        <input type="number" name="borg_peak" class="inp-sm" min="6" max="20" placeholder="6–20">
      </div>

    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       6. PHYSIOTHERAPY & FUNCTIONAL ASSESSMENT
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">6 · Physiotherapy &amp; Functional Assessment</div>
    <div class="section-body">

      <!-- Recent activity level -->
      <div class="form-row">
        <span class="fl">Recent activity level:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="activity_level[]" value="Active"> Active</label>
          <label class="cblabel"><input type="checkbox" name="activity_level[]" value="Limited"> Limited</label>
          <label class="cblabel"><input type="checkbox" name="activity_level[]" value="Bed-bound"> Bed-bound</label>
        </div>
      </div>

      <!-- Breathing pattern -->
      <div class="form-row">
        <span class="fl">Breathing pattern:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="breathing_pattern[]" value="Normal"> Normal</label>
          <label class="cblabel"><input type="checkbox" name="breathing_pattern[]" value="Abnormal"> Abnormal</label>
        </div>
        <span class="fl fl-sm" style="margin-left:10px;">Specify:</span>
        <input type="text" name="breathing_specify" class="inp-lg" placeholder="Specify if abnormal">
      </div>

      <!-- Spirometry -->
      <div class="form-row">
        <span class="fl">Spirometry (3 ball):</span>
        <span style="font-size:11.5px;color:var(--text-muted);">Inspiration: </span>

            <select name="spiro_insp" style="width:60px;margin-left:3px;">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            <input type="text" name="spiro_insp_remarks" class="inp-lg" placeholder="Remarks">

        <span style="font-size:11.5px;color:var(--text-muted);margin-left:10px;">Expiration: </span>
        <div class="cbgroup">
            <select name="spiro_exp" style="width:60px;margin-left:3px;">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
        </div>
        <span class="fl fl-sm" style="margin-left:10px;">Remarks:</span>
        <input type="text" name="spiro_exp_remarks" class="inp-lg" placeholder="Remarks">
      </div>

      <!-- FEV1 / FVC -->
      <div class="form-row">
        <span class="fl">Spirometry needed:</span>
           <select name="spiro_exp" style="width:60px;margin-left:3px;">
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
        <span class="fl fl-sm" style="margin-left:10px;">(if done) FEV₁:</span>
        <input type="number" name="fev1" class="inp-sm" placeholder="L" step="0.01">
        <span class="unit">L</span>
        <span class="fl fl-sm" style="margin-left:6px;">FVC:</span>
        <input type="number" name="fvc" class="inp-sm" placeholder="L" step="0.01">
        <span class="unit">L</span>
      </div>

      <!-- Posture -->
      <div class="form-row">
        <span class="fl">Posture:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="posture[]" value="Poor"> Poor</label>
          <label class="cblabel"><input type="checkbox" name="posture[]" value="Fair"> Fair</label>
          <label class="cblabel"><input type="checkbox" name="posture[]" value="Good"> Good</label>
        </div>
      </div>

      <!-- Alertness -->
      <div class="form-row">
        <span class="fl">Alertness / Cognition:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="alertness[]" value="Intact"> Intact</label>
          <label class="cblabel"><input type="checkbox" name="alertness[]" value="Impaired"> Impaired</label>
        </div>
      </div>

      <!-- Range of Motion -->
      <div class="form-row">
        <span class="fl">Range of Motion:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="rom[]" value="Normal"> Normal</label>
          <label class="cblabel"><input type="checkbox" name="rom[]" value="Decreased"> Decreased</label>
        </div>
        <span class="fl fl-sm" style="margin-left:10px;">Specify:</span>
        <input type="text" name="rom_specify" class="inp-lg" placeholder="Specify">
      </div>

      <!-- Muscle power -->
      <div class="form-row">
        <span class="fl">Muscle power:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="muscle_power[]" value="Intact"> Intact</label>
          <label class="cblabel"><input type="checkbox" name="muscle_power[]" value="Decreased"> Decreased</label>
        </div>
        <span class="fl fl-sm" style="margin-left:10px;">Specify:</span>
        <input type="text" name="muscle_specify" class="inp-lg" placeholder="Specify">
      </div>

      <!-- Mobility -->
      <div class="form-row" style="display:block;">
        <span class="fl" style="margin-bottom:5px;display:block;">Mobility</span>
        <table class="mob-table">
          <tbody>
            <tr>
              <td>Bed mobility (rolling Rt ↔ Lt)</td>
              <td>
                <div class="cbgroup">
                  <label class="cblabel"><input type="checkbox" name="bed_mobility[]" value="Supported"> Supported</label>
                  <label class="cblabel"><input type="checkbox" name="bed_mobility[]" value="Unsupported"> Unsupported</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>Sit → stand</td>
              <td>
                <div class="cbgroup">
                  <label class="cblabel"><input type="checkbox" name="sit_stand[]" value="Supported"> Supported</label>
                  <label class="cblabel"><input type="checkbox" name="sit_stand[]" value="Unsupported"> Unsupported</label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Balance & Coordination -->
      <div class="form-row" style="display:block;">
        <span class="fl" style="margin-bottom:5px;display:block;">Balance &amp; Coordination</span>
        <table class="mob-table">
          <tbody>
            <tr>
                <td>Sitting</td>
                
                <td>
                    <div class="cbgroup">
                        <label class="cblabel">
                            <input type="checkbox" name="sitting_balance[]" value="Static">
                            Static
                        </label>

                        <label class="cblabel">
                            <input type="checkbox" id="dynamicCheck" name="sitting_balance[]" value="Dynamic">
                            Dynamic
                        </label>
                    </div>
                </td>

                <td id="dynamicSection" style="display: none;">
                    <p class="fl">If dynamic:</p>
                    <div class="cbgroup" style="display:inline-flex;">
                        <label class="cblabel">
                            <input type="checkbox" name="sitting_dyn[]" value="Poor">
                            Poor
                        </label>

                        <label class="cblabel">
                            <input type="checkbox" name="sitting_dyn[]" value="Fair">
                            Fair
                        </label>

                        <label class="cblabel">
                            <input type="checkbox" name="sitting_dyn[]" value="Good">
                            Good
                        </label>
                    </div>
                </td>
            </tr>

            <tr>
                <td>Standing</td>
                
                <td>
                    <div class="cbgroup">
                        <label class="cblabel">
                            <input type="checkbox" name="standing_balance[]" value="Static">
                            Static
                        </label>

                        <label class="cblabel">
                            <input type="checkbox" id="dynamicCheck2" name="standing_balance[]" value="Dynamic">
                            Dynamic
                        </label>
                    </div>
                </td>

                <td id="dynamicSection2" style="display: none;">
                    <p class="fl">If dynamic:</p>
                    <div class="cbgroup" style="display:inline-flex;">
                        <label class="cblabel">
                            <input type="checkbox" name="standing_dyn[]" value="Poor">
                            Poor
                        </label>

                        <label class="cblabel">
                            <input type="checkbox" name="standing_dyn[]" value="Fair">
                            Fair
                        </label>

                        <label class="cblabel">
                            <input type="checkbox" name="standing_dyn[]" value="Good">
                            Good
                        </label>
                    </div>
                </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Gait & Transfers -->
      <div class="form-row" style="display:block;">
        <span class="fl" style="margin-bottom:5px;display:block;">Gait &amp; Transfers</span>
        <table class="mob-table">
          <tbody>
            <tr>
              <td>5-m walk</td>
              <td>
                <div class="cbgroup">
                  <select name="gait_5m" style="width:150px;">
                    <option value="normal">Normal</option>
                    <option value="altered">Altered</option>
                    <option value="impaired">Impaired</option>
                  </select>
                </div>
              </td>
              <td  class="fl">Transfers (bed ↔ chair)<td>
                <div class="cbgroup">
                  <select name="transfers" style="width:150px;">
                    <option value="supported">Supported</option>
                    <option value="unsupported">Unsupported</option>
  
                  </select>
                </div>
              </td>

              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Functional Tests -->
      <div class="form-row" style="display:block;">
        <span class="fl" style="margin-bottom:5px;display:block;">Functional Tests</span>
        <table class="mob-table">
          <tbody>
            <tr>
              <td>Stair climbing</td>
              <td>
                <div class="cbgroup">
                  <select name="stair_climbing" style="width:150px;">
                    <option value="normal">Normal</option>
                    <option value="altered">Altered</option>
                    <option value="impaired">Impaired</option>
                  </select>
                </div>
              </td>
               <td></td>
            </tr>
            <tr>
              <td>Timed Up &amp; Go (TUG)</td>
              <td class="row">
                <div class="cbgroup" style="margin-left:10px;"> <input type="number" name="tug_seconds" class="inp-md" placeholder="seconds"> <span class="unit">sec</span> </div>
              <td>
                   <div class="cbgroup" style="margin-left:10px;">
                  <label class="cblabel"><input type="checkbox" name="tug_risk[]" value="Normal"> Normal</label>
                  <label class="cblabel"><input type="checkbox" name="tug_risk[]" value="At risk of fall"> At risk of fall</label>
                </div>

              </td>
             
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>


   <!-- ══════════════════════════════════════════════════════════
       7. SYMPTOMS LIMITING EXERCISE
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">7 · Symptoms Limiting Exercise</div>
    <div class="section-body">
 
      <div class="form-row">
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="limiting_symptom[]" value="Angina"> Angina</label>
          <label class="cblabel"><input type="checkbox" name="limiting_symptom[]" value="Dyspnoea (NYHA class)"> Dyspnoea
            (NYHA class: <select name="nyha_class" style="width:60px;margin-left:3px;">
              <option value="">–</option>
              <option value="I">I</option>
              <option value="II">II</option>
              <option value="III">III</option>
              <option value="IV">IV</option>
            </select>)
          </label>
          <label class="cblabel"><input type="checkbox" name="limiting_symptom[]" value="Fatigue"> Fatigue</label>
          <label class="cblabel"><input type="checkbox" name="limiting_symptom[]" value="Claudication"> Claudication</label>
          <label class="cblabel"><input type="checkbox" name="limiting_symptom[]" value="Musculoskeletal pain"> Musculoskeletal pain</label>
        </div>
      </div>
 
      <!-- Psychosocial Readiness -->
      <div class="sub-title">Psychosocial Readiness</div>
 
      <div class="form-row">
        <span class="fl">Motivation for CR:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="motivation_cr[]" value="Good"> Good</label>
          <label class="cblabel"><input type="checkbox" name="motivation_cr[]" value="Fair"> Fair</label>
          <label class="cblabel"><input type="checkbox" name="motivation_cr[]" value="Poor"> Poor</label>
        </div>
      </div>
 
      <div class="form-row">
        <span class="fl">Anxiety / depression symptoms:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="anxiety_depression[]" value="Present"> Present</label>
          <label class="cblabel"><input type="checkbox" name="anxiety_depression[]" value="Absent"> Absent</label>
        </div>
        <span class="fl fl-sm" style="margin-left:10px;">Specify:</span>
        <input type="text" name="anxiety_specify" class="inp-lg" placeholder="Specify">
      </div>
 
      <div class="form-row">
        <span class="fl">Social support:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="social_support[]" value="Adequate"> Adequate</label>
          <label class="cblabel"><input type="checkbox" name="social_support[]" value="Limited"> Limited</label>
        </div>
        <span class="fl fl-sm" style="margin-left:10px;">Specify:</span>
        <input type="text" name="social_specify" class="inp-lg" placeholder="Specify">
      </div>
 
    </div>
  </div>
 


  <!-- ══════════════════════════════════════════════════════════
       8. AACVPR RISK & CR ENROLLMENT DECISION
  ══════════════════════════════════════════════════════════ -->
  <div class="section">
    <div class="section-header">8 · AACVPR Risk Stratification &amp; CR Enrollment Decision</div>
    <div class="section-body">

      <div class="form-row">
        <span class="fl">AACVPR Risk Stratification:</span>
        <div class="cbgroup">
          <select name="aacvpr_risk" style="width:200px;margin-left:3px;">
            <option value="low">Low risk</option>
            <option value="moderate">Moderate risk</option>
            <option value="high">High risk</option>
          </select> 
        </div>
      </div>

      <div class="form-row">
        <span class="fl">CR Enrollment Decision:</span>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="cr_enrollment[]" value="Fit for CR enrollment"> Fit for Cardiac Rehabilitation enrollment</label>
          <label class="cblabel"><input type="checkbox" name="cr_enrollment[]" value="Requires optimization before CR"> Requires optimization before CR</label>
        </div>
        <div class="cbgroup">
          <label class="cblabel"><input type="checkbox" name="cr_enrollment[]" value="Not suitable at present – reassess"> Not suitable at present – reassess</label>
          <label class="cblabel"><input type="checkbox" name="cr_enrollment[]" value="Reassess Date"> Reassess Date:</label>
          <input type="date" name="reassess_date">
        </div>
      </div>

    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       SIGNATURE
  ══════════════════════════════════════════════════════════ -->
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
      <input type="text" name="verified_by" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Emp. ID</label>
      <input type="text" name="emp_id" placeholder="Employee ID">
    </div>
  </div>

  <!-- FOOTER -->
  <div class="form-footer">
    <button type="button" class="btn btn-outline" onclick="resetForm()">Reset</button>
      <button type="submit" class="btn btn-primary">
          Save & Submit
      </button>
  </div>

</div>
</form>

{{-- <div class="toast" id="toast">✓ Form submitted successfully!</div> --}}

<script>
  /* ── Wells DVT Score ── */

    const dynamicCheck = document.getElementById('dynamicCheck');
    const dynamicSection = document.getElementById('dynamicSection');
    const dynamicCheck2 = document.getElementById('dynamicCheck2');
    const dynamicSection2 = document.getElementById('dynamicSection2');

    dynamicCheck.addEventListener('change', function () {
        if (this.checked) {
            dynamicSection.style.display = 'table-cell';
        } else {
            dynamicSection.style.display = 'none';
        }
    });
    dynamicCheck2.addEventListener('change', function () {
        if (this.checked) {
            dynamicSection2.style.display = 'table-cell';
        } else {
            dynamicSection2.style.display = 'none';
        }
    });


  function calcDVT() {
    const checks = document.querySelectorAll('#dvtBody input[type="checkbox"]');
    let score = 0;
    checks.forEach(cb => {
      if (cb.checked) {
        if (cb.name === 'dvt_alternative_diag') score -= 2;
        else score += 1;
      }
    });
    document.getElementById('dvtScore').textContent = score;
    const riskEl = document.getElementById('dvtRisk');
    if (score <= 0) { riskEl.textContent = 'Low probability'; riskEl.className = 'risk-badge risk-low'; }
    else if (score <= 2) { riskEl.textContent = 'Moderate probability'; riskEl.className = 'risk-badge risk-mod'; }
    else { riskEl.textContent = 'High probability'; riskEl.className = 'risk-badge risk-high'; }
  }


  /* ── Reset ── */
  function resetForm() {
    if (confirm('Reset all form fields?')) {
      document.getElementById('mainForm').reset();
      calcDVT();
    }
  }
</script>
</body>
</html>