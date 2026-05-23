/* ════════════════════════════════════════
   STEP Married
════════════════════════════════════════ */
    // const marital = document.getElementById('marital');
    //             const spouseField = document.getElementById('spouseField');
    //             const spouseName = document.getElementById('spouseName');

    //             marital.addEventListener('change', function () {

    //               if (this.value === 'Married') {
    //                 spouseField.style.display = 'block';
    //                 spouseName.required = true;
    //               } else {
    //                 spouseField.style.display = 'none';
    //                 spouseName.required = false;
    //                 spouseName.value = '';
    //               }

    //             });
/* ════════════════════════════════════════
   STEP NAVIGATION
════════════════════════════════════════ */
// let currentStep = 1;
// const TOTAL = 4;

// function goStep(n) {
//   if (n > currentStep && !validateStep(currentStep)) return;
//   document.getElementById('step' + currentStep).classList.remove('active-step');
//   currentStep = n;
//   document.getElementById('step' + currentStep).classList.add('active-step');
//   if (n === 4) buildSummary();
//   window.scrollTo({ top: 0, behavior: 'smooth' });
// }

// function validateStep(n) {
//   if (n === 1) {
//     const fn = document.getElementById('fname').value.trim();
//     const ln = document.getElementById('lname').value.trim();
//     const dob = document.getElementById('dob').value;
//     if (!fn || !ln || !dob) { showToast('Please fill in First Name, Last Name, and Date of Birth.'); return false; }
//   }
//   if (n === 3) {
//     const ph = document.getElementById('phone').value.trim();
//     if (!ph) { showToast('Please enter a Phone Number.'); return false; }
//   }
//   return true;
// }

// function val(id) { const el = document.getElementById(id); return el ? el.value.trim() : ''; }
// function radioVal(name) { const el = document.querySelector(`input[name="${name}"]:checked`); return el ? el.value : '—'; }

// function buildSummary() {
//   const rows = [
//     ['👤 Full Name', `${val('fname')} ${val('lname')}`],
//     ['🎂 Date of Birth', val('dob') || '—'],
//     ['⚥ Gender', radioVal('gender')],
//     ['🌍 Nationality', val('nationality') || '—'],
//     ['💍 Marital Status', val('marital') || '—'],
//     ['📏 Height', val('height') ? val('height') + ' cm' : '—'],
//     ['⚖️ Weight', val('weight') ? val('weight') + ' kg' : '—'],
//     ['🩸 Blood Group', radioVal('blood')],
//     ['⚕️ Allergies', val('allergies') || '—'],
//     ['🏥 Conditions', val('conditions') || '—'],
//     ['📋 Reason for Visit', val('reason') || '—'],
//     ['👨‍⚕️ Preferred Doctor', val('doctor') || '—'],
//     ['📞 Phone', val('phone') || '—'],
//     ['📧 Email', val('email') || '—'],
//     ['🏠 Address', [val('street'), val('city'), val('dist3'), val('postal')].filter(Boolean).join(', ') || '—'],
//     ['🆘 Emergency Contact', val('ec_name') ? `${val('ec_name')} (${val('ec_rel')}) — ${val('ec_phone')}` : '—'],
//   ];
//   let html = '<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px 24px;">';
//   rows.forEach(([label, value]) => {
//     html += `<div>
//       <div style="font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;color:var(--text-light);">${label}</div>
//       <div style="font-size:.93rem;color:var(--text-dark);font-weight:500;margin-top:2px;">${value || '—'}</div>
//     </div>`;
//   });
//   html += '</div>';
//   document.getElementById('summary-box').innerHTML = html;
// }

// function submitForm() {
//   if (!document.getElementById('consent').checked) { showToast('Please confirm the consent checkbox.'); return; }
//   for (let i = 1; i <= TOTAL; i++) { const s = document.getElementById('step' + i); if (s) s.classList.remove('active-step'); }
//   const id = 'MCP-' + Date.now().toString(36).toUpperCase().slice(-6);
//   document.getElementById('patientIdBadge').textContent = 'Patient ID: ' + id;
//   document.getElementById('successScreen').classList.add('show');
//   window.scrollTo({ top: 0, behavior: 'smooth' });
// }

// function resetForm() {
//   document.getElementById('successScreen').classList.remove('show');
//   document.querySelectorAll('input:not([type="radio"]):not([type="checkbox"]),select,textarea').forEach(el => el.value = '');
//   document.querySelectorAll('input[type="radio"],input[type="checkbox"]').forEach(el => el.checked = false);
//   removePhoto();
//   clearSignature();
//   currentStep = 1;
//   document.getElementById('step1').classList.add('active-step');
//   window.scrollTo({ top: 0, behavior: 'smooth' });
// }

// function showToast(msg) {
//   let t = document.getElementById('toast-box');
//   if (!t) {
//     t = document.createElement('div');
//     t.id = 'toast-box';
//     t.style.cssText = `position:fixed;bottom:24px;right:24px;background:#1a5fa8;color:#fff;padding:14px 22px;border-radius:14px;font-weight:600;font-size:.9rem;box-shadow:0 8px 30px rgba(14,42,69,.25);z-index:9999;transition:opacity .4s;max-width:300px;`;
//     document.body.appendChild(t);
//   }
//   t.textContent = msg; t.style.opacity = '1';
//   clearTimeout(t._hide);
//   t._hide = setTimeout(() => t.style.opacity = '0', 3000);
// }

