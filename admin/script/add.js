// document.addEventListener('DOMContentLoaded', function() {
//   // Handle adding new course
//   document.getElementById('courseForm').addEventListener('submit', function(e) {
//       e.preventDefault();

//       // Get the values from the form inputs
//       const courseName = document.getElementById('courseName').value;
//       const courseDuration = document.getElementById('courseDuration').value;

//       // Find the table body
//       const tableBody = document.getElementById('courseTable');

//       // Create a new row for the table
//       const newRow = document.createElement('tr');

//       // Get the last row number and increment it for the new row
//       const rowCount = tableBody.rows.length + 1;

//       // Create the columns for the new row
//       newRow.innerHTML = `
//           <td>${rowCount}</td>
//           <td>${courseName}</td>
          
//           <td>${courseDuration}</td>
//           <td>
//               <button class="btn btn-sm btn-primary">Edit</button>
//               <button class="btn btn-sm btn-danger">Delete</button>
//           </td>
//       `;

//       // Append the new row to the table
//       tableBody.appendChild(newRow);

//       // Clear the form inputs
//       document.getElementById('courseName').value = '';
//       document.getElementById('courseDuration').value = '';
//   });
// });

// //add new course

// document.getElementById("addCourseCategoryForm").addEventListener("submit", function (e) {
// e.preventDefault();

// const title = document.getElementById("courseTitle").value.trim();
// const category = document.getElementById("categoryName").value.trim();
// const duration = document.getElementById("courseDuration").value.trim();

// if (title && category && duration) {
//   const table = document.getElementById("courseCategoryTable");
//   const rowCount = table.rows.length + 1;

//   const row = document.createElement("tr");
//   row.innerHTML = `
//     <td>${rowCount}</td>
//     <td>${title}</td>
//     <td>${category}</td>
//     <td>${duration}</td>
//     <td>
//       <button class="btn btn-sm btn-warning">Edit</button>
//       <button class="btn btn-sm btn-danger">Delete</button>
//     </td>
//   `;

//   table.appendChild(row);

//   // Reset form and close modal
//   this.reset();
//   const modal = bootstrap.Modal.getInstance(document.getElementById("addCourseCategoryModal"));
//   modal.hide();
// }
// });
// //
// document.getElementById("addCourseCategoryForm").addEventListener("submit", function (e) {
// e.preventDefault();

// const title = document.getElementById("courseTitle").value.trim();
// const category = document.getElementById("categoryName").value.trim();
// const duration = document.getElementById("courseDuration").value.trim();

// if (title && category && duration) {
//   const table = document.getElementById("courseCategoryTable");
//   const rowCount = table.rows.length + 1;

//   const row = document.createElement("tr");
//   row.innerHTML = `
//     <td>${rowCount}</td>
//     <td>${title}</td>
//     <td>${category}</td>
//     <td>${duration}</td>
//     <td>
//       <button class="btn btn-sm btn-warning">Edit</button>
//       <button class="btn btn-sm btn-danger">Delete</button>
//     </td>
//   `;

//   table.appendChild(row);

//   // Reset form and close modal
//   this.reset();
//   const modal = bootstrap.Modal.getInstance(document.getElementById("addCourseCategoryModal"));
//   modal.hide();
// }
// });




//   document.addEventListener('DOMContentLoaded', function () {
//     let serialNumber = 1;

//     // Handle form submission for adding course with category
//     const courseCategoryForm = document.getElementById("addCourseCategoryForm");

//     courseCategoryForm.addEventListener("submit", function (e) {
//       e.preventDefault();

//       const title = document.getElementById("courseTitle").value.trim();
//       const category = document.getElementById("categoryName").value.trim();
//       const duration = document.getElementById("courseDuration").value.trim();

//       if (title && category && duration) {
//         const table = document.getElementById("courseCategoryTable");

//         const row = document.createElement("tr");
//         row.innerHTML = `
//           <td>${serialNumber++}</td>
//           <td>${title}</td>
//           <td>${category}</td>
//           <td>${duration}</td>
//           <td>
//             <button class="btn btn-sm btn-warning">Edit</button>
//             <button class="btn btn-sm btn-danger" onclick="deleteRow(this)">Delete</button>
//           </td>
//         `;

//         table.appendChild(row);

//         // Reset form and close modal
//         courseCategoryForm.reset();
//         const modal = bootstrap.Modal.getInstance(document.getElementById("addCourseCategoryModal"));
//         modal.hide();
//       }
//     });
//   });

//   // Delete row function
//   function deleteRow(button) {
//     const row = button.closest("tr");
//     row.remove();
//   }

