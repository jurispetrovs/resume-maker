<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css">
    <script type="text/javascript" src="/js/checkbox.js"></script>

    <title>Resume Maker</title>
</head>
<body>
<div class="wrapper">
    <h1 class="center">Create Your Own Resume</h1>
    <div class="container">
        <?php require_once __DIR__ . '/../Views/LeftSidebarView.php'; ?>
        <div class="body-container">
            <div class="body">
                <div class="form-container">
                    <form method="post" action="/create-resume/create">
                        <h2 class="center">Personal Information</h2>
                        <div class="row">
                            <div class="col-25">
                                <label for="first-name">Name*</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="first-name" name="person[name]" placeholder="Your name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="last-name">Surname*</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="last-name" name="person[surname]"
                                       placeholder="Your surname" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="gender">Gender</label>
                            </div>
                            <div class="col-75">
                                <select id="gender" name="person[gender]" required>
                                    <option disabled selected>Choose your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="phone" name="person[phone]" placeholder="Your phone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="email">Email*</label>
                            </div>
                            <div class="col-75">
                                <input type="email" id="email" name="person[email]" placeholder="Your email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="person-country">Country*</label>
                            </div>
                            <div class="col-75">
                                <select id="person-country" name="person[country]" required>
                                    <option disabled selected>Choose your country</option>
                                    <?php foreach ($countries as $country): ?>
                                        <option value="<?php echo $country ?>">
                                            <?php echo $country ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="person-city">City</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="person-city" name="person[city]"
                                       placeholder="Your city">
                            </div>
                        </div>

                        <hr class="form-line mt-40">

                        <h2 class="center">Education</h2>

                        <div id="ei-container">
                            <div class="ei-item">
                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-name_0">Name of school/institution</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="ei-name_0" name="education[0][name]"
                                               placeholder="e.g. Transport and Telecommunication Institute">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-country_0">Country</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="ei-country_0" name="education[0][country]">
                                            <option disabled selected>Choose the country</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option value="<?php echo $country ?>">
                                                    <?php echo $country ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-city_0">City</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="ei-city_0" name="education[0][city]"
                                               placeholder="Enter city">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-faculty_0">Faculty</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="ei-faculty_0" name="education[0][faculty]"
                                               placeholder="e.g. Computer Science and Telecommunications">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-field-of-study_0">Field Of Study</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="ei-field-of-study_0" name="education[0][field-of-study]"
                                               placeholder="e.g. Computer Science">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-awarded-degree_0">Awarded Degree</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="ei-awarded-degree_0" name="education[0][awarded-degree]">
                                            <option disabled selected>Choose the degree</option>
                                            <option value="Basic education">Basic education</option>
                                            <option value="Basic vocational education">
                                                Basic vocational education
                                            </option>
                                            <option value="Vocational education">Vocational education</option>
                                            <option value="General upper secondary education">
                                                General upper secondary education
                                            </option>
                                            <option value="Secondary professional education">
                                                Secondary professional education
                                            </option>
                                            <option value="Secondary vocational">Secondary vocational</option>

                                            <option value="1st level professional higher education (college)">
                                                1st level professional higher education (college)
                                            </option>
                                            <option value="Bachelor studies">Bachelor studies</option>
                                            <option value="2nd level professional higher education
                                        (professional bachelor, professional higher education)">
                                                2nd level professional higher education
                                                (professional bachelor, professional higher education)
                                            </option>
                                            <option value="Master's studies">Master's studies</option>
                                            <option value="2nd level professional higher education
                                        (professional master, professional higher education)">
                                                2nd level professional higher education
                                                (professional master, professional higher education)
                                            </option>
                                            <option value="Doctoral studies">Doctoral studies</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-form-of-education_0">Form Of Education</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="ei-form-of-education_0" name="education[0][form-of-education]">
                                            <option disabled selected>Choose the form</option>
                                            <option value="Full time">Full time</option>
                                            <option value="Part time">Part time</option>
                                            <option value="Distance">Distance</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-start-date_0">Start & End Date</label>
                                        <label for="ei-end-date_0"></label>
                                    </div>
                                    <div>
                                        <input class="date" type="text" id="ei-start-date_0"
                                               name="education[0][start-date]" placeholder="Start date"
                                               onfocus="(this.type='date')" onblur="(this.type='text')">
                                        <input class="date" type="text" id="ei-end-date_0" name="education[0][end-date]"
                                               placeholder="End date" onfocus="(this.type='date')"
                                               onblur="(this.type='text')">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-end-date_0"></label>
                                    </div>
                                    <div class="col-75">
                                        <input class="checkbox-currently" type="checkbox" id="ei-end-date_0"
                                               name="education[0][end-date]" onclick="onCheck(this, this.id);"
                                               value="Currently">
                                        <div class="checkbox-title">Currently study here</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-status_0">Status</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="ei-status_0" name="education[0][status]">
                                            <option disabled selected>Choose the status</option>
                                            <option value="Studying">Studying</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Discontinued">Discontinued</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="add-remove-button">
                                    <a href="javascript:void(0)" class="remove-ei remove-button">Remove</a>
                                </div>

                                <hr class="interline">
                            </div>
                        </div>

                        <div class="add-remove-button">
                            <input type='button' class="button" id='ei-add-more'
                                   value='Add more Educational Institutions'>
                        </div>

                        <hr class="form-line mt-40">

                        <h2 class="center">Employment History</h2>

                        <div id="eh-container">
                            <div class="eh-item">
                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-employer_0">Employer</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="eh-employer_0" name="workplaces[0][employer]"
                                               placeholder="e.g. Latvijas Pasts">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-country_0">Country</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="eh-country_0" name="workplaces[0][country]">
                                            <option disabled selected>Choose the country</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option value="<?php echo $country ?>">
                                                    <?php echo $country ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-city_0">City</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="eh-city_0" name="workplaces[0][city]"
                                               placeholder="Enter city">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-position-held_0">Position Held</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="eh-position-held_0" name="workplaces[0][position-held]"
                                               placeholder="e.g. Market research">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-workload_0">Workload</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="eh-workload_0" name="workplaces[0][workload]"
                                               placeholder="e.g. Full time">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-start-date_0">Start & End Date</label>
                                        <label for="eh-end-date_0"></label>
                                    </div>
                                    <div>
                                        <input class="date" type="text" id="eh-start-date_0"
                                               name="workplaces[0][start-date]" placeholder="Start date"
                                               onfocus="(this.type='date')" onblur="(this.type='text')">
                                        <input class="date" type="text" id="eh-end-date_0"
                                               name="workplaces[0][end-date]" placeholder="End date"
                                               onfocus="(this.type='date')" onblur="(this.type='text')">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-end-date_0"></label>
                                    </div>
                                    <div class="col-75">
                                        <input class="checkbox-currently" type="checkbox" id="eh-end-date_0"
                                               name="workplaces[0][end-date]" onclick="onCheck(this, this.id);"
                                               value="Currently">
                                        <div class="checkbox-title">Currently work here</div>
                                    </div>
                                </div>

                                <h3 class="center">Main skill used in the workplace</h3>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="skill-description_0">Skill</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="skill-description_0" name="skills[0][description]"
                                               placeholder="e.g. Network security">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="skill-type_0">Type of skill</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="skill-type_0" name="skills[0][type]">
                                            <option disabled selected>Choose the type of skill</option>
                                            <option value="Hard skill">Hard skill</option>
                                            <option value="Soft skill">Soft skill</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="skill-achievement_0">Achievement</label>
                                    </div>
                                    <div class="col-75">
                        <textarea id="skill-achievement_0" name="skills[0][achievement]"
                                  placeholder="-Re-organized something to make it work better"
                                  style="height:100px"></textarea>
                                    </div>
                                </div>

                                <div class="add-remove-button">
                                    <a href="javascript:void(0)" class="remove-eh remove-button">Remove</a>
                                </div>

                                <hr class="interline">
                            </div>
                        </div>

                        <div class="add-remove-button">
                            <input type='button' class="button" id='eh-add-more' value='Add more workplaces'>
                        </div>

                        <div class="row" style="margin-top: 10px">
                            <button class="create-button" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="empty-right-sidebar">
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/cloneData.js"></script>
<script type="text/javascript" src="/js/cloneInitialization.js"></script>

</body>
<?php require_once __DIR__ . '/../Views/FooterView.php'; ?>
</html>