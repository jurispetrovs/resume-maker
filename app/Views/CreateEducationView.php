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
                    <form method="post" action="/resume/<?php echo $id; ?>/education/new">
                        <input type="hidden" name="_method" value="PUT">
                        <h2 class="center">Education</h2>

                        <div id="ei-container">
                            <div class="ei-item">
                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-name_0">Name of school/institution</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="ei-name_0" name="education[name]"
                                               placeholder="e.g. Transport and Telecommunication Institute">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-country_0">Country</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="ei-country_0" name="education[country]">
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
                                        <input type="text" id="ei-city_0" name="education[city]"
                                               placeholder="Enter city">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-faculty_0">Faculty</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="ei-faculty_0" name="education[faculty]"
                                               placeholder="e.g. Computer Science and Telecommunications">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-field-of-study_0">Field Of Study</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="ei-field-of-study_0" name="education[field-of-study]"
                                               placeholder="e.g. Computer Science">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-awarded-degree_0">Awarded Degree</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="ei-awarded-degree_0" name="education[awarded-degree]">
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
                                        <select id="ei-form-of-education_0" name="education[form-of-education]">
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
                                               name="education[start-date]" placeholder="Start date"
                                               onfocus="(this.type='date')" onblur="(this.type='text')">
                                        <input class="date" type="text" id="ei-end-date_0" name="education[end-date]"
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
                                               name="education[end-date]" onclick="onCheck(this, this.id);"
                                               value="Currently">
                                        <div class="checkbox-title">Currently study here</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="ei-status_0">Status</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="ei-status_0" name="education[status]">
                                            <option disabled selected>Choose the status</option>
                                            <option value="Studying">Studying</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Discontinued">Discontinued</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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

</body>
<?php require_once __DIR__ . '/../Views/FooterView.php'; ?>
</html>