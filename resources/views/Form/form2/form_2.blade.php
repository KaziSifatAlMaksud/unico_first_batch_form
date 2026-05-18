<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pressure Sore Assessment Form</title>

<link rel="stylesheet" href="{{ asset('assets/css/form_css.css') }}">
<style>
  /* ── DETAIL TABLE (shared) ── */
  .detail-table { width: 100%; border-collapse: collapse; }
  .detail-table th {
    background: var(--subrow); color: var(--navy);
    font-weight: 700; font-size: 10.5px;
    text-transform: uppercase; letter-spacing: 0.3px;
    padding: 5px 8px; border: 1px solid var(--border-light); text-align: left;
  }
  .detail-table td {
    padding: 4px 8px; border: 1px solid var(--border-light);
    vertical-align: middle; font-size: 11.5px;
  }
  .detail-table tr:nth-child(even) td { background: #f8fafc; }
  .detail-table tr:nth-child(odd)  td { background: #fff; }
  .detail-table .row-label {
    font-weight: 600; color: var(--navy);
    background: #f0f4f8 !important; white-space: normal;
    width: 200px;
  }
  .detail-table .row-label.indent {
    padding-left: 20px; font-weight: 400;
    color: var(--text-muted); font-style: italic;
    background: #f8f9fb !important;
  }
  .detail-table .row-label.stage-header {
    background: var(--olive-light) !important;
    color: var(--olive); font-weight: 700;
    font-size: 11px; text-transform: uppercase;
  }
  .detail-table .row-label.green-lbl {
    background: var(--green-light) !important;
    color: var(--green-header) !important;
  }
  .detail-table input[type="text"],
  .detail-table input[type="date"],
  .detail-table input[type="datetime-local"],
  .detail-table input[type="number"] {
    border: none; border: 1px solid var(--border);
    width: 100%; font-family: inherit; font-size: 11.5px;
    padding: 1px 2px; background: transparent; outline: none; color: var(--text);
  }

  /* ── CB ROW ── */
  .cb-row { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
  .cb-row label { display: flex; align-items: center; gap: 4px; cursor: pointer; font-size: 11.5px; white-space: nowrap; margin-bottom: 0; }
  .cb-row input[type="checkbox"] { accent-color: var(--navy); width: 12px; height: 12px; }



  /* stage checkbox rows */
  .stage-row { background: #fff !important; }
  .stage-row td { padding: 3px 8px !important; }
  .stage-row label { display: flex; align-items: flex-start; gap: 5px; cursor: pointer; font-size: 11px; line-height: 1.4; margin-bottom: 0; }
  .stage-row input[type="checkbox"] { accent-color: var(--navy); margin-top: 2px; flex-shrink: 0; }

  /* ── PROGRESS NOTE / REMARKS ── */
  .note-area {
    display: grid; grid-template-columns: 1fr 1fr;
    border-top: 1px solid var(--border-light);
  }
  .note-cell { padding: 6px 8px; border-right: 1px solid var(--border-light); }
  .note-cell:last-child { border-right: none; }
  .note-cell label { display: block; font-size: 10.5px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 3px; }
  .note-cell textarea {
    width: 100%; height: 70px; border: 1px solid var(--border-light);
    border-radius: var(--radius); font-family: inherit; font-size: 11.5px;
    resize: vertical; padding: 4px; outline: none; color: var(--text); background: #fafaf8;
  }
  .note-cell textarea:focus { border-color: var(--teal); }

  /* ── WOUND PHOTOS ── */
  .wound-section {
    border-top: 2px solid var(--navy-dark);
    display: grid; grid-template-columns: 1fr 1fr 1fr;
  }
  .wound-cell {
    border-right: 1px solid var(--border); padding: 10px;
    display: flex; flex-direction: column; align-items: center; gap: 8px;
  }
  .label_text {
      font-size: 10px;
      color: rgba(255, 255, 255, 0.65);
      text-transform: uppercase;
      letter-spacing: 0.6px;
  }
  .wound-cell:last-child { border-right: none; }
  .wound-upload {
    width: 100%; height: 110px; border: 1.5px dashed var(--border);
    border-radius: 3px; display: flex; flex-direction: column;
    align-items: center; justify-content: center; cursor: pointer;
    background: #fafaf8; position: relative; overflow: hidden;
    transition: border-color 0.2s, background 0.2s;
  }
  .wound-upload:hover { border-color: var(--teal); background: var(--teal-light); }
  .wound-upload input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
  .wound-upload .wu-icon { font-size: 24px; color: var(--border); }
  .wound-upload .wu-text { font-size: 10px; color: var(--text-muted); text-align: center; }
  .wound-upload img { width: 100%; height: 100%; object-fit: cover; display: none; }
  .wound-caption { font-size: 11px; color: var(--text-muted); font-style: italic; text-align: center; }

  /* ── SIGNATURE GRID ── */
  .sig-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    border-top: 2px solid var(--navy-dark);
  }
  .sig-cell {
    padding: 8px 10px; border-right: 1px solid var(--border-light);
    border-bottom: 1px solid var(--border-light);
  }
  .sig-cell:nth-child(2n) { border-right: none; }
  .sig-cell label { display: block; font-size: 10.5px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 4px; }
  .sig-cell input[type="text"],
  .sig-cell input[type="datetime-local"] {
    border: none; border-bottom: 1px solid var(--border);
    width: 100%; font-family: inherit; font-size: 11.5px;
    padding: 2px 2px; background: transparent; outline: none; color: var(--text);
  }
  .sig-cell input:focus { border-bottom-color: var(--navy); }
  /* ── FORM FOOTER ── */
  .form-footer {
    display: flex; justify-content: flex-end; gap: 10px;
    padding: 10px 14px; background: var(--subrow);
    border-top: 1.5px solid var(--border);
  }
  .btn { padding: 6px 20px; border-radius: 2px; font-family: inherit; font-size: 12px; font-weight: 600; cursor: pointer; border: 1.5px solid transparent; transition: all 0.15s; }
  .btn-primary { background: var(--navy); color: #fff; border-color: var(--navy-dark); }
  .btn-primary:hover { background: var(--navy-dark); }
  .btn-outline { background: transparent; color: var(--navy); border-color: var(--navy); }
  .btn-outline:hover { background: var(--blue-light); }

  /* ── PAIN SCALE ── */
  .pain-scale { display: flex; gap: 2px; }
  .pain-scale span {
    width: 18px; height: 18px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 9px; font-weight: 700; cursor: pointer;
    border: 1px solid var(--border); transition: all 0.1s; user-select: none;
  }
  .pain-scale span:hover { transform: scale(1.15); }

  /* ── RESPONSIVE ── */
  @media (max-width: 700px) {
    body { padding: 6px; }
    .pat-top { flex-direction: column; }
    .pat-row { gap: 6px; }
    .detail-table thead { display: none; }
    .detail-table, .detail-table tbody, .detail-table tr, .detail-table td { display: block; width: 100% !important; }
    .detail-table tr { border-bottom: 2px solid var(--border-light); }
    .detail-table td { border: none; border-bottom: 1px solid var(--border-light); }
    .note-area { grid-template-columns: 1fr; }
    .note-cell { border-right: none; border-bottom: 1px solid var(--border-light); }
    .wound-section { grid-template-columns: 1fr; }
    .wound-cell { border-right: none; border-bottom: 1px solid var(--border); }
    .sig-grid { grid-template-columns: 1fr; }
    .sig-cell { border-right: none; }
    .form-footer .btn { flex: 1; text-align: center; }
    .pain-scale span { width: 22px; height: 22px; font-size: 10px; }
  }
</style>
</head>
<body>
<p class="page-title">PRRSSURE SORE FORM (PSF)</p>
<form id="mainForm" action="{{ route('pressure.sore.store') }}"   method="POST" enctype="multipart/form-data">
    @csrf
<div class="page-wrap">

  <!-- ══ PATIENT HEADER ══ -->
  <div class="form-header">
    <div class="pat-top">
      <div class="hfield" style="flex:2;">
        <label>Patient Name</label>
        <input type="text" name="patient_name" placeholder="Full name">
      </div>
      <div class="hfield" style="flex:0 0 0px;">
        <label class="pat-lbl">UHID</label>
        <input type="text" name="uhid" placeholder="Unit ID">
      </div>
    </div>

     <div class="pat-row">
      <span class="label_text" style="font-size: 12px;">Patient's Location:</span>
      <label class="label_text" ><input type="checkbox"  name="location" value="Cabin/Ward">  Cabin/Ward</label>
      <label class="label_text"><input type="checkbox" name="location" value="CCU"> CCU</label>
      <label class="label_text"><input type="checkbox" name="location" value="ICU"> ICU</label>
      <label class="label_text"><input type="checkbox" name="location" value="Emergency"> Emergency</label>
      <label class="label_text"><input type="checkbox" name="location" value="Cathlab"> Cathlab</label>
      <label class="label_text"><input type="checkbox" name="location" value="Others"> Other:</label>
      <input 
                  type="text" 
                  name="location_other" 
                  placeholder="Specify"
                  style="margin-left:4px; background: rgba(255,255,255,0.15); color:#fff; border:1px solid rgba(255,255,255,0.3); padding:6px 10px; border-radius:4px;"
              >
      <div class="hfield"> <label>Bed No:</label> <input type="text" style="width:40px;" name="bed_no" placeholder="—">  </div>     
    </div>

    <div class="pat-row">
      <div class="hfield" style="padding:0;border:none;">
        <span class="label_text" >Date of Admission:</span>
        <input type="date" name="admission_date" style="width:140px;">
      </div>
      <div class="hfield">
        <label class="label_text">Primary Diagnosis:</label>
         <textarea name="primary_diagnosis" placeholder="Enter diagnosis" style="width:440px; height:60px; resize:none;    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3); color: #fff; border-radius: var(--radius-sm); padding: 3px 8px;   font-size: 12px;
    outline: none;"></textarea>
        {{-- <input type="text"  style="width:440px;" name="primary_diagnosis" placeholder="Enter diagnosis" style="min-width:200px;"> --}}
      </div>
    </div>

    <div class="pat-row">
      <span class="label_text" style="font-size: 11px;font-weight: bold;">Mobility Status:</span>
      <label class="label_text"><input type="checkbox" name="mobility" value="Ambulatory"> Ambulatory</label>
      <label class="label_text"><input type="checkbox" name="mobility" value="Bed-bound"> Bed-bound</label>
      <label class="label_text"><input type="checkbox" name="mobility" value="Chair-bound"> Chair-bound</label>
      <span class="label_text" style="font-size: 11px; padding-lefont-weight: bold;">Nutritional Status:</span>
      <label class="label_text"><input type="checkbox" name="nutrition" value="Well-nourished"> Well-nourished</label>
      <label class="label_text"><input type="checkbox" name="nutrition" value="At-risk Malnutrition"> At-risk Malnutrition</label>
      <label class="label_text"><input type="checkbox" name="nutrition" value="Malnutrition"> Malnutrition</label>
    </div>
  </div>

  <!-- ══ PRESSURE SORE DETAILS ══ -->
  <div class="section">
    <div class="section-header ">Pressure Sore Details</div>
    <table class="detail-table">
      <tbody>
        <tr>
          <td class="row-label">Date &amp; Time of Detection</td>
          <td><input type="datetime-local" name="detection_datetime"></td>
        </tr>
        <tr>
          <td class="row-label">Location(s) of Sore(s)</td>
          <td><input type="text" name="sore_locations" placeholder="e.g. Sacrum, heel, ankle"></td>
        </tr>
        <tr>
          <td class="row-label">Size (L × W × D)</td>
          <td>
              <div class="d-flex align-items-center flex-nowrap gap-2">
                    
                    <input type="number" 
                          name="size_l" 
                          placeholder="L" 
                          step="0.1"
                          class="form-control form-control-sm"
                          style="width:150px;">

                    <span class="text-muted">×</span>

                    <input type="number" 
                          name="size_w" 
                          placeholder="W" 
                          step="0.1"
                          class="form-control form-control-sm"
                          style="width:150px;">

                    <span class="text-muted">×</span>

                    <input type="number" 
                          name="size_d" 
                          placeholder="D" 
                          step="0.1"
                          class="form-control form-control-sm"
                          style="width:150px;">

                    <span class="text-muted small">cm</span>

                </div>
          </td>
        </tr>

        <!-- Appearance header -->
        <tr>
          <td class="row-label" colspan="2" style="background:var(--blue-light)!important;font-weight:700;color:var(--navy);font-size:11px;text-transform:uppercase;letter-spacing:0.3px;">
            Appearance / Characteristics
          </td>
        </tr>
        <tr>
          <td class="row-label indent">— Color</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="color" value="Red"> Red</label>
              <label><input type="checkbox" name="color" value="Yellow"> Yellow</label>
              <label><input type="checkbox" name="color" value="Black"> Black</label>
              <input type="text" name="color_other" placeholder="Other" class="inline w70">
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label indent">— Exudate / Discharge</td>
          <td>
            <div class="cb-row">
              <input type="text" name="exudate" placeholder=" Exudate / Discharge" class="inline w70">
              {{-- <label><input type="checkbox" name="exudate" value="None"> None</label>
              <label><input type="checkbox" name="exudate" value="Serous"> Serous</label>
              <label><input type="checkbox" name="exudate" value="Purulent"> Purulent</label>
              <label><input type="checkbox" name="exudate" value="Sanguineous"> Sanguineous</label> --}}
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label indent">— Odor</td>
          <td>
            <div class="cb-row">
               <input type="text" name="odor" placeholder=" Odor" class="inline w70">
              {{-- <label><input type="checkbox" name="odor" value="Present"> Present</label>
              <label><input type="checkbox" name="odor" value="Absent"> Absent</label> --}}
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label indent">— Surrounding Skin Condition</td>
          <td>
            <div class="cb-row">
                 <input type="text" name="skin_cond" placeholder=" Surrounding Skin Condition.." class="inline w70">
              {{-- <label><input type="checkbox" name="skin_cond" value="Intact"> Intact</label>
              <label><input type="checkbox" name="skin_cond" value="Macerated"> Macerated</label>
              <label><input type="checkbox" name="skin_cond" value="Erythema"> Erythema</label>
              <label><input type="checkbox" name="skin_cond" value="Indurated"> Indurated</label> --}}
            </div>
          </td>
        </tr>

        <!-- Stage header -->
        <tr>
          <td class="row-label stage-header" colspan="2">Stage / Grade (NPUAP/EPUAP Classification)</td>
        </tr>
        <tr class="stage-row">
          <td colspan="2">
            <label><input type="checkbox" name="stage" value="Stage I"> <span><strong>Stage I:</strong> Non-blanchable erythema</span></label>
          </td>
        </tr>
        <tr class="stage-row">
          <td colspan="2">
            <label><input type="checkbox" name="stage" value="Stage II"> <span><strong>Stage II:</strong> Partial thickness skin loss</span></label>
          </td>
        </tr>
        <tr class="stage-row">
          <td colspan="2">
            <label><input type="checkbox" name="stage" value="Stage III"> <span><strong>Stage III:</strong> Full thickness skin loss</span></label>
          </td>
        </tr>
        <tr class="stage-row">
          <td colspan="2">
            <label><input type="checkbox" name="stage" value="Stage IV"> <span><strong>Stage IV:</strong> Full thickness tissue loss</span></label>
          </td>
        </tr>
        <tr class="stage-row">
          <td colspan="2">
            <label><input type="checkbox" name="stage" value="Unstageable"> <span><strong>Unstageable:</strong> Suspected deep tissue injury</span></label>
          </td>
        </tr>

        <!-- Reported / Reviewed -->
        <tr>
          <td class="row-label green-lbl">Reported by</td>
          <td><input type="text" name="reported_by" placeholder="Name &amp; designation"></td>
        </tr>
        <tr>
          <td class="row-label green-lbl">Reviewed by ICN (In-charge Nurse)</td>
          <td><input type="text" name="reviewed_by_icn" placeholder="Name &amp; ID"></td>
        </tr>
        <tr>
          <td class="row-label green-lbl">Note to – CNS (Chief of Nursing)</td>
          <td><input type="text" name="note_cns" placeholder="Note / Action"></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ══ PRESSURE SORE MONITORING ══ -->
  <div class="section">
    <div class="section-header teal">Pressure Sore Monitoring</div>
    <table class="detail-table">
      <tbody>
        <tr>
          <td class="row-label">Repositioning Schedule</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="repo_schedule" value="2 Hr"> 2 Hr</label>
              <label><input type="checkbox" name="repo_schedule" value="4 Hr"> 4 Hr</label>
              <label><input type="checkbox" name="repo_schedule" value="Others"> Others</label>
              <input type="text" name="repo_schedule_other" placeholder="Specify" class="inline w30">
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Pressure-Relieving Devices Used</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="pressure_device" value="Yes"> Yes</label>
              <label><input type="checkbox" name="pressure_device" value="No"> No</label>
              <label><input type="checkbox" name="pressure_device" value="N/A"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Wound Care / Dressing Type</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="dressing_type" value="Open"> Open</label>
              <label><input type="checkbox" name="dressing_type" value="Covered"> Covered</label>
              <label><input type="checkbox" name="dressing_type" value="VAC"> VAC</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Topical Medications</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="topical_meds" value="Yes"> Yes</label>
              <label><input type="checkbox" name="topical_meds" value="No"> No</label>
              <label><input type="checkbox" name="topical_meds" value="N/A"> N/A</label>
              {{-- <span style="color:var(--text-muted);">Specify:</span>
              <input type="text" name="topical_meds_detail" placeholder="Medication name" class="inline w120"> --}}
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Wound Care Team Consulted</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="wc_team" value="Yes"> Yes</label>
              <label><input type="checkbox" name="wc_team" value="No"> No</label>
              <label><input type="checkbox" name="wc_team" value="N/A"> N/A</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Pain Score (0–10)</td>
          <td>
            <div class="cb-row" style="gap:6px;">
              <div class="pain-scale" id="painScale">
                <span style="background:#d4edda;" onclick="setPain(0)">0</span>
                <span style="background:#d4edda;" onclick="setPain(1)">1</span>
                <span style="background:#d4edda;" onclick="setPain(2)">2</span>
                <span style="background:#fff3cd;" onclick="setPain(3)">3</span>
                <span style="background:#fff3cd;" onclick="setPain(4)">4</span>
                <span style="background:#fff3cd;" onclick="setPain(5)">5</span>
                <span style="background:#fde8c8;" onclick="setPain(6)">6</span>
                <span style="background:#fde8c8;" onclick="setPain(7)">7</span>
                <span style="background:#f8d7da;" onclick="setPain(8)">8</span>
                <span style="background:#f8d7da;" onclick="setPain(9)">9</span>
                <span style="background:#f8d7da;" onclick="setPain(10)">10</span>
              </div>
              <input type="number" id="painInput" name="pain_score" min="0" max="10" placeholder="0–10" class="inline w50" oninput="highlightPain(this.value)">
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Pain Characteristics</td>
          <td>
            <div class="cb-row">
              {{-- <label><input type="checkbox" name="pain_char" value="Burning"> Burning</label>
              <label><input type="checkbox" name="pain_char" value="Throbbing"> Throbbing</label>
              <label><input type="checkbox" name="pain_char" value="Aching"> Aching</label>
              <label><input type="checkbox" name="pain_char" value="Sharp"> Sharp</label> --}}
              <input type="text" name="pain_char" placeholder="Pain characteristics (e.g. burning, throbbing)" class="inline w70">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- ══ PRESSURE SORE CARE ══ -->
  <div class="section">
    <div class="section-header green">Pressure Sore Care</div>
    <table class="detail-table">
      <tbody>
        <tr>
          <td class="row-label">Frequency of Assessment</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="freq_assessment" value="Daily"> Daily</label>
              <label><input type="checkbox" name="freq_assessment" value="Alternate"> Alternate</label>
              <label><input type="checkbox" name="freq_assessment" value="Weekly"> Weekly</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Progress</td>
          <td>
            <div class="cb-row">
              <label><input type="checkbox" name="progress" value="Improving"> Improving</label>
              <label><input type="checkbox" name="progress" value="Stable"> Stable</label>
              <label><input type="checkbox" name="progress" value="Deteriorating"> Deteriorating</label>
            </div>
          </td>
        </tr>
        <tr>
          <td class="row-label">Next Review Date</td>
          <td><input type="date" name="next_review_date" style="width:160px;"></td>
        </tr>
      </tbody>
    </table>

    <!-- Progress Note & Remarks -->
    <div class="note-area">
      <div class="note-cell">
        <label>Progress Note</label>
        <textarea name="progress_note" placeholder="Enter progress note..."></textarea>
      </div>
      <div class="note-cell">
        <label>Remarks</label>
        <textarea name="remarks" placeholder="Remarks / additional observations..."></textarea>
      </div>
    </div>
  </div>

  <!-- ══ WOUND PHOTOS ══ -->
  <div class="wound-section">
    <div class="wound-cell">
      <div class="wound-upload" id="wu1">
        <input type="file" id="file1" accept="image/*" name="wound_photo_1" onchange="previewWound(this,'wu1')">
        <div class="wu-icon">📷</div>
        <div class="wu-text">Click to upload photo</div>
        <img id="img1" alt="Wound photo 1">
      </div>
      <div class="wound-caption"><em>Wound Photo (In &lt;3 months)</em></div>
    </div>
    <div class="wound-cell">
      <div class="wound-upload" id="wu2">
        <input type="file" id="file2" accept="image/*" name="wound_photo_2"  onchange="previewWound(this,'wu2')">
        <div class="wu-icon">📷</div>
        <div class="wu-text">Click to upload photo</div>
        <img id="img2" alt="Wound photo 2">
      </div>
      <div class="wound-caption"><em>Wound Photo (During last dressing)</em></div>
    </div>
    <div class="wound-cell">
      <div class="wound-upload" id="wu3">
        <input type="file" id="file3" accept="image/*" name="wound_photo_3" onchange="previewWound(this,'wu3')">
        <div class="wu-icon">📷</div>
        <div class="wu-text">Click to upload photo</div>
        <img id="img3" alt="Wound photo 3">
      </div>
      <div class="wound-caption"><em>Wound Photo (Current)</em></div>
    </div>
  </div>

  <!-- ══ SIGNATURE ══ -->
  <div class="sig-grid">
    <div class="sig-cell">
      <label>Assigned Staff Name</label>
      <input type="text" name="signoff_name" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Employee ID</label>
      <input type="text" name="signoff_emp_id" placeholder="ID">
    </div>
    <div class="sig-cell">
      <label>Date &amp; Time (Sign-off)</label>
      <input type="datetime-local" name="signoff_datetime">
    </div>
    <div class="sig-cell">
      <label>Verified by (Name)</label>
      <input type="text" name="verified_name" placeholder="Full name">
    </div>
    <div class="sig-cell">
      <label>Verified – Employee ID</label>
      <input type="text" name="verified_emp_id" placeholder="ID">
    </div>
    <div class="sig-cell">
      <label>Verified – Date &amp; Time</label>
      <input type="datetime-local" name="verified_datetime">
    </div>
  </div>

  <!-- ══ FORM FOOTER ══ -->
  <div class="form-footer">
    <button type="button" class="btn btn-outline" onclick="resetForm()">Reset</button>
    <button type="Submit" class="btn btn-primary"">Save &amp; Submit</button>
  </div>

</div>
</form>

<div class="toast" id="toast">✓ Assessment saved successfully!</div>

<!-- Bootstrap 4 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

<script>
  /* Pain scale */
  function setPain(val) {
    document.getElementById('painInput').value = val;
    highlightPain(val);
  }
  function highlightPain(val) {
    document.querySelectorAll('#painScale span').forEach((s, i) => {
      s.style.outline   = i == val ? '2px solid #333' : 'none';
      s.style.transform = i == val ? 'scale(1.2)' : '';
    });
  }

  /* Wound photo preview */
  function previewWound(input, wuId) {
    const file = input.files[0];
    if (!file) return;
    const num = wuId.replace('wu', '');
    const reader = new FileReader();
    reader.onload = e => {
      const img = document.getElementById('img' + num);
      const wu  = document.getElementById(wuId);
      img.src = e.target.result;
      img.style.display = 'block';
      wu.querySelector('.wu-icon').style.display = 'none';
      wu.querySelector('.wu-text').style.display = 'none';
    };
    reader.readAsDataURL(file);
  }

  /* Wound upload click handler */
  document.querySelectorAll('.wound-upload').forEach(wu => {
    wu.addEventListener('click', () => wu.querySelector('input[type="file"]').click());
  });
  document.querySelectorAll('.wound-upload input[type="file"]').forEach(inp => {
    inp.addEventListener('click', e => e.stopPropagation());
  });

  /* Reset */
  function resetForm() {
    if (confirm('Reset all fields?')) {
      document.getElementById('mainForm').reset();
      ['img1','img2','img3'].forEach(id => { document.getElementById(id).style.display = 'none'; });
      ['wu1','wu2','wu3'].forEach(id => {
        document.querySelector('#' + id + ' .wu-icon').style.display = '';
        document.querySelector('#' + id + ' .wu-text').style.display = '';
      });
      document.querySelectorAll('#painScale span').forEach(s => { s.style.outline = 'none'; s.style.transform = ''; });
    }
  }

  /* Submit */
  function submitForm() {
    const toast = document.getElementById('toast');
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
  }
</script>
</body>
</html>