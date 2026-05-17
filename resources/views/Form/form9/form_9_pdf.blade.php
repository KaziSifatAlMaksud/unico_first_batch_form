<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>End-of-Life Care Form (ELF)</title>
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
    padding: 6mm 8mm 6mm 8mm;
    color: #000;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
  }

  table { border-collapse: collapse; width: 100%; }
  td, th { border: 1px solid #000; padding: 1.5px 3px; vertical-align: middle; font-size: 7.5pt; }

  /* Checkbox */
  .cb {
    display: inline-block;
    width: 7px; height: 7px;
    border: 1px solid #000;
    margin-right: 2px;
    vertical-align: middle;
    position: relative; top: -1px;
    flex-shrink: 0;
  }

  /* ── HEADER ── */
  .header {
    display: flex;
    align-items: stretch;
    margin-bottom: 3px;
    gap: 3px;
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
    letter-spacing: 0.5px;
  }

  .patient-label-box {
    border: 1.5px solid #000;
    width: 58mm;
    flex-shrink: 0;
    padding: 2px 3px;
    font-size: 6pt;
    line-height: 1.55;
  }
  .patient-label-box .lb-title {
    text-align: center;
    font-weight: 700;
    font-size: 7pt;
    border-bottom: 1px solid #000;
    padding-bottom: 1px;
    margin-bottom: 2px;
  }
  .patient-label-box .lb-row {
    border-bottom: 0.5px dotted #bbb;
    padding: 0.5px 0;
  }

  /* ── PATIENT NAME BAR ── */
  .name-bar {
    display: grid;
    grid-template-columns: 65fr 35fr;
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 8pt;
    padding: 2px 5px;
    margin-bottom: 0;
  }

  /* ── INFO TABLE ── */
  .info-table td {
    font-size: 7pt;
    padding: 2px 4px;
    height: 7mm;
  }
  .info-table .lbl { font-weight: 700; }

  /* ── SECTION ROW (dark header) ── */
  .sec-row td {
    background: #000;
    color: #fff;
    font-weight: 700;
    font-size: 7.5pt;
    padding: 2px 5px;
    border-color: #000;
  }

  /* ── SUBSECTION ROW (light gray) ── */
  .sub-row td {
    background: #e0e0e0;
    font-weight: 700;
    font-size: 7pt;
    padding: 2px 5px;
  }

  /* ── SECTION LABEL ROW (very light) ── */
  .label-row td {
    background: #f0f0f0;
    font-size: 7pt;
    padding: 2px 5px;
    font-weight: 700;
  }

  /* ── INSIGHT TABLE ROWS ── */
  .insight-table td {
    font-size: 7pt;
    padding: 2px 4px;
    border: 1px solid #000;
  }
  .insight-table .cat-row td {
    background: #e8e8e8;
    font-weight: 700;
    padding: 2px 5px;
  }
  .insight-table .pf-row td {
    background: #fff;
    padding: 2px 4px;
  }
  .insight-table .pf-row.alt td {
    background: #f7f7f7;
  }

  /* checkbox row inside insight */
  .cb-group {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .cb-item {
    display: flex;
    align-items: center;
    gap: 2px;
    white-space: nowrap;
    font-size: 7pt;
  }

  /* indent */
  .indent { padding-left: 22mm !important; }

  /* ── WRITE LINE ── */
  .write-line {
    border: none;
    border-bottom: 0.5px dotted #999;
    width: 100%;
    display: block;
    margin: 1px 0;
    height: 8px;
  }

  /* ── SIGNATURE TABLE ── */
  .sig-table th {
    background: #e0e0e0;
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
  .sig-table .row-lbl { font-weight: 700; background: #f5f5f5; width: 22mm; }

  /* ── FOOTER ── */
  .footer {
    display: flex;
    justify-content: space-between;
    font-size: 6pt;
    color: #444;
    margin-top: 3px;
  }

  @media print {
    body { background: none; padding: 0; margin: 0; }
    .page { box-shadow: none; width: 210mm; min-height: 297mm; padding: 6mm 8mm; }
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
    <img src="{{ asset('assets/img/unico_icon.jpg') }}" alt="AIIMS Logo" width="100"  class="logo-icon"> 
    <div class="title-area">
      <h1>END-OF-LIFE CARE FORM (ELF)</h1>
    </div>
    <div class="patient-label-box">
      <div class="lb-title">PATIENT LABEL</div>
      <div class="lb-row">Invoice No: ………………………………</div>
      <div class="lb-row">UHID: ……………………………………</div>
      <div class="lb-row">Patient name: …………………………</div>
      <div class="lb-row">Consultant name: ……………………</div>
      <div class="lb-row">Age: ……Day…… Month…… Year……</div>
      <div class="lb-row">Mobile no: …………………………</div>
      <div class="lb-row">Print: …………………………………</div>
    </div>
  </div>

  <!-- ═══ PATIENT NAME BAR ═══ -->
  <div class="name-bar">
    <span><strong>PATIENT'S NAME:</strong> {{ $latestEntry->patient_name ?? '-' }} </span>
    <span><strong>UHID:</strong> {{ $latestEntry->uhid ?? '-' }}</span>
  </div>

  <!-- ═══ PATIENT INFO TABLE ═══ -->
  <table class="info-table" style="margin-bottom:3px;">
    <tr>
      <td class="lbl" style="width:30%;"><strong>Gender:</strong> {{ $latestEntry->gender  ?? '-' }}</td>
      <td style="width:35%;"><strong>Age:</strong> {{ $latestEntry->age  ?? '-' }}</td>
    </tr>
    <tr>
      <td class="lbl"><strong>Department:</strong> {{ $latestEntry->department  ?? '-' }}</td>
      <td colspan="2"><strong>Bed/Cabin:</strong> {{ $latestEntry->bed_cabin ?? '-' }}</td>
    </tr>
    <tr>
      <td class="lbl"><strong>Consultant:</strong> {{ $latestEntry->consultant ?? '-' }}</td>
      <td colspan="2"></td>
    </tr>
  </table>

  <!-- ═══ CONSULTANT / DEPARTMENT / DATE ═══ -->
  <table style="margin-bottom:0;">
    <tr>
      <td style="width:32%;"><strong>Consultant:</strong> {{ $latestEntry->consultant2  ?? '-' }}</td>
      <td style="width:36%;"><strong>Department:</strong> {{ $latestEntry->dept2  ?? '-' }}</td>
      <td style="width:32%;"><strong>Date:</strong> {{ $latestEntry->consult_date  ?? '-' }}</td>
    </tr>
    <tr>
      <td colspan="3" style="padding:2px 5px;">
        <strong>Plan of Care:</strong> &nbsp;&nbsp;
         {{ $latestEntry->plan   ?? '-'   }}
        (Specify) -  {{ $latestEntry->plan_other  ?? '.........' }}
      </td>
    </tr>
  </table>

  <!-- ═══ INSIGHT TO THE CONDITION ASSESSED ═══ -->
  <table class="insight-table" style="margin-top:3px; margin-bottom:3px;">

    <!-- Section header -->
    <tr class="sec-row"><td colspan="4">INSIGHT TO THE CONDITION ASSESSED</td></tr>

    <!-- Awareness of Diagnosis -->
    <tr class="cat-row"><td colspan="4">Awareness of the Diagnosis:</td></tr>
    <tr class="pf-row">
      <td class="indent" colspan="2">
        <strong>  Patient: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->aware_diag_pt  }}
      </td>
      <td class="indent" colspan="2">
        <strong>          Family &nbsp;&nbsp;: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->aware_diag_fam   }}
      </td>
    </tr>
   
    <!-- Recognition of Dying Status -->
    <tr class="cat-row"><td colspan="4">Recognition of the Dying Status:</td></tr>
    <tr class="pf-row">
      <td class="indent" colspan="2">
         <strong>  Patient: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->recog_dying_pt   }}
      </td>
      <td class="indent" colspan="2">
            <strong>          Family &nbsp;&nbsp;: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->recog_dying_fam    }}
      </td>
    </tr>

    <!-- Communication of Bed News -->
    <tr class="cat-row"><td colspan="4">Communication of Bed News to:</td></tr>
    <tr class="pf-row">
      <td class="indent" colspan="2">
        <strong>  Patient: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->comm_bed_pt    }}
      </td>
      <td class="indent" colspan="2">
            <strong>          Family &nbsp;&nbsp;: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->comm_bed_fam     }}
      </td>
    </tr>

    <!-- Plan of care explained -->
    <tr class="cat-row"><td colspan="4">Plan of care explained and discussed with:</td></tr>
    <tr class="pf-row">
      <td class="indent" colspan="2">
       <strong>  Patient: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->plan_exp_pt     }}
      </td>
      <td class="indent" colspan="2">
            <strong>          Family &nbsp;&nbsp;: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->plan_exp_fam      }}
      </td>
    </tr>

    <!-- Understanding of planned care -->
    <tr class="cat-row"><td colspan="4">Understanding of planned care:</td></tr>
    <tr class="pf-row">
      <td class="indent" colspan="2">
       <strong>  Patient: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->understand_pt      }}
      </td>
      <td class="indent" colspan="2">
            <strong>          Family &nbsp;&nbsp;: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->understand_fam       }}
      </td>
    </tr>
    <!-- Psychological Stressors -->
    <tr class="cat-row"><td colspan="4">Psychological Stressors:</td></tr>
    <tr class="pf-row">
      <td class="indent" colspan="2">
       <strong>  Patient: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->psych_pt       }}
      </td>
      <td class="indent" colspan="2">
            <strong>          Family &nbsp;&nbsp;: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->psych_fam        }}
      </td>
    </tr>
    <!-- Clinical Psychologist -->
    <tr class="pf-row">
      <td colspan="4" style="padding:2px 5px;">
       <strong> Clinical psychologist's Consultation required: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
        {{ $latestEntry->clin_psych   }}
      </td>
    </tr>

    <!-- Social Stressors -->
    <tr class="cat-row"><td colspan="4">Social Stressors:</td></tr>
    <tr class="pf-row">
      <td class="indent" colspan="2">
       <strong>  Patient: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->social_pt        }}
      </td>
      <td class="indent" colspan="2">
            <strong>          Family &nbsp;&nbsp;: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->social_fam         }}
      </td>
    </tr>

    <!-- Medical Social Worker -->
    <tr class="pf-row">
      <td colspan="4" style="padding:2px 5px;">
       <strong> Medical Social worker's Consultations required: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
        {{ $latestEntry->msw    }}
      </td>
    </tr>

    <!-- Religious / Spiritual Needs -->
    <tr class="cat-row"><td colspan="4">Religious / Spiritual needs / Reaction to illness assessed:</td></tr>
    <tr class="pf-row">
      <td class="indent" colspan="2">
       <strong>  Patient: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->relig_pt        }}
      </td>
      <td class="indent" colspan="2">
            <strong>          Family &nbsp;&nbsp;: </strong>  &nbsp;&nbsp;
         {{ $latestEntry->relig_fam          }}
      </td>
    </tr>

    <!-- Religious traditional needs -->
    <tr class="cat-row"><td colspan="4">Religious, traditional needs identified:</td></tr>
    <tr class="pf-row">
      <td colspan="4" style="padding:3px 5px;">
         {{ $latestEntry->trad_needs           }}
      </td>
    </tr>

    <!-- If yes please specify -->
    <tr class="pf-row alt">
      <td colspan="4" style="padding:2px 5px; font-size:6.8pt;">
        (If yes please specify): 
     {{ $latestEntry->trad_needs_specify }}
    </tr>

    <!-- Identified special needs -->
    <tr class="cat-row">
      <td colspan="4" style="font-size:6.8pt; font-weight:700;">
        Identified special needs: (Despair, suffering, guilt, or forgiveness now, at all time of impending death, at death and after death):
      </td>
    </tr>
    <tr class="pf-row">
      <td colspan="4" style="padding:3px 5px;">
          {{ $latestEntry->special_needs }}
      </td>
    </tr>
    <tr class="pf-row alt">
      <td colspan="4" style="padding:2px 5px; font-size:6.8pt;">
        (If yes please specify):
      {{ $latestEntry->special_needs_specify  }}
      </td>
    </tr>

  </table>

  <!-- ═══ SIGNATURE TABLE ═══ -->
  <table class="sig-table" style="margin-bottom:4px;">
    <thead>
      <tr>
        <th style="width:20%;">Signature</th>
        <th style="width:28%;">Name</th>
        <th style="width:18%;">Emp. ID</th>
        <th style="width:20%;">Date</th>
        <th style="width:14%;">Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="row-lbl">Doctor</td>
        <td>
          {{ $latestEntry->doc_name }}
        </td>
        <td>{{ $latestEntry->doc_empid  }}</td>
        <td> {{ $latestEntry->doc_date  }}</td>
        <td>{{ $latestEntry->doc_time  }}</td>
      </tr>
      <tr>
        <td class="row-lbl">Verified by</td>
        <td>{{ $latestEntry->ver_name }}</td>
        <td>{{ $latestEntry->ver_empid }}</td>
        <td>{{ $latestEntry->ver_date }}</td>
        <td>{{ $latestEntry->ver_time }}</td>
      </tr>
    </tbody>
  </table>

  <!-- ═══ FOOTER ═══ -->
  <div class="footer">
    <span>UHP/MS/IPD-027/VER-00/24</span>
    <span>AF/LES/DNR/v01/Jan2026 – AF09</span>
  </div>

     <div class="footer-ref">Print By: 'Employee Name', Employee ID, Designation | Printed on: {{ date('Y-m-d H:i:s') }} </div>


</div>
</body>
</html>