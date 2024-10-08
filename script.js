// Handle form submissions and display join raid results
document.getElementById('joinForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const source = document.getElementById('sourceJoin').value;
  const destination = document.getElementById('destinationJoin').value;

  fetch(`join_raid.php?source=${source}&destination=${destination}`)
      .then(response => response.json())
      .then(data => {
          const resultsDiv = document.getElementById('raidResults');
          resultsDiv.innerHTML = '';
          if (data.length > 0) {
              data.forEach(raid => {
                  const raidInfo = document.createElement('div');
                  raidInfo.className = 'raid-info';
                  raidInfo.innerHTML = `
                      <p><strong>Seats Left:</strong> ${raid.seats}</p>
                      <p><strong>Email:</strong> ${raid.email}</p>
                      <p><strong>Phone:</strong> ${raid.phone}</p>
                  `;
                  resultsDiv.appendChild(raidInfo);
              });
          } else {
              resultsDiv.innerHTML = '<p>No rides found for this route.</p>';
          }
      });
});
const logoText = document.querySelector('.logo-text');

logoText.addEventListener('mouseover', () => {
  logoText.style.color = '#f28705';
});

logoText.addEventListener('mouseleave', () => {
  logoText.style.color = '#orange';
});
