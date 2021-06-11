export default function() {
  let rows, switching, i, x, y, shouldSwitch;
  rows = document.getElementById("sortable").getElementsByTagName('tr');
  switching = true;
  while (switching) {
    switching = false;
    for (i = 0; i < (rows.length-1); i++) {
			shouldSwitch = false;
			x = rows[i].dataset.sort.toLowerCase();
			y = rows[i + 1].dataset.sort.toLowerCase();
      if (x.localeCompare(y) > 0) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}