// const checkboxes = document.querySelectorAll('.checkbox');
//     const selectedList = document.getElementById('selected-list');

//     checkboxes.forEach(checkbox => {
//       checkbox.addEventListener('change', () => {
//         const selectedOptions = Array.from(checkboxes)
//           .filter(checkbox => checkbox.checked)
//           .map(checkbox => checkbox.value);

//         updateSelectedList(selectedOptions);
//       });
//     });

//     function updateSelectedList(selectedOptions) {
//       selectedList.innerHTML = '';

//       if (selectedOptions.length === 0) {
//         selectedList.innerHTML = '<p>No options selected.</p>';
//       } else {
//         selectedOptions.forEach(option => {
//           const listItem = document.createElement('input');
//           listItem.textContent = option;
//           selectedList.appendChild(listItem);
//         });
//       }
//     }