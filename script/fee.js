console.log('fee.js loaded');

const semesterSelect = document.getElementById('Semester-select');
const NextBtn = document.getElementById('NextBtn');
const feeStructureDiv = document.getElementById('fee-structure');
const paymentMethod = document.getElementById('payment-select');
let paymentMethodValue = paymentMethod.value;
let selectedValue = semesterSelect.value;

paymentMethod.addEventListener('change', (e) => {
  paymentMethodValue = e.target.value;
});

semesterSelect.addEventListener('change', (e) => {
  selectedValue = e.target.value;
});

semesterSelect.addEventListener('change', updateData);

function updateData() {
  const feeTable = document.getElementById('feeTable');

  console.log(selectedValue);

  switch (selectedValue) {
    case 'BCA(4th)':
      feeTable.innerHTML = `
            <tbody>
            <tr>
                <td>faculty</td>
                <td>BCA</td>
            </tr>
            <tr>
                <td>semester</td>
                <td>four</td>
            </tr>
            <tr>
                <th>Criteria</th>
                <th>Amount(Rs.)</th>
            </tr>
            <tr>
                <td>Facilities and Resources</td>
                <td>25000</td>
            </tr>
            <tr>
                <td>Administratives and Student Services</td>
                <td>15000</td>
            </tr>
            <tr>
                <td>Miscellaneous Expenses</td>
                <td>10000</td>
            </tr>

            <tr>
                <td colspan="2">
                    <button class="button">Pay with Esewa</button>
                </td>
            </tr>
        </tbody>
            `;
      break;

    case 'CSIT(4th)':
      feeTable.innerHTML = `
                <tbody>
                <tr>
                    <td>faculty</td>
                    <td>CSIT</td>
                </tr>
                <tr>
                    <td>semester</td>
                    <td>four</td>
                </tr>
                <tr>
                    <th>Criteria</th>
                    <th>Amount(Rs.)</th>
                </tr>
                <tr>
                    <td>Facilities and Resources</td>
                    <td>50000</td>
                </tr>
                <tr>
                    <td>Administratives and Student Services</td>
                    <td>30000</td>
                </tr>
                <tr>
                    <td>Miscellaneous Expenses</td>
                    <td>20000</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button class="button">Pay with Esewa</button>
                    </td>
                </tr>
            </tbody>
                `;
      break;
  }
}

NextBtn.addEventListener('click', (e) => {
  e.preventDefault();

  // Check if payment method is selected
  if (
    !paymentMethodValue ||
    paymentMethodValue === 'Select your payment method'
  ) {
    alert('Please select a payment method.');
    return; // Exit the function early if payment method is not selected
  }

  feeStructureDiv.classList.add('show');
  updateData();
});

updateData();

window.addEventListener('DOMContentLoaded', () => {
  const setTheme = JSON.parse(localStorage.getItem('SetTheme'));

  if (setTheme === 'DARK') {
    const feeTable = document.querySelector('.prior-notice');
    const navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.add('navDark')

    feeTable.classList.add('notice-dark-mode');
  }
});
