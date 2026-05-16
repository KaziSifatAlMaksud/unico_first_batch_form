<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admissions — View All</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --navy: #0f2744;
  --navy2: #1a3a5c;
  --navy3: #2d5a8e;
  --blue: #3b82f6;
  --blue-light: #dbeafe;
  --teal: #0d9488;
  --teal-light: #ccfbf1;
  --red: #dc2626;
  --red-light: #fee2e2;
  --amber: #d97706;
  --amber-light: #fef3c7;
  --green: #16a34a;
  --green-light: #dcfce7;
  --gray50: #f8fafc;
  --gray100: #f1f5f9;
  --gray200: #e2e8f0;
  --gray300: #cbd5e1;
  --gray500: #64748b;
  --gray700: #334155;
  --gray900: #0f172a;
  --white: #ffffff;
  --shadow: 0 1px 3px rgba(15,39,68,0.08), 0 1px 2px rgba(15,39,68,0.06);
  --shadow-md: 0 4px 6px -1px rgba(15,39,68,0.08), 0 2px 4px -1px rgba(15,39,68,0.06);
  --shadow-lg: 0 10px 15px -3px rgba(15,39,68,0.1), 0 4px 6px -2px rgba(15,39,68,0.05);
  --font: 'DM Sans', sans-serif;
  --mono: 'DM Mono', monospace;
  --radius: 10px;
  --radius-sm: 6px;
  --radius-lg: 14px;
}

body {
  font-family: var(--font);
  background: var(--gray50);
  color: var(--gray900);
  min-height: 100vh;
  font-size: 14px;
}




/* ── TOPBAR ── */
.topbar {
  background: var(--navy);
  padding: 0 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 58px;
  position: sticky;
  top: 0;
  z-index: 100;
  box-shadow: 0 2px 8px rgba(0,0,0,0.18);
}
.topbar-brand {
  display: flex;
  align-items: center;
  gap: 10px;
}
.topbar-icon {
  width: 34px; height: 34px;
  background: var(--blue);
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  font-size: 16px;
}
.topbar-title {
  font-size: 16px;
  font-weight: 700;
  color: var(--white);
  letter-spacing: -0.3px;
}
.topbar-sub {
  font-size: 11px;
  color: rgba(255,255,255,0.5);
  letter-spacing: 0.4px;
}
.topbar-actions { display: flex; gap: 10px; align-items: center; }
.btn {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 7px 16px;
  border-radius: var(--radius-sm);
  font-family: var(--font);
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  border: 1.5px solid transparent;
  transition: all 0.15s;
  text-decoration: none;
  white-space: nowrap;
}
.btn-white {
  background: var(--white);
  color: var(--navy2);
  border-color: var(--white);
}
.btn-white:hover { background: var(--gray100); }
.btn-primary {
  background: var(--blue);
  color: var(--white);
  border-color: var(--blue);
}
.btn-primary:hover { background: #2563eb; border-color: #2563eb; }
.btn-outline {
  background: transparent;
  color: var(--gray700);
  border-color: var(--gray200);
}
.btn-outline:hover { background: var(--gray100); border-color: var(--gray300); }

/* ── LAYOUT ── */
.page { margin: 0 auto; padding: 28px 24px; }

/* ── STAT CARDS ── */
.stats-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
  margin-bottom: 24px;
}
.stat-card {
  background: var(--white);
  border: 1px solid var(--gray200);
  border-radius: var(--radius-lg);
  padding: 18px 20px;
  display: flex;
  align-items: center;
  gap: 14px;
  box-shadow: var(--shadow);
  animation: fadeUp 0.4s ease both;
}
.stat-card:nth-child(1) { animation-delay: 0.05s; }
.stat-card:nth-child(2) { animation-delay: 0.10s; }
.stat-card:nth-child(3) { animation-delay: 0.15s; }
.stat-card:nth-child(4) { animation-delay: 0.20s; }
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(10px); }
  to   { opacity: 1; transform: translateY(0); }
}
.stat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
}
.stat-icon.blue  { background: var(--blue-light); }
.stat-icon.teal  { background: var(--teal-light); }
.stat-icon.red   { background: var(--red-light); }
.stat-icon.amber { background: var(--amber-light); }
.stat-num { font-size: 26px; font-weight: 700; color: var(--navy); line-height: 1; }
.stat-lbl { font-size: 12px; color: var(--gray500); margin-top: 3px; font-weight: 500; }