/* ════════════════════════════════════════
   PHOTO UPLOAD
════════════════════════════════════════ */
function handlePhotoUpload(e) {
  const file = e.target.files[0];
  if (!file) return;
  if (file.size > 5 * 1024 * 1024) { showToast('Photo must be under 5 MB.'); return; }
  const url = URL.createObjectURL(file);
  const img = document.getElementById('photoPreviewImg');
  img.src = url;
  img.style.display = 'block';
  document.getElementById('photoPlaceholderIcon').style.display = 'none';
  document.getElementById('photoRing').style.borderColor = 'var(--accent)';
  const rmBtn = document.getElementById('removePhotoBtn');
  rmBtn.classList.add('visible');
  const fn = document.getElementById('photoFileName');
  fn.textContent = '📎 ' + (file.name.length > 30 ? file.name.slice(0,28)+'…' : file.name);
  fn.classList.add('visible');
}

function removePhoto() {
  const img = document.getElementById('photoPreviewImg');
  img.src = ''; img.style.display = 'none';
  document.getElementById('photoPlaceholderIcon').style.display = '';
  document.getElementById('photoRing').style.borderColor = 'var(--border)';
  document.getElementById('removePhotoBtn').classList.remove('visible');
  const fn = document.getElementById('photoFileName');
  fn.textContent = ''; fn.classList.remove('visible');
  document.getElementById('photoInput').value = '';
}

/* ════════════════════════════════════════
   DIGITAL SIGNATURE PAD
════════════════════════════════════════ */






// (function initSignature() {
//   const canvas = document.getElementById('sigCanvas');
//   const ctx    = canvas.getContext('2d');
//   let drawing  = false;
//   let hasStrokes = false;
//   let strokes  = [];       // array of paths for undo
//   let currentPath = [];
//   window.penColor = '#0e2a45';
//   let penSize  = 2;

//   function resize() {
//     const w = canvas.offsetWidth;
//     const h = 160;
//     const dpr = window.devicePixelRatio || 1;
//     canvas.width  = w * dpr;
//     canvas.height = h * dpr;
//     canvas.style.height = h + 'px';
//     ctx.scale(dpr, dpr);
//     redraw();
//   }

//   function redraw() {
//     ctx.clearRect(0, 0, canvas.width, canvas.height);
//     strokes.forEach(stroke => {
//       if (!stroke.points.length) return;
//       ctx.beginPath();
//       ctx.strokeStyle = stroke.color;
//       ctx.lineWidth   = stroke.size;
//       ctx.lineCap     = 'round';
//       ctx.lineJoin    = 'round';
//       ctx.moveTo(stroke.points[0].x, stroke.points[0].y);
//       stroke.points.forEach(p => ctx.lineTo(p.x, p.y));
//       ctx.stroke();
//     });
//   }

//   function getPos(e) {
//     const rect = canvas.getBoundingClientRect();
//     const src  = e.touches ? e.touches[0] : e;
//     return { x: src.clientX - rect.left, y: src.clientY - rect.top };
//   }

//   function startDraw(e) {
//     e.preventDefault();
//     drawing = true;
//     const pos = getPos(e);
//     currentPath = [pos];
//     strokes.push({ points: currentPath, color: window.penColor, size: penSize });
//     document.getElementById('sigPlaceholder').style.display = 'none';
//   }

//   function draw(e) {
//     if (!drawing) return;
//     e.preventDefault();
//     const pos = getPos(e);
//     currentPath.push(pos);
//     redraw();
//     hasStrokes = true;
//     document.getElementById('sigStatus').classList.add('visible');
//   }

//   function endDraw(e) {
//     if (!drawing) return;
//     e.preventDefault();
//     drawing = false;
//   }

//   canvas.addEventListener('mousedown',  startDraw);
//   canvas.addEventListener('mousemove',  draw);
//   canvas.addEventListener('mouseup',    endDraw);
//   canvas.addEventListener('mouseleave', endDraw);
//   canvas.addEventListener('touchstart', startDraw, { passive: false });
//   canvas.addEventListener('touchmove',  draw,      { passive: false });
//   canvas.addEventListener('touchend',   endDraw,   { passive: false });

//   window.clearSignature = function() {
//     strokes = [];
//     currentPath = [];
//     hasStrokes = false;
//     ctx.clearRect(0, 0, canvas.width, canvas.height);
//     document.getElementById('sigPlaceholder').style.display = '';
//     document.getElementById('sigStatus').classList.remove('visible');
//   };

//   window.undoStroke = function() {
//     strokes.pop();
//     if (!strokes.length) {
//       document.getElementById('sigPlaceholder').style.display = '';
//       document.getElementById('sigStatus').classList.remove('visible');
//     }
//     redraw();
//   };

//   window.downloadSignature = function() {
//     if (!strokes.length) { showToast('Please draw your signature first.'); return; }
//     const link = document.createElement('a');
//     link.download = 'patient-signature.png';
//     link.href = canvas.toDataURL('image/png');
//     link.click();
//   };

//   window.setPenSize = function(btn, size) {
//     document.querySelectorAll('.pen-size-btn').forEach(b => b.classList.remove('active'));
//     btn.classList.add('active');
//     penSize = size;
//   };

//   window.addEventListener('resize', resize);
//   // init after layout
//   setTimeout(resize, 100);
// })();

