$.ajax({
  url: "http://127.0.0.1:8000/api/students",
  success: function (data) {
    console.log(data);
      data[1].forEach(student => {
          $(".students-table-body").append(`
              <tr>
                  <td>${student.roll}</td>
                  <td>${student.name}</td>
                  <td>${student.major.major_name}</td>
                  <td>${student.phone}</td>
                  <td>${student.email}</td>
                  <td>${student.address}</td>
                  <td>
                    <a href="studentEdit/${student.id}" class="btn btn-primary edit-delete-btn">Edit</a>
                    <button class="btn btn-primary edit-delete-btn" onclick="return confirm('Are you sure?')? deleteStudent(${student.id}): '';">Delete</button>
                  </td>
                 
              </tr>
          `);
      });
  },
  dataType: "json",
  type: "GET"
});

$("#create-btn").on("click", function () {
  console.log("Click create btn");
  $.ajax({
    url: "http://127.0.0.1:8000/api/student",
    method: "POST",
    data: {
      roll: $("#roll").val(),
      name: $("#name").val(),
      major_id: $("#major_id").val(),
      phone: $("#phone").val(),
      email: $("#email").val(),
      address: $("#address").val(),
    },
    success: $(location).attr('href', 'http://127.0.0.1:8000/ajax/students'),
    dataType: "json"
  });
});

$("#update-btn").on("click", function () {
  console.log("Click update btn");
  $.ajax({
    url: "http://127.0.0.1:8000/api/student/edit/"+ $("#id").val(),
    method: "PUT",
    data: {
      roll: $("#roll").val(),
      name: $("#name").val(),
      major_id: $("#major_id").val(),
      phone: $("#phone").val(),
      email: $("#email").val(),
      address: $("#address").val(),
    },
    success: $(location).attr('href', 'http://127.0.0.1:8000/ajax/students'),
    dataType: "json"
  });
});

function deleteStudent(id) {
  $.ajax({
      type: "DELETE",
      url: "http://127.0.0.1:8000/api/student/delete/" + id,
      success: location.reload(),
  });
}