<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Palliative Care Notes (PCN)</title>
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
    padding: 5mm 7mm 5mm 7mm;
    color: #000;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
  }

  /* ── Global table reset ── */
  table { border-collapse: collapse; width: 100%; }
  td, th {
    border: 1px solid #000;
    padding: 1.5px 3px;
    vertical-align: middle;
    font-size: 7.5pt;
  }

  /* Checkbox */
  .cb {
    display: inline-block;
    width: 7px; height: 7px;
    border: 1px solid #000;
    margin-right: 1px;
    vertical-align: middle;
    position: relative; top: -1px;
  }

  .cb.checked {
  background: #000;
}

  .cb.checked::after {
    content: "✓";
    position: absolute;
    top: -5px;
    left: 0px;
    font-size: 10px;
    color: #fff;
    font-weight: bold;
  }

  /* ══════════════════════
     HEADER
  ══════════════════════ */
  .header {
    display: flex;
    align-items: stretch;
    gap: 3px;
    margin-bottom: 3px;
  }


  .title-area {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .title-area h1 {
    font-size: 14pt;
    font-weight: 900;
    text-align: center;
    letter-spacing: 0.3px;
  }

  .patient-label-box {
    border: 1.5px solid #000;
    width: 40mm;
    flex-shrink: 0;
    padding: 1px 2px;
    font-size: 6pt;
    line-height: 1;
  }
  .patient-label-box .lb-title {
    text-align: center;
    font-weight: 700;
    font-size: 6.5pt;
    border-bottom: 1px solid #000;
    padding-bottom: 1px;
    margin-bottom: 2px;
  }
  .patient-label-box .lb-row {
    border-bottom: 0.5px dotted #bbb;
    padding: 0.5px 0;
  }

  /* ══════════════════════
     PATIENT NAME BAR
  ══════════════════════ */
  .name-bar {
    display: grid;
    grid-template-columns: 65fr 35fr;
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 6.5pt;
    padding: 2px 4px;
  }

  /* ══════════════════════
     INFO TABLE
  ══════════════════════ */
  .info-table td {
    font-size: 6.5pt;
    padding: 1px 2px;
    height: 3.5mm;
  }
  .info-table .lbl { font-weight: 700; }

  /* ══════════════════════
     SECTION HEADER (black bg)
  ══════════════════════ */
  .sec-hdr td {
    background: #000 !important;
    color: #fff;
    font-weight: 700;
    font-size: 6.5pt;
    padding: 2px 5px;
    border-color: #000;
  }

  /* ══════════════════════
     COLUMN HEADER (gray bg)
  ══════════════════════ */
  .col-hdr td {
    background: #d8d8d8;
    font-weight: 700;
    font-size: 7pt;
    text-align: center;
    padding: 2px 4px;
  }
  .col-hdr td.left { text-align: left; padding-left: 4px; }

  /* ══════════════════════
     DATA ROWS
  ══════════════════════ */
  .data-row td { font-size: 7pt; padding: 1px 2px; height: 5.5mm; }
  .data-row.alt td { background: #f5f5f5; }

  /* Checkbox item inline */
  .cbi { display: inline-flex; align-items: center; gap: 2px; white-space: nowrap; font-size: 7pt; margin-right: 6px; }

  /* Sub-section light gray */
  .sub-hdr td {
    background: #ececec;
    font-weight: 700;
    font-size: 7pt;
    padding: 2px 4px;
  }

  /* ══════════════════════
     COMFORT rows
  ══════════════════════ */
  .comfort-row td { font-size: 7pt; padding: 2px 4px; }

  /* ══════════════════════
     NURSING NOTE AREA
  ══════════════════════ */
  .note-area {
    border: 1px solid #000;
    min-height: 30mm;
    margin-bottom: 3px;
    position: relative;
  }
  .note-area .note-lines {
    padding: 2px 4px;
  }
  .note-line {
    border-bottom: 0.5px dotted #bbb;
    height: 7mm;
  }

  /* ══════════════════════
     TIME OF DEATH
  ══════════════════════ */
  .tod-table td { font-size: 6.5pt; padding: 2px 4px; height: 4.5mm; }
  .tod-table .lbl { font-weight: 700; }

  /* ══════════════════════
     SIGNATURE TABLE
  ══════════════════════ */
  .sig-table th {
    background: #d8d8d8;
    font-size: 7.5pt;
    font-weight: 700;
    text-align: center;
    padding: 2px 4px;
  }
  .sig-table td {
    font-size: 7pt;
    padding: 3px 4px;
    height: 9mm;
  }
  .sig-table .rlbl { font-weight: 700; background: #f0f0f0; }
  .sig-table tr:nth-child(2) td { background: #fde8dc; }
  .sig-table tr:nth-child(3) td { background: #fff; }

  /* ══════════════════════
     FOOTER
  ══════════════════════ */
  .footer {
    margin-top: 3px;
    font-size: 6pt;
    color: #444;
  }

  /* ══════════════════════
     SPACING HELPERS
  ══════════════════════ */
  .mb2 { margin-bottom: 2px; }
  .mb3 { margin-bottom: 3px; }

  /* ══════════════════════
     PRINT OVERRIDES
  ══════════════════════ */
  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { box-shadow: none; width: 210mm; min-height: 297mm; padding: 5mm 7mm; }
    @page { size: A4; margin: 0; }
    * { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
  }
</style>
</head>
<body>
<div class="page">
    {{-- @if($latestEntry)
        <p>
            @foreach($latestEntry->toArray() as $key => $value)
                
                    <strong>{{ $key }} :</strong> {{ $value }}
                
            @endforeach
        </p>
    @else <p>No data found.</p>
    @endif --}}
  <!-- ══════════════════════════════════════
       HEADER
  ══════════════════════════════════════ -->
  <div class="header">

    <!-- Logo -->
        <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="AIIMS Logo" width="80"  class="logo-icon"> 

    <!-- Title -->
    <div class="title-area">
      <h3>PALLIATIVE CARE NOTES (PCN)</h3>
    </div>

    <!-- Patient Label -->
    <div class="patient-label-box">
      <div class="lb-title">PATIENT LABEL</div>
      <div class="lb-row">Invoice No:…………………………………</div>
      <div class="lb-row">UHID:………………………………………</div>
      <div class="lb-row">Patient name:…………………………</div>
      <div class="lb-row">Consultant name:……………………</div>
      <div class="lb-row">Age:……Day…… Month…… Year……</div>
      <div class="lb-row">Mobile no:……………………………</div>
      <div class="lb-row">Print:………………………………………</div>
    </div>
  </div>

  <!-- ══════════════════════════════════════
       PATIENT NAME BAR
  ══════════════════════════════════════ -->
  <div class="name-bar">
    <span><strong>PATIENT NAME: </strong> {{ $latestEntry->patient_name  ?? '-' }}</span>
    <span> <strong>UHID:</strong>  {{ $latestEntry->uhid  ?? '-' }}</span>
  </div>

  <!-- ══════════════════════════════════════
       PATIENT INFO TABLE
  ══════════════════════════════════════ -->
  <table class="info-table mb3">
    <tr>
      <td class="lbl" style="width:50%;" colspan="2"><strong>Gender:</strong>  {{ $latestEntry->gender  ?? '-' }}</td>
      <td style="width:50%;"><strong>Age:</strong> {{ $latestEntry->age  ?? '-' }}</td>
    </tr>
    <tr>
      <td class="lbl"><strong>Diagnosis:</strong> {{ $latestEntry->diagnosis   ?? '-' }}</td>
      <td colspan="2"><strong>Procedure:</strong> {{ $latestEntry->procedure_name   ?? '-' }}</td>
    </tr>
    <tr>
      <td class="lbl"><strong>Consultant:</strong></td>
      <td colspan="2">  {{ $latestEntry->consultant   ?? '-' }}</td>
    </tr>
    <tr>
      <td class="lbl"><strong>Unit/Bed:</strong></td>
      <td colspan="2">  {{ $latestEntry->unit_bed   ?? '-' }}</td>
    </tr>
    <tr>
      <td class="lbl"><strong>Date of Note:</strong> {{ $latestEntry->date_of_note   ?? '-' }}</td>
      <td><strong>Time:</strong> </td>
      <td> {{ $latestEntry->time_of_note   ?? '-' }}</td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       CLINICAL STATUS
  ══════════════════════════════════════ -->
  <table class="mb2">
    <tr class="sec-hdr"><td colspan="3">CLINICAL STATUS</td></tr>
    <tr class="col-hdr">
      <td class="left" style="width:28%;">Parameter</td>
      <td style="width:44%;">Observation</td>
      <td style="width:28%;">Time Remarks</td>
    </tr>
    <tr class="data-row">
      <td><span class="cb {{ isset($latestEntry->gcs_obs) || $latestEntry->gcs_rem !== '' ? 'checked' : '' }}"></span> Consciousness/GCS</td>
      <td>
          {{ $latestEntry->gcs_obs  ?? '-' }}
      </td>
      <td>
          {{ $latestEntry->gcs_rem   ?? '-' }}
      </td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb {{ isset($latestEntry->vitals_obs) || $latestEntry->vitals_rem !== '' ? 'checked' : '' }}"></span> Vital Signs: HR/BP/SpO₂/RR</td>
      <td>
          {{ $latestEntry->vitals_obs    ?? '-' }}
      </td>
      <td>          {{ $latestEntry->vitals_rem     ?? '-' }}</td>
    </tr>
    <tr class="data-row">
      <td><span class="cb {{ isset($latestEntry->temp_obs) || $latestEntry->temp_rem !== '' ? 'checked' : '' }}"></span> Temp (°C)</td>
      <td>
        {{ $latestEntry->temp_obs   ?? '-' }}
      </td>
      <td>
        {{ $latestEntry->temp_rem    ?? '-' }}
      </td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb {{ isset($latestEntry->pain_obs) || $latestEntry->pain_rem !== '' ? 'checked' : '' }}"></span> Pain/Comfort Score (0-10)</td>
      <td>
        {{ $latestEntry->pain_obs    ?? '-' }}
      </td>
      <td>
        {{ $latestEntry->pain_rem     ?? '-' }}
      </td>
    </tr>
    <tr class="data-row">
      <td><span class="cb {{ isset($latestEntry->resp_obs) || $latestEntry->resp_rem !== '' ? 'checked' : '' }}"></span> Respiratory Status</td>
      <td>O₂ support, ventilation, {{ $latestEntry->resp_obs      ?? '-' }} </td>
      <td>{{ $latestEntry->resp_rem        ?? '-' }}</td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb {{ isset($latestEntry->cardiac_obs) || $latestEntry->cardiac_rem !== '' ? 'checked' : '' }}"></span> Cardiac Status</td>
      <td>Arrhythmia, inotropes, hemodynamics, {{ $latestEntry->cardiac_obs      ?? '-' }} </td>
      <td>{{ $latestEntry->cardiac_rem         ?? '-' }}</td>
    </tr>
    <tr class="data-row">
      <td><span class="cb {{ isset($latestEntry->fluid_obs) || $latestEntry->fluid_rem !== '' ? 'checked' : '' }}"></span> Fluid Balance</td>
      <td>Input/Output, {{ $latestEntry->fluid_obs       ?? '-' }} </td>
      <td>{{ $latestEntry->fluid_rem         ?? '-' }}</td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb {{ isset($latestEntry->skin_obs) || $latestEntry->skin_rem !== '' ? 'checked' : '' }}"></span> Skin/Pressure Areas</td>
      <td>
        {{ $latestEntry->skin_obs        ?? '-' }}
      </td>
      <td>
        {{ $latestEntry->skin_rem          ?? '-' }}
      </td>
    </tr>
    <tr class="data-row">
      <td><span class="cb {{ isset($latestEntry->other_obs) || $latestEntry->other_rem !== '' ? 'checked' : '' }}"></span> Other Clinical Notes</td>
      <td>
        {{ $latestEntry->other_obs  ?? '-' }}
      </td>
      <td>
        {{ $latestEntry->other_rem  ?? '-' }}
      </td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       SYMPTOM MANAGEMENT
  ══════════════════════════════════════ -->
  <table class="mb2">
    <tr class="sec-hdr"><td colspan="3">SYMPTOM MANAGEMENT</td></tr>
    <tr class="col-hdr">
      <td class="left" style="width:28%;">Symptom</td>
      <td style="width:44%;">Intervention/Medication Response/Relief</td>
      <td style="width:28%;">Remarks</td>
    </tr>
    
    <tr class="data-row"><td><span class="cb {{ isset($latestEntry->pain_int) || $latestEntry->pain_int !== '' ? 'checked' : '' }}"></span> Pain</td>
    <td>{{ $latestEntry->pain_int   ?? '-' }}</td>
    <td>{{ $latestEntry->pain_rmk   ?? '-' }}</td>
  </tr>
    <tr class="data-row alt"><td><span class="cb {{ isset($latestEntry->dysp_int) || $latestEntry->dysp_int !== '' ? 'checked' : '' }} "></span> Dyspnea/Labored Breathing</td><td>{{ $latestEntry->dysp_int    ?? '-' }}</td><td>{{ $latestEntry->dysp_rmk    ?? '-' }}</td></tr>
    <tr class="data-row"><td><span class="cb {{ isset($latestEntry->anx_int) || $latestEntry->anx_int !== '' ? 'checked' : '' }} "></span> Anxiety/Restlessness</td><td>{{ $latestEntry->anx_int    ?? '-' }}</td><td>{{ $latestEntry->anx_rmk    ?? '-' }}</td></tr>
    <tr class="data-row alt"><td><span class="cb {{ isset($latestEntry->nausea_int) || $latestEntry->nausea_int !== '' ? 'checked' : '' }} "></span> Nausea/Vomiting</td><td>{{ $latestEntry->nausea_int    ?? '-' }}</td><td>{{ $latestEntry->nausea_rmk    ?? '-' }}</td></tr>
    <tr class="data-row"><td><span class="cb {{ isset($latestEntry->sec_int) || $latestEntry->sec_int !== '' ? 'checked' : '' }} "></span> Secretions/Sputum</td><td>{{ $latestEntry->sec_int    ?? '-' }}</td><td>{{ $latestEntry->sec_rmk    ?? '-' }}</td></tr>
    <tr class="data-row alt"><td><span class="cb {{ isset($latestEntry->othersym_int) || $latestEntry->othersym_int !== '' ? 'checked' : '' }} "></span> Other Symptoms</td><td>{{ $latestEntry->othersym_int    ?? '-' }}</td><td>{{ $latestEntry->othersym_rmk    ?? '-' }}</td></tr>
  </table>

  <!-- ══════════════════════════════════════
       COMFORT & SUPPORTIVE CARE
  ══════════════════════════════════════ -->
  @php
      $comfort = explode(',', $latestEntry->comfort ?? '');
  @endphp
  <table class="mb2">
      <tr class="sec-hdr"><td colspan="4">COMFORT &amp; SUPPORTIVE CARE</td></tr>
      <tr class="comfort-row">
        <td style="width:25%;">
            <span class="cb {{ in_array('positioning', $comfort) ? 'checked' : '' }}"></span>
            Positioning for comfort
        </td>

        <td style="width:22%;">
            <span class="cb {{ in_array('oral_eye', $comfort) ? 'checked' : '' }}"></span>
            Oral/Eye care
        </td>

        <td style="width:27%;">
            <span class="cb {{ in_array('skin_pressure', $comfort) ? 'checked' : '' }}"></span>
            Skin/Pressure area care
        </td>

        <td style="width:26%;">
            <span class="cb {{ in_array('suctioning', $comfort) ? 'checked' : '' }}"></span>
            Suctioning as needed
        </td>
    </tr>
    <tr class="comfort-row">
      <td colspan="2">
          <span class="cb {{ in_array('env_adj', $comfort) ? 'checked' : '' }}"></span>
          Environmental adjustments (light, noise, privacy)
      </td>

      <td>
          <span class="cb {{ in_array('emotional', $comfort) ? 'checked' : '' }}"></span>
          Emotional support provided
      </td>

      <td>
          <span class="cb {{ in_array('spiritual', $comfort) ? 'checked' : '' }}"></span>
          Spiritual/Cultural support
      </td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       FAMILY SUPPORT & COMMUNICATION
  ══════════════════════════════════════ -->
  @php
      $family = explode(',', $latestEntry->family  ?? '');
  @endphp
  <table class="mb2">
    <tr class="sec-hdr"><td colspan="2">FAMILY SUPPORT &amp; COMMUNICATION</td></tr>
    <tr class="data-row">
      <td style="width:50%;"><span class="cb {{ in_array('prognosis', $family) ? 'checked' : '' }}"></span> Prognosis and care goals discussed</td>
      <td><span class="cb {{ in_array('presence', $family) ? 'checked' : '' }}"></span> Family presence facilitated</td>
    </tr>
    <tr class="data-row alt">
      <td><span class="cb {{ in_array('counseling', $family) ? 'checked' : '' }}"></span> Counseling/Emotional support provided</td>
      <td><span class="cb {{ in_array('cultural', $family) ? 'checked' : '' }}"></span> Cultural/Religious practices respected</td>
    </tr>
    <tr class="data-row">
      <td colspan="2"><span class="cb {{ in_array('questions', $family) ? 'checked' : '' }}"></span> Questions/Concerns addressed</td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       NURSING/STAFF NOTE
  ══════════════════════════════════════ -->
  <table class="mb2" style="margin-bottom:2px;">
    <tr class="sec-hdr"><td>NURSING/STAFF NOTE</td></tr>
    <tr>
      <td style="height:auto; vertical-align:top; padding:3px 4px;">
        {{ $latestEntry->nursing_notes  ?? '-' }}
      </td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       PHYSICIAN ORDERS & ADVANCE DIRECTIVES
  ══════════════════════════════════════ -->
    @php
      $directive = explode(',', $latestEntry->directive  ?? '');
  @endphp
  <table class="mb2">
    <tr class="sec-hdr"><td>PHYSICIAN ORDERS &amp; ADVANCE DIRECTIVES</td></tr>
    <tr class="data-row"><td><span class="cb {{ in_array('comfort_meds', $directive) ? 'checked' : '' }}"></span> Comfort medications (opioids, sedatives, anticholinergics)</td></tr>
    <tr class="data-row alt"><td><span class="cb {{ in_array('dnr', $directive) ? 'checked' : '' }}"></span> DNR/DNI status confirmed</td></tr>
    <tr class="data-row"><td><span class="cb {{ in_array('limitations', $directive) ? 'checked' : '' }}"></span> Limitations of interventions documented</td></tr>
    <tr class="data-row alt"><td><span class="cb {{ in_array('symptom_orders', $directive) ? 'checked' : '' }}"></span> Orders for symptom relief and comfort care</td></tr>
  </table>

  <!-- ══════════════════════════════════════
       TIME OF DEATH
  ══════════════════════════════════════ -->
  <table class="tod-table mb2">
    <tr class="sec-hdr"><td colspan="2">TIME OF DEATH (If Applicable)</td></tr>
    <tr>
      <td class="lbl" style="width:50%;">
          Date: {{ $latestEntry->death_date  ?? '-' }}
      </td> 
      <td class="lbl">
          Time: {{ $latestEntry->death_time ?? '-' }}
      </td>
    </tr>
    <tr>
      <td colspan="2" class="lbl" style="height:7mm;">Verified by Physician:</td> {{ $latestEntry->verifying_physician    ?? '-' }}
    </tr>
    <tr>
      <td>
        Family informed: &nbsp;&nbsp;
        <span class="cbi">
            <span class="cb {{ ($latestEntry->family_informed ?? '') === 'Yes' ? 'checked' : '' }}"></span> Yes
        </span>

        <span class="cbi">
            <span class="cb {{ ($latestEntry->family_informed ?? '') === 'No' ? 'checked' : '' }}"></span> No
        </span>
      <td>
        Post-mortem care initiated: &nbsp;&nbsp;
          <span class="cbi">
            <span class="cb {{ ($latestEntry->postmortem  ?? '') === 'Yes' ? 'checked' : '' }}"></span> Yes
        </span>

        <span class="cbi">
            <span class="cb {{ ($latestEntry->postmortem  ?? '') === 'No' ? 'checked' : '' }}"></span> No
        </span>
      </td>
    </tr>
  </table>

  <!-- ══════════════════════════════════════
       SIGNATURE TABLE
  ══════════════════════════════════════ -->
  <table class="sig-table mb2">
    <thead>
      <tr>
        <th style="width:20%; text-align:left; padding-left:4px;"></th>
        <th style="width:38%;">Signature</th>
        <th style="width:42%;">Date and Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="rlbl" style="background:#fff;">Nurse/Staff</td>
        <td style="background:#fff;"> {{ $latestEntry->nurse_sig  ?? '-' }}</td>
        <td style="background:#fff;"> {{ $latestEntry->nurse_date   ?? '-' }} | {{ $latestEntry->nurse_time    ?? '-' }}</td>
      </tr>
      <tr>
        <td class="rlbl" style="background:#fde8dc;">Consultant/Intensivist</td>
        <td style="background:#fde8dc;"> {{ $latestEntry->consult_sig   ?? '-' }}</td>
        <td style="background:#fde8dc;"> {{ $latestEntry->consult_date2    ?? '-' }} | {{ $latestEntry->consult_time2    ?? '-' }}</td>
      </tr>
      <tr>
        <td class="rlbl" style="background:#fff;">Verified By</td>
        <td style="background:#fff;"> {{ $latestEntry->verified_sig   ?? '-' }}</td>
        <td style="background:#fff;"> {{ $latestEntry->verified_date    ?? '-' }} | {{ $latestEntry->verified_time     ?? '-' }}</td>
      </tr>
    </tbody>
  </table>

  <!-- ══════════════════════════════════════
       FOOTER
  ══════════════════════════════════════ -->
  <div class="footer">AF/LES/PCN/v01/Jan2026– AF10</div>
   <div class="footer">Print By: 'Employee Name', Employee ID, Designation | Printed on: {{ date('Y-m-d H:i:s') }} </div>


</div>


<script>
  window.onload = function () {
    window.print();
  };
</script>
</body>

</html>