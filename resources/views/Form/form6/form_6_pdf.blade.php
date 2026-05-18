<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nutritional Assessment for Adult – Nursing (NAN)</title>
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
    font-size: 13pt;
    font-weight: 900;
    text-align: center;
    flex: 1;
    padding: 0 6px;
    line-height: 1.25;
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

  /* ── Patient bar ── */
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

  /* ── Section label rows ── */
  .sec-row td {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 2px 5px;
  }
  .sub-row td {
    background: #d8d8d8;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 1.5px 4px;
  }
  .label-only td {
    font-weight: 700;
    font-size: 7.5pt;
    padding: 2px 4px;
    background: #f5f5f5;
  }

  /* ── Three-column grading table ── */
  .grade-table th {
    background: #d8d8d8;
    font-weight: 700;
    text-align: center;
    font-size: 7.5pt;
    padding: 2px 3px;
    border: 1px solid #000;
  }
  .grade-table td { border: 1px solid #000; font-size: 7.5pt; padding: 2px 4px; }
  .grade-table tr:nth-child(even) td { background: #f8f8f8; }

  /* ── GI symptoms table ── */
  .gi-table td { font-size: 7.5pt; padding: 2px 4px; border: 1px solid #000; }
  .gi-table .row-lbl { font-weight: 700; width: 30%; }
  .gi-table .opt { width: 12%; }
  .gi-table .rem { width: 34%; }
  .gi-table tr:nth-child(even) td { background: #f8f8f8; }

  /* ── Sign rows ── */
  .sign-table td { font-size: 7.5pt; padding: 3px 5px; border: 1px solid #000; }
  .sign-table .s-label { font-weight: 700; background: #f0f0f0; width: 50%; }
  .sign-table .tall { height: 18mm; vertical-align: top; }

  /* ── Signoff ── */
  .signoff-table td { font-size: 8pt; padding: 3px 5px; border: 1px solid #000; }
  .signoff-table .s-label { font-weight: 700; background: #f0f0f0; }

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
    
        <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="AIIMS Logo" width="100"  class="logo-icon"> 
    
 
    <div class="form-title">NUTRITIONAL ASSESSMENT<br>FOR ADULT – NURSING (NAN)</div>

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
      <span> <strong>PATIENT'S NAME:</strong> &nbsp; {{ $latestEntry->patient_name ?? '-' }}   </span>
      <span><strong>UHID:</strong> &nbsp; {{ $latestEntry->uhid ?? '-' }}</span>
    </div>
    <table class="info-table">
      <tr>
        <td class="lbl" style="width:35px;"><strong>Age:</strong> {{ $latestEntry->age ?? '-' }} </td>
        <td style="width:110px;">
          <span class="lbl"> <strong>Gender:</strong>   {{ is_array($latestEntry->gender) ? implode(', ', $latestEntry->gender) : ($latestEntry->gender ?? '-') }} </span>
         
        </td>
        <td class="lbl" style="width:60px;"><strong>Diagnosis:</strong> {{ $latestEntry->diagnosis ?? '-' }}   </td>
        <td></td>
      </tr>
      <tr>
        <td class="lbl"><strong>Location:</strong></td>
        <td colspan="3">
          {{ $latestEntry->loc  ?? '-' }}
        </td>
      </tr>
      <tr>
        <td class="lbl"><strong>Weight:</strong> </td>
        <td> {{ $latestEntry->weight  ?? '-' }} &nbsp; Kg</td>
        <td class="lbl"><strong>Height:</strong></td>
        <td>{{ $latestEntry->height  ?? '-' }} cm &nbsp;&nbsp;&nbsp; <strong>BMI:</strong> {{ $latestEntry->bmi ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ GRADING TABLE ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table class="grade-table">
      <thead>
        <tr>
          <th style="width:33%;">Recent Weight Change</th>
          <th style="width:33%;">Grading of Obesity</th>
          <th style="width:34%;">Grading of Chronic Energy Deficiency (CED)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $latestEntry->wt_change  ?? '-' }} </td>
           <td rowspan="4">{{ $latestEntry->obesity_grade   ?? '-' }}</td>
          <td rowspan="4">{{ $latestEntry->ced_grade    ?? '-' }}</td>
        </tr>
        <tr>
          <td>Weight gain or loss: {{ $latestEntry->wt_amount  ?? '-' }} Kg</td>
      
        </tr>
        <tr>
          <td>Time: {{ $latestEntry->wt_months  ?? '-' }} months</td>
        </tr>
        <tr>
          <td> {{ $latestEntry->wt_intentional   ?? '-' }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ DIAGNOSIS ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table>
      <tr class="label-only"><td colspan="3"><strong>Primary Diagnosis:</strong> {{ $latestEntry->primary_diag  ?? '-' }}</td></tr>
      <tr class="sub-row"><td colspan="3">Nutrition Related Diagnosis: {{ $latestEntry->nutr_diag   ?? '-' }}</td></tr>
      <tr>
        <td><span class="cb"></span>Malnutrition</td>
        <td><span class="cb"></span>Sepsis</td>
        <td><span class="cb"></span>Diabetes</td>
      </tr>
      <tr>
        <td><span class="cb"></span>Hypertension</td>
        <td><span class="cb"></span>Cardiac: …………………………</td>
        <td><span class="cb"></span>Renal: …………………………</td>
      </tr>
      <tr>
        <td><span class="cb"></span>Hepatic:</td>
        <td><span class="cb"></span>Others: …………………………</td>
        <td></td>
      </tr>
    </table>
  </div>

  <!-- ═══ GI SYMPTOMS ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table class="gi-table">
      <thead>
        <tr>
          <th class="row-lbl">Gastro-intestinal Symptoms</th>
          <th class="opt" colspan="2">Yes / No</th>
          <th class="rem">If yes, fill up below section</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="row-lbl">Loss of appetite</td>
          <td class="opt" colspan="2">  {{ $latestEntry->gi_overall     ?? '-' }}</td>
          <td class="rem"><strong>Remarks:</strong> {{ $latestEntry->appetite_remarks     ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-lbl">Nausea</td>
          <td class="opt" colspan="2">  {{ $latestEntry->nausea    ?? '-' }}</td>
          <td class="rem"><strong>Remarks:</strong> {{ $latestEntry->nausea_remarks    ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-lbl">Vomiting</td>
          <td class="opt" colspan="2">  {{ $latestEntry->vomiting   ?? '-' }}</td>
          <td class="rem"><strong>Remarks:</strong> {{ $latestEntry->vomiting_remarks   ?? '-' }}</td>
        </tr>
        <tr>
          <td class="row-lbl">Diarrhoea</td>
          <td class="opt" colspan="2">{{ $latestEntry->diarrhoea  ?? '-' }}</td>
          <td class="rem"><strong>Remarks:</strong> {{ $latestEntry->diarrhoea_remarks   ?? '-' }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ═══ FOOD ALLERGY ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table>
      <tr>
        <td class="lbl" style="width:30%;">Food Allergy</td>
        <td style="width:15%;" colspan="2">{{ $latestEntry->food_allergy ?? '-' }}</td>
        <td><strong>Remarks:</strong> {{ $latestEntry->food_allergy_remarks  ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ FOOD PREFERENCE ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table>
      <tr>
        <td class="lbl" style="width:30%;">Food Preference:</td>
        <td colspan="3">{{ $latestEntry->food_preference  ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ FEEDING MODE ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table>
      <tr>
        <td class="lbl" style="width:30%;">Feeding Mode</td>
        <td>{{ $latestEntry->feeding_mode  ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ CHEWING / SWALLOWING ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table>
      <tr>
        <td class="lbl" style="width:30%;">Chewing / Swallowing difficulty</td>
        <td>{{ $latestEntry->chewing   ?? '-' }}</td>
        <td><strong>Remarks:</strong> {{ $latestEntry->chewing_remarks   ?? '-' }}</td>
      </tr>
    </table>
  </div>

  <!-- ═══ ACTIVITY LEVEL ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table>
      <tr>
        <td class="lbl" style="width:30%;">Activity Level</td>
        <td>
          {{ $latestEntry->activity  ?? '-' }}
        </td>
      </tr>
    </table>
  </div>

  <!-- ═══ DIET RECOMMENDATION ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table class="sign-table">
      <tr>
        <td class="s-label">Diet Recommendation by Clinician</td>
        <td class="s-label">Name, seal, Signature with Date and Time</td>
      </tr>
      <tr>
        <td class="tall"></td>
        <td class="tall"></td>
      </tr>
    </table>
  </div>

  <!-- ═══ DIET PLAN ═══ -->
  <div class="section-wrap" style="margin-bottom:4px;">
    <table class="sign-table">
      <tr>
        <td class="s-label">Diet Plan by Dietitian</td>
        <td class="s-label">Name, seal, Signature with Date and Time</td>
      </tr>
      <tr>
        <td class="tall" style="height:22mm;"></td>
        <td class="tall" style="height:22mm;"></td>
      </tr>
    </table>
  </div>

  <!-- ═══ SIGN OFF ═══ -->
  <table class="signoff-table" style="margin-bottom:3px;">
    <tr>
      <td class="s-label" style="width:50%;">Name &amp; Signature of the Nurse</td>
      <td class="s-label">Date and Time</td>
    </tr>
    <tr style="height:12mm;"><td></td><td></td></tr>
    <tr>
      <td class="s-label">Verified by:</td>
      <td class="s-label">Emp. ID</td>
    </tr>
    <tr style="height:10mm;"><td></td><td></td></tr>
  </table>

  <div class="footer">NF/NAF/NAN/v01/Jan2026 – NF11</div>
  <div class="footer">Print By: 'Employee Name', Employee ID, Designation | Printed on: {{ date('Y-m-d H:i:s') }} </div>


</div>
</body>
</html>