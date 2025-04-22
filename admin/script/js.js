const courseForm = document.getElementById("courseForm");
    const courseTable = document.getElementById("courseTable");

    courseForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const title = document.getElementById("courseTitle").value;
      const desc = document.getElementById("courseDesc").value;
      const duration = document.getElementById("courseDuration").value;

      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${courseTable.rows.length + 1}</td>
        <td>${title}</td>
        <td>${desc}</td>
        <td>${duration}</td>
        <td>
          <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
          <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
        </td>
      `;

      courseTable.appendChild(row);
      courseForm.reset();
      const modal = bootstrap.Modal.getInstance(document.getElementById("addCourseModal"));
      modal.hide();
    });