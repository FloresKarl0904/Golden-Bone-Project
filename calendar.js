const dateInput = document.getElementById('dateInput');
const calendar = document.getElementById('calendar');

dateInput.addEventListener('click', () => {
  calendar.style.display = calendar.style.display === 'block' ? 'none' : 'block';
  drawCalendar(new Date());
});

function drawCalendar(date) {
  const month = date.getMonth();
  const year = date.getFullYear();
  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();

  let html = `<table>
    <tr>
      <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th>
      <th>Thu</th><th>Fri</th><th>Sat</th>
    </tr><tr>`;

  // Empty cells before first day
  for (let i = 0; i < firstDay; i++) {
    html += '<td></td>';
  }

  for (let day = 1; day <= daysInMonth; day++) {
    html += `<td>${day}</td>`;
    if ((firstDay + day) % 7 === 0) {
      html += '</tr><tr>';
    }
  }

  html += '</tr></table>';
  calendar.innerHTML = html;

  // Add click events to dates
  const cells = calendar.querySelectorAll('td');
  cells.forEach(cell => {
    if (cell.textContent !== '') {
      cell.addEventListener('click', () => {
        dateInput.value = `${year}-${String(month+1).padStart(2,'0')}-${String(cell.textContent).padStart(2,'0')}`;
        calendar.style.display = 'none';
      });
    }
  });
}

// Close calendar when clicking outside
document.addEventListener('click', (e) => {
  if (!calendar.contains(e.target) && e.target !== dateInput) {
    calendar.style.display = 'none';
  }
});
