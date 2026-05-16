<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Assessment for Cardiac Rehabilitation (ACR)</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: Arial, sans-serif;     font-size: 12px; background: #fff; color: #000; }
  /* .page { width: 794px; margin: 0 auto; padding: 10px; } */

  /* HEADER */
  .header { display: flex; align-items: stretch; border-bottom: 2px solid #000; margin-bottom: 4px; }
  .logo-area { width: 100px; display: flex; align-items: center; justify-content: center;  padding: 4px; }
  .logo-box { text-align: center; }
  .logo-box .unico { font-size: 12px; font-weight: 900; color: #c00; letter-spacing: 1px; }
  .logo-box .hospitals { font-size: 8px; font-weight: bold; color: #c00; }
  .logo-box .tagline { font-size: 6px; color: #555; margin-top: 2px; }
  .title-area { flex: 1; text-align: center; padding: 4px; display: flex; flex-direction: column; justify-content: center; }
  .title-area h1 { font-size: 16px; font-weight: 900; text-transform: uppercase; }
  .title-area h2 { font-size: 12px; font-weight: 900; text-transform: uppercase; }
  .title-area h3 { font-size: 10px; font-weight: normal; }
  .patient-label-box { width: 260px; border: 1px solid #000; margin: 4px; padding: 4px; font-size: 8px; }
  .patient-label-box .label-title { font-weight: bold; text-align: center; margin-bottom: 3px; }
  .patient-label-box .label-line { border-bottom: 1px dotted #999; margin: 2px 0; min-height: 11px; font-size: 7.5px; }

  /* SECTION HEADERS */
  .section-header { background: #7a7a7a; color: #fff; font-weight: bold; font-size: 13px; padding: 2px 4px; text-transform: uppercase; margin-top: 4px; }

  /* PATIENT INFO ROW */
  .info-table { width: 100%; border-collapse: collapse; border: 1px solid #000; }
  .info-table td { border: 1px solid #000; padding: 2px 4px; font-size: 13px; }
  .info-table .label { font-weight: bold; }
  .field-line { display: inline-block; border-bottom: 1px solid #000; min-width: 60px; }
  .field-line-long { display: inline-block; border-bottom: 1px solid #000; min-width: 120px; }
  .field-line-med { display: inline-block; border-bottom: 1px solid #000; min-width: 80px; }

  /* GENERAL GRID TABLE */
  .form-table { width: 100%; border-collapse: collapse; border: 1px solid #000; margin-top: -1px; }
  .form-table td, .form-table th { border: 1px solid #000; padding: 2px 4px; font-size: 13px; vertical-align: top; }
  .form-table .row-label { font-weight: bold; white-space: nowrap; }
  .form-table .section-row td { background: #000; color: #fff; font-weight: bold; font-size: 13px; padding: 2px 4px; text-transform: uppercase; }

  /* CHECKBOX STYLES */
  .cb { display: inline-flex; align-items: center; margin-right: 8px; white-space: nowrap; }
  .cb input[type=checkbox] { width: 10px; height: 10px; margin-right: 2px; accent-color: #000; }
  .rb { display: inline-flex; align-items: center; margin-right: 8px; white-space: nowrap; }
  .rb input[type=radio] { width: 10px; height: 10px; margin-right: 2px; accent-color: #000; }

  /* WRAP CELLS */
  .wrap { white-space: normal; }
  .bold { font-weight: bold; }
  .italic { font-style: italic; }
  .small { font-size: 8px; }

  /* SIGNATURE AREA */
  .sig-table { width: 100%; border-collapse: collapse; border: 1px solid #000;  }
  .sig-table td { border: 1px solid #000; padding: 6px 8px; font-size: 13px; height: 20px; vertical-align: top; }

  .footer-ref { font-size: 8px; margin-top: 3px; }

  /* INLINE INPUT */
  input[type=text].inline { border: none; border-bottom: 1px solid #000; outline: none; font-size: 13px; width: 60px; background: transparent; }
  input[type=text].inline-lg { border: none; border-bottom: 1px solid #000; outline: none; font-size: 13px; width: 120px; background: transparent; }
  input[type=text].inline-md { border: none; border-bottom: 1px solid #000; outline: none; font-size: 13px; width: 80px; background: transparent; }
  input[type=text].inline-sm { border: none; border-bottom: 1px solid #000; outline: none; font-size: 13px; width: 40px; background: transparent; }
  input[type=text].inline-xs { border: none; border-bottom: 1px solid #000; outline: none; font-size: 13px; width: 25px; background: transparent; }

  .no-border-table { width: 100%; border-collapse: collapse; }
  .no-border-table td { padding: 1px 3px; font-size: 13px; border: none; }

  .patient-name-row { display: flex; background: #7c7c7c; color: #fff; padding: 2px 4px; font-weight: bold; font-size: 13px; gap: 20px; margin-bottom: 0; }
  .patient-name-row input { background: transparent; border: none; border-bottom: 1px solid #aaa; color: #fff; outline: none; font-size: 13px; width: 150px; }
  .patient-name-row input::placeholder { color: #ccc; }

  .outer-border { border: 1px solid #000; }
</style>
</head>
<body>

    {{-- @if($latestEntry)

            @foreach($latestEntry->toArray() as $key => $value)

                <p>
                    <strong>{{ $key }} :</strong> {{ $value }}
                </p>

            @endforeach

        @else

            <p>No data found.</p>

    @endif --}}
<div class="page">

  <!-- HEADER -->
  <div class="header">
    <div class="logo-area">
      <div class="logo-box">      
       <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="Unico Hospitals Logo" style="width:auto; height:60px;">
      </div>
    </div>
    <div class="title-area">
      <h2>Assessment for</h2>
      <h2>Cardiac Rehabilitation (ACR)</h2>
      <h3>As per ACCVPR Guidelines</h3>
    </div>
    {{-- <div class="patient-label-box">
      <div class="label-title">PATIENT LABEL</div>
      <div class="label-line">Invoice No.:</div>
      <div class="label-line">UHID:</div>
      <div class="label-line">Patient name:................................</div>
      <div class="label-line">Consultant name:.............................</div>
      <div class="label-line">Age:........ Day....... Month........ Year ......</div>
      <div class="label-line">Mobile no.:...................................</div>
      <div class="label-line">Print:</div>
    </div> --}}
  </div>

  <!-- PATIENT NAME BAR -->
  <div class="patient-name-row">
    <span>PATIENT'S NAME &nbsp; {{ $latestEntry->patient_name ?? '' }}</span>
    <span style="margin-left:auto;">UHID &nbsp;{{ $latestEntry->uhid ?? '' }}</span>
  </div>

  <!-- PATIENT INFO TABLE -->
  <table class="info-table">
    <tr>
      <td><span class="label">Age:</span> {{ $latestEntry->age ?? '' }} &nbsp; <span class="label">Gender:</span>
        <label class="cb"><input type="checkbox" {{ $latestEntry->gender === 'M' ? 'checked' : '' }}> M</label>
        <label class="cb"><input type="checkbox" {{ $latestEntry->gender === 'F' ? 'checked' : '' }}> F</label>
        &nbsp;<span class="label">Date of Assessment:</span> {{ $latestEntry->admission_date ?? '' }}
        &nbsp; <span class="label">Time:</span> <input type="text" class="inline inline-sm">
      </td>
    </tr>
    <tr>
      <td>
        <span class="label">Height:</span> {{ $latestEntry->height ?? '' }} cm &nbsp;&nbsp;
        <span class="label">Weight:</span> {{ $latestEntry->weight ?? '' }} kg &nbsp;&nbsp;
        <span class="label">BMI:</span> {{ $latestEntry->bmi ?? '' }} kg/m<sup>2</sup>
      </td>
    </tr>
    <tr>
      <td>
        <span class="label">Location:</span>
        <label class="cb"><input type="checkbox" {{ $latestEntry->location === 'OPD' ? 'checked' : '' }}> OPD</label>
        <label class="cb"><input type="checkbox" {{ $latestEntry->location === 'IPD' ? 'checked' : '' }}> IPD</label>
        <label class="cb"><input type="checkbox" {{ $latestEntry->location === 'Others' ? 'checked' : '' }}> Others</label>
      </td>
    </tr>
    <tr>
      <td><span class="label">Consultant:</span> {{ $latestEntry->consultant_present ?? '' }}</td>
    </tr>
  </table>
  <!-- CARDIAC DIAGNOSIS -->
  <div class="section-header">Cardiac Diagnosis &amp; Clinical Status</div>
  <table class="form-table">
    <tr>
      <td colspan="2" class="wrap">
        <span class="bold">Primary Diagnosis (tick all that apply):</span>
      </td>
    </tr>
    <tr>
      @php
          $cardiacDiag = array_filter(array_map('trim', explode(',', $latestEntry->p_diagnosis ?? '')));
      @endphp

      <td colspan="2" class="wrap">

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('PreopCABG', $cardiacDiag) ? 'checked' : '' }}>
              Preop – CABG
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('PreopOHS', $cardiacDiag) ? 'checked' : '' }}>
              Preop – OHS
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('PostCABG', $cardiacDiag) ? 'checked' : '' }}>
              Post – CABG
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('PostOHS', $cardiacDiag) ? 'checked' : '' }}>
              Post – OHS
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('PostPCI', $cardiacDiag) ? 'checked' : '' }}>
              Post – PCI
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('Valve surgery', $cardiacDiag) ? 'checked' : '' }}>
              Valve surgery
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('ACS/MI', $cardiacDiag) ? 'checked' : '' }}>
              ACS / MI
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('Heart Failure', $cardiacDiag) ? 'checked' : '' }}>
              Heart Failure
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('Congenital', $cardiacDiag) ? 'checked' : '' }}>
              Congenital
          </label>

          <label class="cb">
              <input type="checkbox" 
                  {{ in_array('Others', $cardiacDiag) ? 'checked' : '' }}>
              Others
          </label>

      </td>
  </tr>
    <tr>
      <td colspan="2" class="wrap">
        <span class="bold">Date of Index cardiac event/surgery:</span>
        <label class="cb">{{ $latestEntry->cardiac_event_duration  ?? '' }}</label>
      </td>
    </tr>
    <tr>
      <td class="wrap"><span class="bold">Left Ventricular Function:</span> {{ $latestEntry->left_ventricular_function ?? '' }} &nbsp; <span class="bold">EF%:</span> {{ $latestEntry->ef_percent  ?? '' }}</td>
    </tr>
    <tr>
      <td colspan="2" class="wrap">
        <label class="cb"><input type="checkbox"> Preserved</label>
        <label class="cb"><input type="checkbox"> Mild</label>
        <label class="cb"><input type="checkbox"> Moderate</label>
        <label class="cb"><input type="checkbox"> Severe dysfunction</label>
      </td>
    </tr>
    <tr>
      <td class="wrap">
        <span class="bold">Diagnosis:</span> {{ $latestEntry->diagnosis_text  ?? '' }}
        &nbsp; <span class="bold">Planned Procedure:</span> {{ $latestEntry->planned_procedure  ?? '' }}
        &nbsp; <span class="bold">DOS:</span> {{ $latestEntry->dos_date  ?? '' }}
      </td>
    </tr>
  </table>

  <!-- CARDIOVASCULAR STABILITY -->
  <div class="section-header">Cardiovascular Stability</div>
  <table class="form-table">
    <tr>
        <td class="wrap">
            <span class="bold">Vitals:</span>

            <span class="bold">Pulse:</span>
            <span>{{ $latestEntry->pulse_per_min ?? 'N/A' }}</span> /min &nbsp;

            <span class="bold">BP:</span>
            <span>{{ $latestEntry->bp_diastolic ?? 'N/A' }}</span> mmHg &nbsp;

            <span class="bold">Temp:</span>
            <span>{{ $latestEntry->temp_fahrenheit ?? 'N/A' }}</span> °F &nbsp;

            <span class="bold">Resp:</span>
            <span>{{ $latestEntry->resp_rate ?? 'N/A' }}</span> /min &nbsp;

            <span class="bold">SpO<sub>2</sub>:</span>
            <span>{{ $latestEntry->spo2_percent ?? 'N/A' }}</span> %
        </td>
      
    </tr>
    <tr>
      @php
            $heartRhythms = explode(',', $latestEntry->heart_rhythm ?? '');
        @endphp

        <td class="wrap">
            <span class="bold">Heart rhythm:</span>

            <label class="cb">
                <input type="checkbox" readonly
                    {{ in_array('Sinus rhythm', $heartRhythms) ? 'checked' : '' }}>
                Sinus rhythm
            </label>

            <label class="cb">
                <input type="checkbox" readonly
                    {{ in_array('Atrial fibrillation', $heartRhythms) ? 'checked' : '' }}>
                Atrial fibrillation
            </label>

            <label class="cb">
                <input type="checkbox" readonly 
                    {{ in_array('Pacing', $heartRhythms) ? 'checked' : '' }}>
                Pacing
            </label>

            <label class="cb">
                <input type="checkbox" readonly
                    {{ in_array('Others', $heartRhythms) ? 'checked' : '' }}>
                Others
            </label>
        </td>
    </tr>
    <tr>
        @php
            $symptomsRest = explode(',', $latestEntry->symptoms_rest  ?? '');
        @endphp
      <td class="wrap">
        <span class="bold">Symptoms at rest:</span>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Angina (Chest pain)', $symptomsRest) ? 'checked' : '' }}> Angina (Chest pain)</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Dyspnoea', $symptomsRest) ? 'checked' : '' }}> Dyspnoea</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Palpitations', $symptomsRest) ? 'checked' : '' }}> Palpitations</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Dizziness', $symptomsRest) ? 'checked' : '' }}> Dizziness</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('None', $symptomsRest) ? 'checked' : '' }}> None</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Syncope', $symptomsRest) ? 'checked' : '' }}> Syncope</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Others', $symptomsRest) ? 'checked' : '' }}> Others</label>
        <p>{{ $latestEntry->symptoms_rest_others ?? '.' }}</p>
      </td>
    </tr>
  </table>

  <!-- VULNERABILITY ASSESSMENT -->
  <div class="section-header">Vulnerability Assessment <span style="font-weight:normal;font-size:8px;">(If any present → defer CR enrollment)</span></div>
  <table class="form-table">
    <tr>
        @php
              $contraindications = explode(',', $latestEntry->contraindication   ?? '');
        @endphp
      <td class="wrap">
        <span class="bold">Contraindications to Exercise:</span>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Unstable angina', $contraindications) ? 'checked' : '' }}> Unstable angina</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Decompensated heart failure', $contraindications) ? 'checked' : '' }}> Decompensated heart failure</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Arrhythmia', $contraindications) ? 'checked' : '' }}> Arrhythmia</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Resting SBP >180 mmHg', $contraindications) ? 'checked' : '' }}> Resting SBP &gt;180 mmHg</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Resting DBP >110 mmHg', $contraindications) ? 'checked' : '' }}> Resting DBP &gt;110 mmHg</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Acute infection / fever', $contraindications) ? 'checked' : '' }}> Acute infection / fever</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Acute DVT / PE', $contraindications) ? 'checked' : '' }}> Acute DVT / PE</label>

      </td>
    </tr>
    
  </table>

  <!-- COMORBIDITIES -->
  <div class="section-header">Comorbidities &amp; Risk Factors <span style="font-weight:normal;font-size:8px;">(tick all that apply)</span></div>
  <table class="form-table">
    <tr>
        @php
            $comorbidity = explode(',', $latestEntry->comorbidity  ?? '');
        @endphp
      <td class="wrap">
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Hypertension', $comorbidity) ? 'checked' : '' }}> Hypertension</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Diabetes mellitus', $comorbidity) ? 'checked' : '' }}> Diabetes mellitus</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Dyslipidaemia', $comorbidity) ? 'checked' : '' }}> Dyslipidaemia</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Chronic kidney disease', $comorbidity) ? 'checked' : '' }}> Chronic kidney disease</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Stroke / TIA', $comorbidity) ? 'checked' : '' }}> Stroke / TIA</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Peripheral vascular disease', $comorbidity) ? 'checked' : '' }}> Peripheral vascular disease</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('COPD / asthma', $comorbidity) ? 'checked' : '' }}> COPD / asthma</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Obesity (BMI <input type="text" class="inline-xs">)', $comorbidity) ? 'checked' : '' }}> Obesity (BMI <input type="text" class="inline-xs">)</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Cardiac (family)', $comorbidity) ? 'checked' : '' }}> Family History of - Cardiac  </label0>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Diabetes (family)', $comorbidity) ? 'checked' : '' }}> Diabetes</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Others (family)', $comorbidity) ? 'checked' : '' }}> Others</label>
      </td>
    </tr>

     <tr>
      <td class="wrap">
        <span class="bold">Family History of:</span>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Cardiac (family)', $comorbidity) ? 'checked' : '' }}> Cardiac</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Diabetes (family)', $comorbidity) ? 'checked' : '' }}> Diabetes</label>
        <label class="cb"><input type="checkbox" readonly
                    {{ in_array('Others (family)', $comorbidity) ? 'checked' : '' }}> Others</label>
      </td>
    </tr>

   

    <tr>
      <td class="wrap">
        <span class="bold">Smoking status:</span>
        <label class="cb">
                     {{  $latestEntry->smoking  ?? '' }}</label>
      </td>
    </tr>
  </table>

  <!--*************** EXERCISE CAPACITY ******************-->
  <!-- ************************************************** --> 

  <div class="section-header">Exercise Capacity &amp; Functional Assessment</div>
  <table class="form-table">

    <!-- Header -->
    <tr>
        <td colspan="3" class="bold section-title">
            6-Minute Walk Test
        </td>
        <td colspan="1" class="text-right">
            <strong>Distance:</strong>
            {{ $latestEntry->walk_distance ?? '' }} meters
        </td>
    </tr>

    <!-- Pre Test -->
    <tr>
        <td class="bold label-col">Pre-test</td>
        <td colspan="3">
            <div class="vitals-row">
                <span><strong>HR:</strong> {{ $latestEntry->pretest_hr ?? '' }} /min</span>

                <span><strong>BP:</strong>
                    {{ $latestEntry->pretest_bp_sys ?? '' }}/{{ $latestEntry->pretest_bp_dia ?? '' }} mmHg
                </span>

                <span><strong>SpO<sub>2</sub>:</strong>
                    {{ $latestEntry->pretest_spo2 ?? '' }}%
                </span>
            </div>
        </td>
    </tr>

    <!-- Post Test -->
    <tr>
        <td class="bold label-col">Post-test</td>
        <td colspan="3">
            <div class="vitals-row">
                <span><strong>HR:</strong> {{ $latestEntry->posttest_hr ?? '' }} /min</span>

                <span><strong>BP:</strong>
                    {{ $latestEntry->posttest_bp_sys ?? '' }}/{{ $latestEntry->posttest_bp_dia ?? '' }} mmHg
                </span>

                <span><strong>SpO<sub>2</sub>:</strong>
                    {{ $latestEntry->posttest_spo2 ?? '' }}%
                </span>
            </div>
        </td>
    </tr>

    <!-- METS & RPE -->
   <tr>
    <td colspan="4">
        <div class="meta-row" style="display:flex; gap:25px; flex-wrap:wrap;">
            
            <span><strong>Estimated METs:</strong> {{ $latestEntry->mets_value ?? '' }}</span>

            <span><strong>Borg RPE (Rest):</strong> {{ $latestEntry->rpe_rest ?? '' }}</span>

            <span><strong>Borg RPE (Peak):</strong> {{ $latestEntry->rpe_peak ?? '' }}</span>

        </div>
    </td>