/* ── FILTER BAR ── */
.filter-bar {
  background: var(--white);
  border: 1px solid var(--gray200);
  border-radius: var(--radius-lg);
  padding: 16px 20px;
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  align-items: center;
  margin-bottom: 18px;
  box-shadow: var(--shadow);
  animation: fadeUp 0.4s 0.22s ease both;
}
.filter-bar .search-wrap {
  flex: 1; min-width: 200px;
  position: relative;
}
.filter-bar .search-wrap .ico {
  position: absolute; left: 10px; top: 50%; transform: translateY(-50%);
  color: var(--gray500); font-size: 14px; pointer-events: none;
}
.filter-bar input[type=text], .filter-bar input[type=date], .filter-bar select {
  font-family: var(--font);
  font-size: 13px;
  border: 1.5px solid var(--gray200);
  border-radius: var(--radius-sm);
  padding: 8px 12px;
  background: var(--gray50);
  color: var(--gray900);
  outline: none;
  transition: border-color 0.15s, box-shadow 0.15s;
  height: 38px;
}
.filter-bar .search-wrap input { width: 100%; padding-left: 32px; }
.filter-bar input:focus, .filter-bar select:focus {
  border-color: var(--blue);
  box-shadow: 0 0 0 3px rgba(59,130,246,0.12);
  background: var(--white);
}

/* ── TABLE CARD ── */
.table-card {
  background: var(--white);
  border: 1px solid var(--gray200);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow);
  overflow: hidden;
  animation: fadeUp 0.4s 0.28s ease both;
}
.table-card-header {
  padding: 16px 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid var(--gray100);
}
.table-card-header h2 {
  font-size: 15px;
  font-weight: 700;
  color: var(--navy);
}
.table-card-header span {
  font-size: 12px;
  color: var(--gray500);
  font-family: var(--mono);
}

.tbl-wrap { overflow-x: auto; }
table {
  width: 100%;
  border-collapse: collapse;
  font-size: 13px;
}
thead th {
  background: var(--gray50);
  color: var(--gray500);
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.7px;
  padding: 10px 14px;
  border-bottom: 1px solid var(--gray200);
  text-align: left;
  white-space: nowrap;
  cursor: pointer;
  user-select: none;
  transition: background 0.12s;
}
thead th:hover { background: var(--gray100); color: var(--navy2); }
thead th.sorted { color: var(--blue); }
tbody tr {
  border-bottom: 1px solid var(--gray100);
  transition: background 0.12s;
}
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: #f0f7ff; cursor: pointer; }
tbody td {
  padding: 11px 14px;
  color: var(--gray700);
  vertical-align: middle;
  white-space: nowrap;
}
.td-name { font-weight: 600; color: var(--navy); }
.td-id { font-family: var(--mono); font-size: 12px; color: var(--gray500); }
.td-date { font-family: var(--mono); font-size: 12px; }

