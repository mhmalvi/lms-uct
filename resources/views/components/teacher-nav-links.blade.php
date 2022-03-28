<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" href="{{ route('dashboard') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dashboard</span>
        <span class="sidebar-menu-text">Dashboard</span>
    </a>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button"
        href="{{ route('classrooms.index') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">class</span>
        <span class="sidebar-menu-text">My Classrooms</span>
    </a>
</li>
{{-- <li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#course_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">library_books</span>
        Course
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="course_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Manage Course</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="">
                <span class="sidebar-menu-text">Posts</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#student_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">school</span>
        Student
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="student_menu">

        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="index.html">

                <span class="sidebar-menu-text">Home</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="courses.html">

                <span class="sidebar-menu-text">Browse Courses</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="paths.html">

                <span class="sidebar-menu-text">Browse Paths</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-dashboard.html">

                <span class="sidebar-menu-text">Student Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-my-courses.html">

                <span class="sidebar-menu-text">My Courses</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-paths.html">

                <span class="sidebar-menu-text">My Paths</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-path.html">

                <span class="sidebar-menu-text">Path Details</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-course.html">

                <span class="sidebar-menu-text">Course Preview</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-lesson.html">

                <span class="sidebar-menu-text">Lesson Preview</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-take-course.html">

                <span class="sidebar-menu-text">Take Course</span>
                <span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto">PRO</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-take-lesson.html">

                <span class="sidebar-menu-text">Take Lesson</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-take-quiz.html">

                <span class="sidebar-menu-text">Take Quiz</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-quiz-results.html">

                <span class="sidebar-menu-text">My Quizzes</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-quiz-result-details.html">

                <span class="sidebar-menu-text">Quiz Result</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-path-assessment.html">

                <span class="sidebar-menu-text">Skill Assessment</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="student-path-assessment-result.html">

                <span class="sidebar-menu-text">Skill Result</span>
            </a>
        </li>

    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#instructor_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        Instructor
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="instructor_menu">

        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="instructor-dashboard.html">

                <span class="sidebar-menu-text">Instructor Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="instructor-courses.html">

                <span class="sidebar-menu-text">Manage Courses</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="instructor-quizzes.html">

                <span class="sidebar-menu-text">Manage Quizzes</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="instructor-earnings.html">

                <span class="sidebar-menu-text">Earnings</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="instructor-statement.html">

                <span class="sidebar-menu-text">Statement</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="instructor-edit-course.html">

                <span class="sidebar-menu-text">Edit Course</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="instructor-edit-quiz.html">

                <span class="sidebar-menu-text">Edit Quiz</span>
            </a>
        </li>

    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#enterprise_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
        Enterprise
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse show sm-indent" id="enterprise_menu">
        <li class="sidebar-menu-item active">
            <a class="sidebar-menu-button" href="erp-dashboard.html">
                <span class="sidebar-menu-text">ERP Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="crm-dashboard.html">
                <span class="sidebar-menu-text">CRM Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="hr-dashboard.html">
                <span class="sidebar-menu-text">HR Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="employees.html">
                <span class="sidebar-menu-text">Employees</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="staff.html">
                <span class="sidebar-menu-text">Staff</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="leaves.html">
                <span class="sidebar-menu-text">Leaves</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="departments.html">
                <span class="sidebar-menu-text">Departments</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="documents.html">
                <span class="sidebar-menu-text">Documents</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="attendance.html">
                <span class="sidebar-menu-text">Attendance</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="recruitment.html">
                <span class="sidebar-menu-text">Recruitment</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="payroll.html">
                <span class="sidebar-menu-text">Payroll</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="training.html">
                <span class="sidebar-menu-text">Training</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="employee-profile.html">
                <span class="sidebar-menu-text">Employee Profile</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="accounting.html">
                <span class="sidebar-menu-text">Accounting</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="inventory.html">
                <span class="sidebar-menu-text">Inventory</span>
            </a>
        </li>
    </ul>
</li>
<li class="sidebar-menu-item">
    <a class="sidebar-menu-button" data-toggle="collapse" href="#productivity_menu">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">access_time</span>
        Productivity
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse sm-indent" id="productivity_menu">
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="projects.html">
                <span class="sidebar-menu-text">Projects</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="tasks-board.html">
                <span class="sidebar-menu-text">Tasks Board</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="tasks-list.html">
                <span class="sidebar-menu-text">Tasks List</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="kanban.html">
                <span class="sidebar-menu-text">Kanban</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="task-details.html">
                <span class="sidebar-menu-text">Task Details</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a class="sidebar-menu-button disabled" href="team-members.html">
                <span class="sidebar-menu-text">Team Members</span>
            </a>
        </li>
    </ul>
</li> --}}