</tr>

</table>

  <!--*********** PHYSIOTHERAPY **********************-->
  <!-- ************************************************** --> 
  <div class="section-header">Physiotherapy &amp; Functional Assessment</div>
  <table class="form-table">
    <tr>
      <td class="bold row-label" style="width:140px;">Recent activity level:</td>
      <td class="wrap">
        <label class="cb"> {{ $latestEntry->activity_level ?? '' }}</label>
        
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Breathing pattern:</td>
      <td class="wrap">
        <label class="cb"> {{ $latestEntry->breathing_pattern ?? '' }}</label>
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Spirometry (3 ball)</td>
      <td class="wrap">
        <strong>Inspiration:</strong> {{ $latestEntry->spiro_insp ?? '' }}
        &nbsp;&nbsp;
        <strong>Expiration:</strong> {{ $latestEntry->spiro_exp  ?? '' }}
        &nbsp;&nbsp;
        <strong>Remarks:</strong> {{ $latestEntry->spiro_remarks ?? '' }}
      </td>
    </tr>
    <tr>
      <td><strong> Spirometry needed: </strong></td>
      <td class="wrap">
        
        <label class="cb">{{ $latestEntry->spirometry_needed ?? '' }}</label>
        &nbsp; <strong> (if done): FEV<sub>1</sub>: </strong> {{ $latestEntry->fev1 ?? '' }}  &nbsp; <strong> FVC: </strong>   &nbsp; {{ $latestEntry->fvc ?? '' }} 
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Posture:</td>
      <td class="wrap">
        <label class="cb">{{ $latestEntry->posture ?? '' }}</label>
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Alertness / cognition:</td>
      <td class="wrap">
        <label class="cb">{{ $latestEntry->alertness ?? '' }}</label>
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Range of Motion:</td>
      <td class="wrap">
        <label class="cb">{{ $latestEntry->rom ?? '' }}</label>
        <strong> Specify:  </strong> {{ $latestEntry->rom_specify ?? '' }}
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Muscle power:</td>
      <td class="wrap">
        <label class="cb">{{ $latestEntry->muscle_power ?? '' }}</label>
        <strong> Specify:  </strong> {{ $latestEntry->muscle_power_specify ?? '' }}
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Mobility</td>
      <td class="wrap">
       <strong> Bed mobility (rolling Rt ↔ Lt ): </strong>  {{ $latestEntry->bed_mobility ?? '' }}
       <strong> Sit → stand: </strong>  {{ $latestEntry->sit_stand  ?? '' }}
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Balance &amp; Coordination</td>
      <td class="wrap">
        <strong> Sitting: </strong> {{ $latestEntry->sitting_balance  ?? '' }}
        <label class="cb"> Dynamic</label>
         &nbsp; If dynamic: {{ $latestEntry->sitting_dyn  ?? '' }}
       
   
        <strong> Standing: </strong> {{ $latestEntry->standing_balance  ?? '' }}
       
        &nbsp; If dynamic:
        {{ $latestEntry->standing_dyn  ?? '' }}
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Gait &amp; Transfers</td>
      <td class="wrap">
        <strong> 5-m walk: </strong> {{ $latestEntry->gait_5m  ?? '' }} sec &nbsp;
    
        <strong> Transfers (bed → chair): </strong> {{ $latestEntry->transfers  ?? '' }} sec &nbsp;
      </td>
    </tr>
    <tr>
      <td class="bold row-label">Functional Tests</td>
      <td class="wrap">
        <strong> Stair climbing: </strong> {{ $latestEntry->stair_climbing   ?? '' }} sec &nbsp;

        <strong> Timed Up &amp; Go (TUG): </strong> {{ $latestEntry->tug_seconds   ?? '' }} sec &nbsp;
      </td>
    </tr>
  </table>
  <!-- ********************************** -->
  <!--****** SYMPTOMS LIMITING EXERCISE ******-->



  <div class="section-header">Symptoms Limiting Exercise</div>
  <table class="form-table">
    <tr>
      <td class="wrap" colspan="2">
         {{ $latestEntry->limiting_symptom ?? '' }} (NYHA class <input type="text" class="inline-xs">)</label>
        <label class="cb"><input type="checkbox"> Fatigue</label>
        <label class="cb"><input type="checkbox"> Claudication</label>
        <label class="cb"><input type="checkbox"> Musculoskeletal pain</label>
      </td>
    </tr>



    <tr>
      <td class="bold row-label" style="width:140px;" rowspan="2">Psychosocial Readiness</td>
      <td class="wrap">
        <strong>Motivation for CR:</strong>
        <label class="cb">{{ $latestEntry->motivation_cr ?? '' }}</label>
      </td>
    </tr>
    <tr>
      <td class="wrap">
        <strong>Anxiety / depression symptoms:</strong>
        <label class="cb">{{ $latestEntry->anxiety_depression ?? '' }}</label>
        <strong> Specify: </strong> {{ $latestEntry->anxiety_specify  ?? '' }}
 
        <strong>Social support:</strong>
        <label class="cb">{{ $latestEntry->social_support  ?? '' }}</label>
        <strong> Specify: </strong> {{ $latestEntry->social_specify   ?? '' }}
      </td>
    </tr>
  </table>


  <!-- AACVPR RISK -->
  <table class="form-table">
    <tr>
      <td class="bold row-label" style="width:160px;">AACVPR Risk Stratification</td>
      <td class="wrap">
        <label class="cb">{{ $latestEntry->aacvpr_risk  ?? '' }}</label>
      </td>
    </tr>
    <tr>
      <td class="bold row-label">CR Enrollment Decision</td>
      <td class="wrap">
        <label class="cb">{{ $latestEntry->cr_enrollment  ?? '' }}</label>
      </td>
    </tr>
  </table>
  <!-- SIGNATURE -->
  <table class="sig-table">
    <tr>
      <td style="width:50%;">Name &amp; Signature of the Physiotherapist</td>
      <td>Date and Time</td>
    </tr>
    <tr>
      <td>Verified by:</td>
      <td>Emp. ID</td>
    </tr>
  </table>
  <br>
  <div class="footer-ref">CR/CRC/ACR/v01/Feb2026 – CR01</div>
  <div class="footer-ref">Print By: 'Kazi Sifat Al Maksud', Software Developer | Printed on: {{ date('Y-m-d H:i:s') }} </div>

</div>
</body>
</html>