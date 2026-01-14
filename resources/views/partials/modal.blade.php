<div class="modal fade" id="studentModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="studentForm">
            <input type="hidden" id="student_id">

          <div class="mb-2">
    <label>Name</label>
    <input type="text" id="name" class="form-control">
          <div class="text-danger small" id="error-name"></div>
      </div>

      <div class="mb-2">
          <label>Email</label>
          <input type="email" id="email" class="form-control">
          <div class="text-danger small" id="error-email"></div>
      </div>

      <div class="mb-2">
          <label>Phone</label>
          <input type="text" id="phone" class="form-control">
          <div class="text-danger small" id="error-phone"></div>
      </div>

      <div class="mb-2">
          <label>Course</label>
          <input type="text" id="course" class="form-control">
          <div class="text-danger small" id="error-course"></div>
      </div>

        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" id="saveStudentBtn">Save</button>
      </div>

    </div>
  </div>
</div>
