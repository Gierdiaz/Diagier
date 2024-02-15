<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Developer</title>
    <style>
        .button-new {
          background-color: #4c53af; /* Green background color */
          border: none;
          color: white;
          padding: 10px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
          border-radius: 5px;
        }
    </style>
</head>
<body>

    <h2>Create Developer</h2>

    <form method="POST" action="{{ route('developers.store') }}">
        @csrf

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>

        <label for="github">GitHub:</label><br>
        <input type="text" id="github" name="github"><br>

        <label for="bio">Bio:</label><br>
        <textarea id="bio" name="bio"></textarea><br>

        <label for="technologies">Technologies:</label><br>
        <input type="text" id="technologies" name="technologies"><br>

        <label for="college">College:</label><br>
        <input type="text" id="college" name="college"><br>

        <label for="course">Course:</label><br>
        <input type="text" id="course" name="course"><br>

        <label for="certifications">Certifications:</label><br>
        <input type="text" id="certifications" name="certifications"><br>

        <label for="company">Company:</label><br>
        <input type="text" id="company" name="company"><br>

        <label for="level">Level:</label><br>
        <select id="level" name="level">
            <option value="intern">Intern</option>
            <option value="junior">Junior</option>
            <option value="intermediate">Intermediate</option>
            <option value="senior">Senior</option>
            <option value="lead">Lead</option>
            <option value="manager">Manager</option>
            <option value="director">Director</option>
            <option value="vp">VP</option>
            <option value="executive">Executive</option>
            <option value="admin">Admin</option>
            <option value="specialist">Specialist</option>
            <option value="consultant">Consultant</option>
        </select><br>

        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"><br>

        <label for="state">State:</label><br>
        <input type="text" id="state" name="state"><br>

        <label for="country">Country:</label><br>
        <input type="text" id="country" name="country"><br>

        <label for="work_mode">Work Mode:</label><br>
        <select id="work_mode" name="work_mode">
            <option value="home_office">Home Office</option>
            <option value="presential">Presential</option>
            <option value="hybrid">Hybrid</option>
        </select><br>

        <button class="button-new" type="submit">Register Developer</button>
    </form>

</body>
</html>
