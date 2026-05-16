<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nursing Assessment on Admission (NAA) - Cardiac</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: Arial, sans-serif;
    font-size: 7.5pt;
    background: #ccc;
    display: flex;
    justify-content: center;
  }

  .page {
    width: 100%;
    min-height: 297mm;
    background: #fff;
    padding: 5mm 6mm 5mm 6mm;
    color: #000;
  }

  table { border-collapse: collapse; width: 100%; }
  td, th { border: 1px solid #000; padding: 1.5px 3px; vertical-align: middle; font-size: 7.5pt; }

  .cb {
    display: inline-block;
    width: 7px; height: 7px;
    border: 1px solid #000;
    margin-right: 1px;
    vertical-align: middle;
    position: relative; top: -1px;
    flex-shrink: 0;
  }

  /* ── Header ── */
  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 3px;
  }


  .form-title {
    font-size: 13pt;
    font-weight: 900;
    text-align: center;
    flex: 1;
    padding: 0 6px;
    line-height: 1.2;
  }

  .patient-label-box {
    border: 1.5px solid #000;
    width: 52mm;
    padding: 2px 4px;
    font-size: 7pt;
    line-height: 1.6;
    flex-shrink: 0;
  }
  .patient-label-box .lb-title {
    text-align: center;
    font-weight: 700;
    border-bottom: 1px solid #000;
    margin-bottom: 2px;
    padding-bottom: 1px;
    font-size: 7.5pt;
  }
  .patient-label-box .lb-row { border-bottom: 0.5px dotted #999; }

  /* ── Patient name bar ── */
  .name-bar {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 8pt;
    padding: 2px 5px;
    margin-bottom: 0;
  }

  /* ── Section title ── */
  .sec-title {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 1.5px 5px;
  }

  .section-wrap { border: 1px solid #000; margin-bottom: 2px; }
  .section-wrap table { border: none; }
  .section-wrap table td { border-color: #000; }

  /* ── Info rows ── */
  .info-table td { font-size: 7.5pt; padding: 1.5px 3px; }
  .lbl { font-weight: 700; white-space: nowrap; }
  .alt { background: #f5f5f5; }

  /* ── Nursing care table ── */
  .nursing-table th {
    background: #d0d0d0;
    font-weight: 700;
    font-size: 7pt;
    text-align: center;
    padding: 2px 3px;
  }
  .nursing-table td { font-size: 7pt; height: 9mm; vertical-align: top; }
  .nursing-table .time-col { width: 10%; }
  .nursing-table .dx-col   { width: 20%; }
  .nursing-table .goal-col { width: 20%; }
  .nursing-table .int-col  { width: 20%; }
  .nursing-table .eval-col { width: 17%; }
  .nursing-table .sign-col { width: 13%; }

  /* sign off */
  .signoff-table td { font-size: 7.5pt; padding: 3px 5px; }
  .signoff-table .s-label { font-weight: 700; background: #f0f0f0; }

  .footer { margin-top: 3px; font-size: 6.5pt; color: #444; }

  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { width: 210mm; min-height: 297mm; padding: 5mm 6mm; box-shadow: none; }
    @page { size: A4; margin: 0; }
  }
</style>
</head>
<body>
<div class="page">

         @if($latestEntry)
           <p>
                @foreach($latestEntry->toArray() as $key => $value)
                  
                        <strong>{{ $key }} :</strong> {{ $value }}
                 
                @endforeach
            </p>
            @else <p>No data found.</p>
         @endif
  <!-- ═══ HEADER ═══ -->
  <div class="header">
    <div class="logo-block">
      <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="Unico Logo" style="height:20mm;">
    </div>

    <div class="form-title">NURSING ASSESSMENT ON<br>ADMISSION (NAA) - CARDIAC</div>

    <div class="patient-label-box">
      <div class="lb-title">PATIENT LABEL</div>
      <div class="lb-row">Invoice No:…………………………</div>
      <div class="lb-row">UHID:………………………………</div>
      <div class="lb-row">Patient name:……………………………</div>
      <div class="lb-row">Consultant name:……………………</div>
      <div class="lb-row">Age:….Day……Month……Year……</div>
      <div class="lb-row">Mobile no:……………………………</div>
      <div class="lb-row">Print:……………………………………</div>
    </div>
  </div>

  <!-- ═══ PATIENT NAME BAR + BASIC INFO ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="name-bar" style="display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
        
        <div>
            <span>PATIENT'S NAME:</span>
            {{ $latestEntry->patient_name ?? '-' }}
        </div>
            &nbsp;  &nbsp; &nbsp;  &nbsp;
        <div>
            <span>UHID:</span>
            {{ $latestEntry->uhid ?? '-' }}
        </div>

    </div>
    <table class="info-table">
      <tr>
        <td class="lbl" style="width:110px;">Pre-op Diagnosis:</td>
        <td colspan="3"></td>
        <td class="lbl" style="width:30px;">Date:</td>
        <td style="width:70px;">{{ $latestEntry->adm_date  ?? '-' }}</td>
        <td class="lbl" style="width:30px;">Time:</td>
        <td style="width:60px;">{{ $latestEntry->adm_time  ?? '-' }}</td>
      </tr>
      <tr>
        <td class="lbl">Location:</td>
            <td colspan="7">
                {{ ($latestEntry->location ?? '') === 'other'
                    ? ($latestEntry->location_other ?? '………………')
                    : ($latestEntry->location_other  ?? '-')
                }}
            </td>
      </tr>
      <tr>
        <td class="lbl">Primary Surgeon:</td>
        <td colspan="7">{{ $latestEntry->primary_surgeon ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ PATIENT INFORMATION AND INITIAL ASSESSMENT ═══ -->
  <div class="section-wrap">
    <div class="sec-title">PATIENT INFORMATION AND INITIAL ASSESSMENT</div>
    <table class="info-table">
      <tr>
        <td colspan="4"><span class="lbl">ID band checked and correct:</span>  {{ $latestEntry->id_band ?? '-' }} </td>
        <td colspan="4"><span class="lbl">Informed consent verified:</span>  {{ $latestEntry->consent_surgery  ?? '-' }} <br> <strong>Blood products:</strong> {{ $latestEntry->consent_blood_products ?? '-' }}</td>
      </tr>
      <tr>
        <td style="width:28px;" class="lbl">DOA:</td>
        <td style="width:80px;">{{ $latestEntry->doa ?? '-' }}</td>
        <td class="lbl" style="width:80px;">How admitted:</td>
        <td colspan="5">
            {{ $latestEntry->how_admitted ?? '-' }}
          <strong>Bystander present:</strong> {{ $latestEntry->bystander2  ?? '-' }}
        </td>
      </tr>
      <tr>
        <td class="lbl">Condition:</td>
        <td colspan="3">
          {{ ($latestEntry->gen_condition ?? '') === 'Others'
            ? ($latestEntry->gen_condition_other ?? '-')
            : ($latestEntry->gen_condition ?? '-')
          }}
        </td>
        <td class="lbl">Height:</td>
        <td>{{ $latestEntry->height  ?? '' }} cm</td>
        <td class="lbl">Weight:</td>
        <td>{{ $latestEntry->weight   ?? '' }} kg &nbsp; BMI: {{ $latestEntry->bmi   ?? '' }}</td>
      </tr>
      <tr>
        <td class="lbl">Language:</td>
        <td colspan="3">
          {{ ($latestEntry->language ?? '') == 'Others'
            ? ($latestEntry->language_other ?? '-')
            : ($latestEntry->language ?? '-')
          }}
        </td>
        <td colspan="4">
          {{ $latestEntry->any_cultural  ?? '-' }}
        </td>
      </tr>
      <tr>
        <td class="lbl">Allergies:</td>
        <td colspan="3">{{ $latestEntry->allergies ?? '-' }}, <strong> Specify: </strong> {{ $latestEntry->allergies_specify  ?? '-' }} </td>
        <td colspan="4"></td>
      </tr>
      <tr class="alt">
        <td class="lbl">Vitals:</td>
        <td>Pulse: {{ $latestEntry->pulse ?? '-' }}/min</td>
        <td>BP: {{ $latestEntry->bp_sys  ?? '-' }}/{{ $latestEntry->bp_dia  ?? '-' }} mmHg</td>
        <td>Temp: {{ $latestEntry->temp  ?? '-' }}°F</td>
        <td>Resp: {{ $latestEntry->resp  ?? '-' }}/min</td>
        <td>SpO2: {{ $latestEntry->spo2  ?? '-' }}%</td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td class="lbl">Personal-aid(s)</td>
        <td colspan="2">
            Dentures: {{ ($latestEntry->dentures ?? 0) == 1 ? 'Yes' : 'No' }}
        </td>

        <td colspan="2">
            Eyewear: {{ ($latestEntry->eyewear ?? 0) == 1 ? 'Yes' : 'No' }}
        </td>

        <td colspan="3">
            Hearing: {{ ($latestEntry->hearing ?? 0) == 1 ? 'Yes' : 'No' }}
        </td>
      </tr>
      <tr>
        <td class="lbl">Diagnosis:</td>
        <td colspan="4">{{ $latestEntry->diagnosis ?? '-' }}</td>
        <td class="lbl" colspan="1">Planned Procedure:</td>
        <td colspan="2">{{ $latestEntry->planned_procedure  ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ ORIENTATION ═══ -->
  <div class="section-wrap">
    <div class="sec-title">ORIENTATION (Patient / Attendant)</div>
    <table class="info-table">
      <tr colspan="3">
        {{ $latestEntry->orientation  }}
      </tr>
    </table>
  </div>

  <!-- ═══ VULNERABILITY ═══ -->
  <div class="section-wrap">
    <div class="sec-title">VULNERABILITY ASSESSMENT</div>
    <table class="info-table">
      <tr>
        <td colspan="4">
          <strong>Provide Assistance in </strong>
          {{ ($latestEntry->vuln_assist ?? '') === 'Others'
                ? ($latestEntry->vuln_assist_other ?? '-')
                : ($latestEntry->vuln_assist ?? '-')
            }}
        </td>
      </tr>
      <tr>
        <td style="width:90px;"><span class="cb"></span>Falls risk</td>
        <td><span class="cb"></span>Bleeding risk</td>
        <td><span class="cb"></span>DVT risk assessment</td>
        <td></td>
      </tr>
      <tr>
        <td><span class="cb"></span>Aspiration risk</td>
        <td><span class="cb"></span>Thromboembolism risk</td>
        <td><span class="cb"></span>Isolation precaution</td>
        <td></td>
      </tr>
      <tr>
        <td><span class="cb"></span>Pain Management</td>
        <td><span class="cb"></span>Safety precaution</td>
        <td><span class="cb"></span>Pressure sore prevention</td>
        <td></td>
      </tr>
    </table>
  </div>

  <!-- ═══ HISTORY COLLECTION ═══ -->
  <div class="section-wrap">
    <div class="sec-title">HISTORY COLLECTION</div>
    <table class="info-table">
      <tr>
        <td class="lbl" style="width:100px;">Present complaints:</td>
        <td colspan="3">
            {{
                ($latestEntry->complaint ?? '') == 'Others'
                    ? ($latestEntry->complaint_other ?? '-')
                    : ($latestEntry->complaint ?? '-')
            }}
        </td>
      </tr>
      <tr class="alt">
        <td class="lbl">Past medical history:</td>
        <td>
                   {{ $latestEntry->past_med   }}
        </td>
      </tr>
      <tr>
        <td class="lbl">Past surgical history:</td>
        <td>
          <strong>Previous cardiac interventions:</strong>  {{ $latestEntry->past_surg }}
        </td>
      </tr>
    </table>
  </div>

  <!-- ═══ MEDICATION HISTORY ═══ -->
  <div class="section-wrap">
    <div class="sec-title">MEDICATION HISTORY</div>
    <table class="info-table">
      <tr>
        <td class="lbl" style="width:130px;">Current cardiac medications:</td>
        <td colspan="3">
          
        </td>
      </tr>
      <tr class="alt">
        <td><span class="cb"></span>Beta-Blockers:</td>
        <td><span class="cb"></span>ACE-I / ARB:</td>
        <td><span class="cb"></span>Diuretics:</td>
        <td></td>
      </tr>
      <tr>
        <td class="lbl">Last dose taken (especially anticoagulants):</td>
        <td colspan="3"></td>
      </tr>
      <tr class="alt">
        <td class="lbl">Drug allergies:</td>
        <td colspan="1"><span class="cb"></span>Yes / <span class="cb"></span>No, specify: ………………………</td>
        <td class="lbl">Herbal/traditional medicines:</td>
        <td><span class="cb"></span>Yes / <span class="cb"></span>No, specify: ………………………</td>
      </tr>
    </table>
  </div>

  <!-- ═══ SYSTEMATIC EVALUATION ═══ -->
  <div class="section-wrap">
    <div class="sec-title">SYSTEMATIC EVALUATION</div>
    <table class="info-table">
      <tr>
        <td class="lbl" style="width:130px;">Cardiovascular Assessment</td>
        <td>
          <strong> Heart rhythm: </strong> {{ $latestEntry->heart_rhythm ?? '-' }} &nbsp;&nbsp;
           <strong>Presence of murmur: </strong> {{ $latestEntry->murmur ?? '-' }}
        </td>
        <td style="width:110px;">
            {{
                ($latestEntry->cv_no_abn ?? '') == 1
                    ? 'Yes'
                    : (($latestEntry->cv_no_abn ?? '') == 0 ? 'No' : '-')
            }} abnormality detected
        </td>
      </tr>
      <tr class="alt">
        <td class="lbl">Respiratory Assessment</td>
        <td>
          <strong>Smoking history: </strong>   {{
                  ($latestEntry->smoking_hx  ?? '') == 1
                      ? 'Yes'
                      : (($latestEntry->smoking_hx ?? '') == 0 ? 'No' : '-')
              }}  &nbsp;&nbsp;
          <strong>Breath sounds: </strong> {{ $latestEntry->breath_sounds ?? '-' }}
        </td>
          <td>{{
                  ($latestEntry->resp_no_abn  ?? '') == 1
                      ? 'Yes'
                      : (($latestEntry->resp_no_abn  ?? '') == 0 ? 'No' : '-')
              }} abnormality detected</td>
      </tr>
      <tr>
        <td class="lbl">Neurological Status</td>
        <td>
          <strong>Orientation:</strong>
           {{ $latestEntry->orient ?? '-' }} &nbsp;&nbsp;
           <strong>Level of consciousness:</strong> {{ $latestEntry->consciousness  ?? '-' }}
        </td>
        <td>{{
                ($latestEntry->neuro_no_abn  ?? '') == 1
                    ? 'Yes'
                    : (($latestEntry->neuro_no_abn ?? '') == 0 ? 'No' : '-')
            }} abnormality detected</td>
      </tr>
      <tr class="alt">
        <td class="lbl">Renal &amp; Gastrointestinal Assessment</td>
        <td>
         <strong>  Last voided time: </strong>  {{ $latestEntry->last_voided  ?? '-' }} &nbsp;&nbsp;
          <strong>Bowel habits: </strong> {{ $latestEntry->bowel_habits  ?? '-' }}
        </td>
        <td>{{
                ($latestEntry->gi_no_abn   ?? '') == 1
                    ? 'Yes'
                    : (($latestEntry->gi_no_abn  ?? '') == 0 ? 'No' : '-')
            }} abnormality detected</td>
      </tr>
      <tr>
        <td class="lbl">Psychosocial Assessment</td>
        <td>
          <strong>Patient understanding of surgery: </strong> {{ $latestEntry->pt_understanding   ?? '-' }} &nbsp;&nbsp;
          <strong>Anxiety level: </strong> {{ $latestEntry->anxiety_level  ?? '-' }}
        </td>
        <td>{{
                ($latestEntry->psycho_no_abn   ?? '') == 1
                    ? 'Yes'
                    : (($latestEntry->psycho_no_abn  ?? '') == 0 ? 'No' : '-')
            }} abnormality detected</td>
      </tr>
    </table>
  </div>

  <!-- ═══ SKIN INTEGRITY ═══ -->
  <div class="section-wrap">
    <div class="sec-title">SKIN INTEGRITY</div>
    <table class="info-table">
      <tr>
        <td>
           <strong>Skin intact: </strong>{{ $latestEntry->skin_intact  ?? '-' }}  <strong> specify: </strong> {{ $latestEntry->skin_specify   ?? '-' }} &nbsp;&nbsp;
          <strong>Previous bed sore:</strong>
          @if(($latestEntry->bed_sore ?? '') == 'Yes')
              Yes, &amp; &amp; <strong>specify:</strong> {{ $latestEntry->bed_sore_specify ?? '-' }}
          @else
              No
          @endif
        </td>
      </tr>
    </table>
  </div>

  <!-- ═══ NURSING DOCUMENTATION & HANDOVER ═══ -->
  <div class="section-wrap">
    <div class="sec-title">NURSING DOCUMENTATION &amp; HANDOVER</div>
    <table class="info-table">
      <tr>
        <td>
         <strong>  Baseline findings documented: </strong>

          @if(($latestEntry->baseline_doc ?? '') == 'No')             
              No, <strong>specify:</strong> {{ $latestEntry->baseline_specify  ?? '-' }}
          @else
                Yes 
          @endif
          &nbsp;&nbsp;&nbsp;
          <strong>Abnormal findings escalated: </strong>
          
          @if(($latestEntry->abnormal_esc  ?? '') == 'No')             
              No, <strong>specify:</strong> {{ $latestEntry->abnormal_specify   ?? '-' }}
          @else
                Yes 
          @endif
        </td>
      </tr>
      <tr>
        <td class="lbl">Nursing Admission Summary:</td>
      </tr>
      <tr>
        <td style="height:10mm;">{{ $latestEntry->nursing_summary  ?? '-' }} </td>
      </tr>
    </table>
  </div>

  <!-- ═══ NURSING CARE PLAN ═══ -->
  <div class="section-wrap" style="margin-bottom:2px;">
    <div class="sec-title">NURSING CARE PLAN</div>
    <table class="nursing-table">
      <thead>
        <tr>
          <th class="time-col">TIME</th>
          <th class="dx-col">NURSING DIAGNOSIS</th>
          <th class="goal-col">GOALS &amp; OUTCOMES</th>
          <th class="int-col">INTERVENTIONS</th>
          <th class="eval-col">EVALUATION</th>
          <th class="sign-col">SIGN WITH ID</th>
        </tr>
      </thead>
      <tbody>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ SIGN OFF ═══ -->
  <table class="signoff-table" style="margin-bottom:2px;">
    <tr>
      <td class="s-label" style="width:55%;">Name &amp; Signature of the Nurse</td>
      <td class="s-label">Date and Time</td>
    </tr>
    <tr style="height:12mm;">
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td class="s-label">Verified by:</td>
      <td class="s-label">Emp. ID</td>
    </tr>
    <tr style="height:10mm;">
      <td></td>
      <td></td>
    </tr>
  </table>

  <div class="footer">NF/NAF/NAA/v01/Feb2026– NF01</div>

</div>
</body>
</html>