/* Badges */
.badge {
  display: inline-flex; align-items: center; gap: 4px;
  padding: 3px 9px;
  border-radius: 20px;
  font-size: 11px;
  font-weight: 600;
  white-space: nowrap;
}
.badge-green  { background: var(--green-light);  color: var(--green); }
.badge-amber  { background: var(--amber-light);  color: var(--amber); }
.badge-red    { background: var(--red-light);    color: var(--red); }
.badge-blue   { background: var(--blue-light);   color: #1d4ed8; }
.badge-gray   { background: var(--gray100);      color: var(--gray500); }
.badge-teal   { background: var(--teal-light);   color: var(--teal); }

/* GCS pill */
.gcs-pill {
  display: inline-flex; align-items: center; justify-content: center;
  width: 30px; height: 30px;
  border-radius: 50%;
  font-size: 12px;
  font-weight: 700;
  font-family: var(--mono);
}
.gcs-severe  { background: var(--red-light);   color: var(--red); }
.gcs-mod     { background: var(--amber-light); color: var(--amber); }
.gcs-mild    { background: var(--green-light); color: var(--green); }

/* Action btns */
.act-btns { display: flex; gap: 6px; align-items: center; }
.act-btn {
  width: 30px; height: 30px;
  border-radius: var(--radius-sm);
  border: 1.5px solid var(--gray200);
  background: var(--white);
  color: var(--gray500);
  display: flex; align-items: center; justify-content: center;
  cursor: pointer;
  font-size: 13px;
  transition: all 0.13s;
  text-decoration: none;
}
.act-btn:hover { background: var(--navy); color: var(--white); border-color: var(--navy); }
.act-btn.view:hover  { background: var(--blue);  color: var(--white); border-color: var(--blue); }
.act-btn.edit:hover  { background: var(--teal);  color: var(--white); border-color: var(--teal); }
.act-btn.del:hover   { background: var(--red);   color: var(--white); border-color: var(--red); }

/* ── PAGINATION ── */
.pagination {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 20px;
  border-top: 1px solid var(--gray100);
}
.pag-info { font-size: 12px; color: var(--gray500); }
.pag-btns { display: flex; gap: 4px; }
.pag-btn {
  width: 32px; height: 32px;
  border-radius: var(--radius-sm);
  border: 1.5px solid var(--gray200);
  background: var(--white);
  color: var(--gray700);
  display: flex; align-items: center; justify-content: center;
  cursor: pointer;
  font-size: 12px;
  font-family: var(--mono);
  font-weight: 500;
  transition: all 0.13s;
}
.pag-btn:hover { background: var(--blue); color: var(--white); border-color: var(--blue); }
.pag-btn.active { background: var(--navy); color: var(--white); border-color: var(--navy); }
.pag-btn:disabled { opacity: 0.4; cursor: not-allowed; }

/* ── EMPTY STATE ── */
.empty-state {
  text-align: center;
  padding: 60px 20px;
  color: var(--gray500);
}
.empty-state .icon { font-size: 40px; margin-bottom: 12px; }
.empty-state p { font-size: 14px; }

/* ── RESPONSIVE ── */
@media (max-width: 900px) {
  .stats-row { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
  .stats-row { grid-template-columns: 1fr 1fr; }
  .topbar { padding: 0 16px; }
  .page { padding: 16px 12px; }
}
</style>
</head>
<body>


<!-- PAGE -->

<div class="page">

<div style="display:flex; justify-content:flex-end; margin-bottom:10px;">
    <button class="btn btn-primary"
        style="background:#1a3a5c; border-color:#fff;"
        onclick="window.location.href='/all_entries'">
        New Admission +
    </button>
</div>
  @if(session('success'))

  <div style="background:#d4edda;color:#155724;border:1px solid #c3e6cb;padding:15px;border-radius:6px;margin-bottom:20px;font-weight:bold;">
      {{ session('success') }}
  </div>

  @endif
  <!-- TABLE -->
  <div class="table-card">
    <div class="table-card-header">
      <h2>Admission Records</h2>
      <span id="resultCount">Showing all records</span>
    </div>
    <div class="tbl-wrap">
     <table id="admTable">
        <thead>
            <tr>
                <th onclick="sortTable(0)">ID ↕</th>
                <th onclick="sortTable(1)">Date ↕</th>
                <th>Time</th>
                <th>Condition</th>
                <th>GCS</th>
                <th>BP</th>
                <th>SpO2</th>
                <th>Ventilation</th>
                <th>DVT Risk</th>
                <th>Admitted Via</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="tableBody">

            @foreach ($admissions as $admission)
            <tr>

                <td class="td-id">
                    {{ $admission->id }}
                </td>

                <td>
                    {{ $admission->admission_date }}
                </td>
                <td>
                    {{ $admission->initiated_at }}
                </td>
                <td>
                    {{ $admission->general_condition }}
                </td>
                <td>
                    {{ $admission->gcs_total }}
                </td>
                <td>
                    {{ $admission->bp_systolic }}/{{ $admission->bp_diastolic }}
                </td>
                <td>
                    {{ $admission->spo2_percent }}%
                </td>
                <td>
                    {{ $admission->ventilation_type }}
                </td>
                <td>
                    {{ $admission->dvt_risk_level }}
                </td>
                <td>
                    {{ $admission->admission_method_id }}
                </td>
                <td>
              <button class="btn btn-sm btn-primary" style="background:#1a3a5c;"
                  onclick="window.location.href='/admissions/{{ $admission->id }}'">
                  View
              </button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
      <div class="empty-state" id="emptyState" style="display:none;">
        <div class="icon">📋</div>
        <p>No admission records match your filters.</p>
      </div>
    </div>
    <div class="pagination">
      <div class="pag-info" id="pagInfo">Showing 1–10 of 0</div>
      <div class="pag-btns" id="pagBtns"></div>
    </div>
  </div>

</div>


</body>
</html>