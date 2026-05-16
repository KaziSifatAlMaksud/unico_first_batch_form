 // GCS auto-calculate
  function calcGCS() {
    const e = parseInt(document.getElementById('gcsE').value);
    const v = parseInt(document.getElementById('gcsV').value);
    const m = parseInt(document.getElementById('gcsM').value);
    const total = e + v + m;
    document.getElementById('gcsTotal').textContent = total;
  }

  // Lines toggle
  function toggleLines() {
    const val = document.getElementById('linesPresent').value;
    const grp = document.getElementById('linesGroup');
    grp.style.opacity = val === 'Yes' ? '1' : '0.4';
    grp.style.pointerEvents = val === 'Yes' ? 'auto' : 'none';
    if (val === 'No') {
      grp.querySelectorAll('input[type=checkbox]').forEach(cb => cb.checked = false);
    }
  }

  // Ventilator toggle
  function toggleVentilator() {
    const val = document.getElementById('ventilation').value;
    document.getElementById('ventFields').style.display = val === 'No' ? 'none' : 'block';
  }

  // DVT Wells score
  function calcDVT() {
    const scores = [1,1,1,1,1,1,1,1,-2];
    let total = 0;
    const checks = document.querySelectorAll('#dvtBody input[type=checkbox]');
    checks.forEach((cb, i) => { if (cb.checked) total += scores[i]; });
    document.getElementById('dvtScore').textContent = total;
    const risk = document.getElementById('dvtRisk');
    if (total >= 3) { risk.textContent = '🔴 High probability'; risk.style.color = '#b91c1c'; }
    else if (total >= 1) { risk.textContent = '🟡 Moderate probability'; risk.style.color = '#92400e'; }
    else { risk.textContent = '🟢 Low probability'; risk.style.color = '#15803d'; }
  }

  // Reset
  function resetForm() {
    if (!confirm('Reset all fields to defaults?')) return;
    document.querySelectorAll('input[type=text], input[type=number]').forEach(i => {
      if (!['admDate','admTime'].includes(i.id)) i.value = '';
    });
    document.querySelectorAll('input[type=checkbox]').forEach(cb => cb.checked = false);
    document.querySelectorAll('select').forEach(s => s.selectedIndex = 0);
    document.getElementById('gcsTotal').textContent = '3';
    document.getElementById('dvtScore').textContent = '0';
    document.getElementById('dvtRisk').textContent = '';
    document.getElementById('linesGroup').style.opacity = '0.4';
    document.getElementById('linesGroup').style.pointerEvents = 'none';
    document.getElementById('ventFields').style.display = 'none';
  }

  // Submit
  function submitForm() {
    const required = ['admDate','admTime','genCondition'];
    let valid = true;
    required.forEach(id => {
      const el = document.getElementById(id);
      if (!el.value.trim()) { el.style.borderColor = '#b91c1c'; valid = false; }
      else el.style.borderColor = '';
    });
    if (!valid) { alert('Please fill in required fields (Date, Time, General Condition).'); return; }
    showToast();
  }

  function showToast() {
    const t = document.getElementById('toast');
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
  }

  // Init
  calcGCS();
  calcDVT();