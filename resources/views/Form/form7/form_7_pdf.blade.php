<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Allergy Record Form (ALF)</title>
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
    padding: 6mm 7mm 6mm 7mm;
    color: #000;
  }

  table { border-collapse: collapse; width: 100%; }
  td, th { border: 1px solid #000; padding: 2px 4px; vertical-align: middle; font-size: 7.5pt; }

  .cb {
    display: inline-block;
    width: 7px; height: 7px;
    border: 1px solid #000;
    margin-right: 2px;
    vertical-align: middle;
    position: relative; top: -1px;
  }

  /* ── Header ── */
  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 3px;
  }

  
  .form-title {
    font-size: 14pt;
    font-weight: 900;
    text-align: center;
    flex: 1;
    padding: 0 6px;
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

  /* ── Patient info ── */
  .name-bar {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 8pt;
    padding: 2px 5px;
  }

  .section-wrap { border: 1px solid #000; margin-bottom: 3px; }
  .info-table td { font-size: 7.5pt; padding: 2px 4px; }
  .lbl { font-weight: 700; white-space: nowrap; }

  /* ── Section title ── */
  .sec-title {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 2px 5px;
  }

  /* ── Allergy rows ── */
  .alf-table td { font-size: 7.5pt; padding: 2px 4px; border: 1px solid #000; }
  .alf-table .row-lbl { font-weight: 700; background: #f0f0f0; white-space: nowrap; width: 130px; }
  .alf-table tr:nth-child(even) td { background: #fafafa; }
  .alf-table tr:nth-child(even) td.row-lbl { background: #ebebeb; }

  /* ── Interventions table ── */
  .int-table td { font-size: 7.5pt; padding: 2px 4px; border: 1px solid #000; }
  .int-table .row-lbl { font-weight: 700; background: #f0f0f0; }
  .int-table .opt { width: 50px; text-align: center; }
  .int-table tr:nth-child(even) td { background: #fafafa; }
  .int-table tr:nth-child(even) td.row-lbl { background: #ebebeb; }

  /* ── Sign rows ── */
  .sign-table td { font-size: 7.5pt; padding: 3px 5px; border: 1px solid #000; }
  .sign-table .s-label { font-weight: 700; background: #f0f0f0; width: 28%; }
  .sign-table .tall { height: 12mm; vertical-align: top; }

  .footer { margin-top: 3px; font-size: 6.5pt; color: #444; }

  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { width: 210mm; min-height: 297mm; padding: 6mm 7mm; box-shadow: none; }
    @page { size: A4; margin: 0; }
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
  <!-- ═══ HEADER ═══ -->
  <div class="header">
    <div class="logo-block">
        <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="AIIMS Logo" width="100"  class="logo-icon"> 
    </div>
    <div class="form-title">ALLERGY RECORD FORM (ALF)</div>

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

  <!-- ═══ PATIENT INFO ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <div class="name-bar">
      <span>PATIENT NAME: {{ $latestEntry->patient_name ?? '-' }}</span>
      <span>UHID: {{ $latestEntry->uhid  ?? '-' }}</span>
    </div>
    <table class="info-table">
      <tr>
        <td class="lbl" style="width:70px;">Gender: </td>
        <td style="width:100px;">{{ $latestEntry->gender == 'M' ? 'Male' : ($latestEntry->gender == 'F' ? 'Female' : '-') }}</td>
        <td class="lbl" style="width:35px;">Age:</td>
        <td>{{ $latestEntry->age ?? '-' }}</td>
      </tr>
      <tr>
        <td class="lbl">Weight:</td>
        <td>{{ $latestEntry->weight ?? '-' }}</td>
        <td class="lbl">Height:</td>
        <td>{{ $latestEntry->height ?? '-' }}</td>
      </tr>
      <tr>
        <td class="lbl">Location:</td>
        <td colspan="3">
        {{ $latestEntry->location  ?? '-' }}
        </td>
      </tr>
      <tr>
        <td class="lbl">Date of Assessment:</td>
        <td>{{ $latestEntry->assess_date  ?? '-' }}</td>
        <td class="lbl">Time:</td>
        <td>{{ $latestEntry->assess_time  ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ ALLERGY IDENTIFICATION ═══ -->
  <div class="section-wrap" style="margin-bottom:3px;">
    <div class="sec-title">ALLERGY IDENTIFICATION</div>
    <table class="alf-table">
      <thead>
        <tr>
          <th style="width:30%; background:#d8d8d8;">Parameter</th>
          <th style="background:#d8d8d8;">Details/Observations</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="row-lbl">Known Allergy</td>
          <td>{{ $latestEntry->known_allergy  ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-lbl">Type of Allergy:</td>
          <td>
          {{ $latestEntry->allergy_type ?? ''   }}
          </td>
        </tr>
        <tr>
          <td class="row-lbl">Severity:</td>
          <td>
            <span class="cb"></span>Mild &nbsp;&nbsp;
            <span class="cb"></span>Moderate &nbsp;&nbsp;
            <span class="cb"></span>Severe &nbsp;&nbsp;
            <span class="cb"></span>Life-threatening
          </td>
        </tr>
        <tr>
          <td class="row-lbl">Reaction type</td>
          <td>
            {{ $latestEntry->ai_reaction ?? '' }}
          </td>
        </tr>
        <tr>
          <td class="row-lbl" style="font-weight:400; font-style:italic;">Describe the reaction type (if any)</td>
          <td></td>
        </tr>
        <tr>
          <td class="row-lbl">Date first noted</td>
          <td>
            {{ $latestEntry->ai_date_noted  ?? '' }} &nbsp;&nbsp;
            <strong>Documented: </strong> &nbsp;
            {{ $latestEntry->ai_documented  ?? '' }} &nbsp;&nbsp;
          </td>
        </tr>
        <tr>
          <td class="row-lbl">Source/Documentation</td>
          <td>
             {{ $latestEntry->ai_source ?? '' }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ DRUG/MEDICATION ALLERGIES ═══ -->
  <div class="section-wrap" style="margin-bottom:3px;">
    <div class="sec-title">DRUG/MEDICATION ALLERGIES</div>
    <table class="alf-table">
      <tr>
        <td class="row-lbl">Name of the Drug(s):</td>
        <td colspan="2">{{ $latestEntry->drug_name ?? '' }}</td>
        <td class="lbl" style="width:100px;">Date of Reaction:</td>
        <td style="width:80px;">{{ $latestEntry->drug_reaction_date ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Medication Reaction Observed</td>
        <td colspan="4">{{$latestEntry->drug_reaction_obs ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Severity:</td>
        <td colspan="4">
          {{ $latestEntry->drug_severity ?? '' }}
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Reaction type</td>
        <td colspan="4">
          {{ $latestEntry->drug_reaction_type  ?? '' }}
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Precautions:</td>
        <td colspan="4">{{ $latestEntry->drug_precautions  ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Notes</td>
        <td colspan="4">{{ $latestEntry->drug_notes  ?? '' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ FOOD & OTHER ALLERGIES ═══ -->
  <div class="section-wrap" style="margin-bottom:3px;">
    <div class="sec-title">FOOD &amp; OTHER ALLERGIES</div>
    <table class="alf-table">
      <tr>
        <td class="row-lbl">Name of the Allergen(s):</td>
        <td colspan="2">{{ $latestEntry->food_allergen ?? '' }}</td>
        <td class="lbl" style="width:100px;">Date of Reaction:</td>
        <td style="width:80px;">{{ $latestEntry->food_reaction_date  ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Food/Other Reaction Observed</td>
        <td colspan="4">{{ $latestEntry->food_reaction_obs  ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Severity:</td>
        <td colspan="4">
            {{ $latestEntry->food_severity   ?? '' }}
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Reaction type</td>
        <td colspan="4">
            {{ $latestEntry->food_reaction_type   ?? '' }}
        </td>
      </tr>
      <tr>
        <td class="row-lbl">Precautions:</td>
        <td colspan="4">{{ $latestEntry->food_precautions   ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Notes</td>
        <td colspan="4">{{ $latestEntry->food_notes_yn   ?? '' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ INTERVENTIONS/PRECAUTIONS ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <div class="sec-title">INTERVENTIONS/PRECAUTIONS</div>
    <table class="int-table">
      <tr>
        <td class="row-lbl">Allergy bracelet / Identification worn</td>
        <td class="opt" colspan="2">{{ $latestEntry->bracelet  ?? '' }}</td>
        
      </tr>
      <tr>
        <td class="row-lbl">Medication alerts in EMR system</td>
        <td class="opt" colspan="2">{{ $latestEntry->emr_alert   ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Special diet / environment precaution implemented</td>
        <td class="opt" colspan="2">{{ $latestEntry->special_diet   ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Pre-medication given (if required for procedures)</td>
        <td class="opt" colspan="2">{{ $latestEntry->pre_med    ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Staff informed of allergies</td>
        <td class="opt" colspan="2">{{ $latestEntry->staff_informed    ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Other Precautions, specify:</td>
        <td colspan="2">{{ $latestEntry->other_precautions_txt     ?? '' }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Notes/Observations:</td>
        <td colspan="2" style="height:14mm; vertical-align:top;">{{ $latestEntry->int_notes     ?? '' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ SIGN OFF ═══ -->
  <table class="sign-table" style="margin-bottom:3px;">
    <tr>
      <td class="s-label">Name of the Physician</td>
      <td class="s-label" style="width:36%;">Signature of the Physician</td>
      <td class="s-label" style="width:22%;">Date and Time</td>
    </tr>
    <tr class="tall">
      <td>
        {{ $latestEntry->physician_name   ?? '' }}
      </td><td>    {{ $latestEntry->physician_sig    ?? '' }}</td><td>
        {{ $latestEntry->physician_datetime    ?? '' }}
      </td></tr>
    <tr>
      <td class="s-label">Name of the Nurse</td>
      <td class="s-label">Signature of the Nurse</td>
      <td class="s-label">Date and Time</td>
    </tr>
    <tr class="tall"><td>{{ $latestEntry->nurse_name   ?? '' }}</td><td>{{ $latestEntry->nurse_sig    ?? '' }}</td><td>{{ $latestEntry->nurse_datetime    ?? '' }}</td></tr>
    <tr>
      <td class="s-label">Verified By</td>
      <td class="s-label">Signature</td>
      <td class="s-label">Date and Time</td>
    </tr>
    <tr class="tall"><td>{{ $latestEntry->verified_by   ?? '' }}</td><td>{{ $latestEntry->verified_sig    ?? '' }}</td><td>{{ $latestEntry->verified_datetime    ?? '' }}</td></tr>
  </table>

  <div class="footer">AF/RF/ARF/v01/Jan2026 – AF 17</div>

</div>
</body>
</html>