<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Student Registration</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
  <div class="page">
    <main class="card" role="main">
      <h1>Student Registration</h1>
      <p class="lead">Complete the form below. Fields marked with * are required.</p>

      <form action="welcome.php" method="POST" novalidate>
        <div class="form-grid">
          <fieldset class="group-card field two-thirds" aria-labelledby="personal-legend">
            <legend id="personal-legend">Personal Information</legend>
            <div class="form-grid">
              <div class="field half">
                <label for="surname">Surname <span class="required">*</span></label>
                <input id="surname" name="surname" type="text" required aria-required="true" maxlength="255">
              </div>
              <div class="field half">
                <label for="Gname">Given Name <span class="required">*</span></label>
                <input id="Gname" name="Gname" type="text" required aria-required="true" maxlength="255">
              </div>
              <div class="field third">
                <label for="dob">Date of Birth</label>
                <input id="dob" name="dob" type="date">
              </div>
              <div class="field third">
                <label for="age">Age</label>
                <input id="age" name="age" type="number" min="1" max="150">
              </div>
              <div class="field two-thirds">
                <label for="school">School Last Attended</label>
                <input id="school" name="school" type="text" maxlength="255">
              </div>
              <div class="field two-thirds">
                <label for="email">E-mail <span class="required">*</span></label>
                <input id="email" name="email" type="email" required aria-required="true" maxlength="320">
                <div class="help">We'll only use this to contact you about registration.</div>
              </div>
              <div class="field third">
                <label for="religion">Religion</label>
                <input id="religion" name="religion" type="text">
              </div>

              <div class="field">
                <h3>Catholic Students Only</h3>
                <div class="form-grid">
                  <div class="field third">
                    <label for="baptized">Are you baptized?</label>
                    <select id="baptized" name="baptized">
                      <option value="">— select —</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                  <div class="field third">
                    <label for="communion">Received First Communion?</label>
                    <select id="communion" name="communion">
                      <option value="">— select —</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                  <div class="field third">
                    <label for="confirmation">Been confirmed?</label>
                    <select id="confirmation" name="confirmation">
                      <option value="">— select —</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>

          <fieldset class="group-card field one-third" aria-labelledby="res-legend">
            <legend id="res-legend">Residential Information</legend>
            <label for="section">Section</label>
            <input id="section" name="section" type="text">
            <label for="allotment">Allotment</label>
            <input id="allotment" name="allotment" type="text">
            <label for="block">Block</label>
            <input id="block" name="block" type="text">
            <label for="house_number">House Number</label>
            <input id="house_number" name="house_number" type="text">
            <label for="road">Road</label>
            <input id="road" name="road" type="text">
            <label for="unit">Unit/Apartment Number</label>
            <input id="unit" name="unit" type="text">
            <label for="suburban">Suburban</label>
            <input id="suburban" name="suburban" type="text">
          </fieldset>

          <fieldset class="field group-card" aria-labelledby="parents-legend">
            <legend id="parents-legend">Parental / Guardian Information</legend>
            <div class="form-grid">
              <div class="field half">
                <label for="father_name">Father's Name</label>
                <input id="father_name" name="father_name" type="text">
              </div>
              <div class="field half">
                <label for="father_occupation">Father's Occupation</label>
                <input id="father_occupation" name="father_occupation" type="text">
              </div>
              <div class="field half">
                <label for="employer_name">Employer/Business Name</label>
                <input id="employer_name" name="employer_name" type="text">
              </div>
              <div class="field half">
                <label for="place_of_origin">Place of Origin</label>
                <input id="place_of_origin" name="place_of_origin" type="text">
              </div>
              <div class="field half">
                <label for="contact_number">Contact Number</label>
                <input id="contact_number" name="contact_number" type="text">
              </div>
              <div class="field half">
                <label for="father_email">Father's Email</label>
                <input id="father_email" name="father_email" type="email">
              </div>

              <div class="field half">
                <label for="mother_name">Mother's Name</label>
                <input id="mother_name" name="mother_name" type="text">
              </div>
              <div class="field half">
                <label for="mother_occupation">Mother's Occupation</label>
                <input id="mother_occupation" name="mother_occupation" type="text">
              </div>
              <div class="field half">
                <label for="mother_employer_name">Employer/Business Name</label>
                <input id="mother_employer_name" name="mother_employer_name" type="text">
              </div>
              <div class="field half">
                <label for="mother_place_of_origin">Place of Origin</label>
                <input id="mother_place_of_origin" name="mother_place_of_origin" type="text">
              </div>
              <div class="field half">
                <label for="mother_contact_number">Contact Number</label>
                <input id="mother_contact_number" name="mother_contact_number" type="text">
              </div>
              <div class="field half">
                <label for="mother_email">Mother's Email</label>
                <input id="mother_email" name="mother_email" type="email">
              </div>

              <div class="field">
                <h4>Guardian (If applicable)</h4>
                <label for="guardian_name">Guardian's Name</label>
                <input id="guardian_name" name="guardian_name" type="text">
                <label for="guardian_occupation">Guardian's Occupation</label>
                <input id="guardian_occupation" name="guardian_occupation" type="text">
                <label for="guardian_relationship">Relationship</label>
                <input id="guardian_relationship" name="guardian_relationship" type="text">
                <label for="guardian_place_of_origin">Place of Origin</label>
                <input id="guardian_place_of_origin" name="guardian_place_of_origin" type="text">
                <label for="guardian_contact_number">Contact Number</label>
                <input id="guardian_contact_number" name="guardian_contact_number" type="text">
                <label for="guardian_email">Guardian's Email</label>
                <input id="guardian_email" name="guardian_email" type="email">
              </div>
            </div>
          </fieldset>

          <fieldset class="field group-card" aria-labelledby="emergency-legend">
            <legend id="emergency-legend">Emergency Contact</legend>
            <div class="form-grid">
              <div class="field third">
                <label for="emergency_contact_name">Name</label>
                <input id="emergency_contact_name" name="emergency_contact_name" type="text">
              </div>
              <div class="field third">
                <label for="emergency_relationship">Relationship</label>
                <input id="emergency_relationship" name="emergency_relationship" type="text">
              </div>
              <div class="field third">
                <label for="emergency_contact_number">Contact Number</label>
                <input id="emergency_contact_number" name="emergency_contact_number" type="text">
              </div>
            </div>
          </fieldset>
          <div class="field">
            <input type="submit" value="Submit Registration" class="btn btn-primary">
          </div>

          <div class="field">
            <a href="form_page_2.php" class="btn btn-secondary">Next</a>
          </div>
        </div>
      </form>
    </main>
  </div>
</body>
</html>
