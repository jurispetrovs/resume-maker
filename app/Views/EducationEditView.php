<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css">
    <script type="text/javascript" src="/js/checkbox.js"></script>

    <title>Resume Maker</title>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <?php require_once __DIR__ . '/../Views/LeftSidebarView.php'; ?>
        <div class="body-container">
            <div class="body">
                <div class="form-container">
                    <form method="post" action="/resume/<?php echo $id; ?>/education/<?php echo $educationId; ?>/edit">
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
                                                   placeholder="e.g. Transport and Telecommunication Institute"
                                                   value="<?php echo $education->getName(); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-country_0">Country</label>
                                        </div>
                                        <div class="col-75">
                                            <select id="ei-country_0" name="education[country]">
                                                <?php if($education->getLocation()): ?>
                                                    <?php $countryExist = $education
                                                        ->getLocation()
                                                        ->getCountry();
                                                    ?>
                                                    <option disabled <?php echo (!$countryExist) ? 'selected' : '' ?>>
                                                        Choose your country
                                                    </option>
                                                    <?php foreach ($countries as $country): ?>
                                                        <option value="<?php echo $country ?>"
                                                            <?php echo ($countryExist === $country) ? 'selected' : '' ?>>
                                                            <?php echo $country ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <?php foreach ($countries as $country): ?>
                                                        <option value="<?php echo $country ?>">
                                                            <?php echo $country ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-city_0">City</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="ei-city_0" name="education[city]"
                                                   placeholder="Enter city"
                                                <?php if($education->getLocation()): ?>
                                                    value="<?php echo $education
                                                        ->getLocation()
                                                        ->getCity(); ?>"
                                                <?php else: ?>
                                                    value=""
                                                <?php endif; ?>
                                            >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-faculty_0">Faculty</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="ei-faculty_0" name="education[faculty]"
                                                   placeholder="e.g. Computer Science and Telecommunications"
                                                   value="<?php echo $education->getFaculty(); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-field-of-study_0">Field Of Study</label>
                                        </div>
                                        <div class="col-75">
                                            <input type="text" id="ei-field-of-study_0"
                                                   name="education[field-of-study]"
                                                   placeholder="e.g. Computer Science"
                                                   value="<?php echo $education->getFieldOfStudy(); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-awarded-degree_0">Awarded Degree</label>
                                        </div>
                                        <div class="col-75">
                                            <select id="ei-awarded-degree_0" name="education[awarded-degree]">
                                                <?php $degree = $education->getAwardedDegree(); ?>
                                                <option disabled <?php echo (!$degree) ? 'selected' : ''; ?>>
                                                    Choose the degree
                                                </option>
                                                <option value="Basic education"
                                                    <?php echo ($degree === 'Basic education') ? 'selected' : '' ?>>
                                                    Basic education
                                                </option>
                                                <option value="Basic vocational education"
                                                    <?php echo ($degree === 'Basic vocational education') ?
                                                        'selected' : '' ?>>
                                                    Basic vocational education
                                                </option>
                                                <option value="Vocational education"
                                                    <?php echo ($degree === 'Vocational education') ?
                                                        'selected' : '' ?>>
                                                    Vocational education
                                                </option>
                                                <option value="General upper secondary education"
                                                    <?php echo ($degree === 'General upper secondary education') ?
                                                        'selected' : '' ?>>
                                                    General upper secondary education
                                                </option>
                                                <option value="Secondary professional education"
                                                    <?php echo ($degree === 'Secondary professional education') ?
                                                        'selected' : '' ?>>
                                                    Secondary professional education
                                                </option>
                                                <option value="Secondary vocational"
                                                    <?php echo ($degree === 'Secondary vocational') ?
                                                        'selected' : '' ?>>
                                                    Secondary vocational
                                                </option>

                                                <option value="1st level professional higher education (college)"
                                                    <?php echo ($degree === '1st level professional higher 
                                                        education (college)') ? 'selected' : '' ?>>
                                                    1st level professional higher education (college)
                                                </option>
                                                <option value="Bachelor studies"
                                                    <?php echo ($degree === 'Bachelor studies') ? 'selected' : '' ?>>
                                                    Bachelor studies
                                                </option>
                                                <option value="2nd level professional higher education
                                                (professional bachelor, professional higher education)"
                                                    <?php echo ($degree === '2nd level professional higher education 
                                                        (professional bachelor, professional higher education)') ?
                                                        'selected' : '' ?>>
                                                    2nd level professional higher education
                                                    (professional bachelor, professional higher education)
                                                </option>
                                                <option value="Master's studies"
                                                    <?php echo ($degree === 'Master\'s studies') ? 'selected' : '' ?>>
                                                    Master's studies
                                                </option>
                                                <option value="2nd level professional higher education
                                                (professional master, professional higher education)"
                                                    <?php echo ($degree === '2nd level professional higher education 
                                                        (professional master, professional higher education)') ?
                                                        'selected' : '' ?>>
                                                    2nd level professional higher education
                                                    (professional master, professional higher education)
                                                </option>
                                                <option value="Doctoral studies"
                                                    <?php echo ($degree === 'Doctoral studies') ? 'selected' : '' ?>>
                                                    Doctoral studies
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-form-of-education_0">Form Of Education</label>
                                        </div>
                                        <div class="col-75">
                                            <select id="ei-form-of-education_0" name="education[form-of-education]">
                                                <?php $form = $education->getFormOfEducation(); ?>
                                                <option disabled <?php echo (!$form) ? 'selected' : ''; ?>>
                                                    Choose the form
                                                </option>
                                                <option value="Full time"
                                                    <?php echo ($form === 'Full time') ? 'selected' : '' ?>>
                                                    Full time
                                                </option>
                                                <option value="Part time"
                                                    <?php echo ($form === 'Part time') ? 'selected' : '' ?>>
                                                    Part time
                                                </option>
                                                <option value="Distance"
                                                    <?php echo ($form === 'Distance') ? 'selected' : '' ?>>
                                                    Distance
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-start-date_0">Start & End Date</label>
                                            <label for="ei-end-date_0"></label>
                                        </div>
                                        <div>
                                            <?php $start = $education->getStartDate(); ?>
                                            <?php $end = $education->getEndDate(); ?>
                                            <input class="date" type="text" id="ei-start-date_0"
                                                   name="education[start-date]"
                                                   placeholder="Start date" onfocus="(this.type='date')"
                                                   onblur="(this.type='text')"
                                                   value="<?php echo ($start) ? $start : '' ?>">
                                            <input class="date" type="text" id="ei-end-date_0"
                                                   name="education[end-date]"
                                                   placeholder="End date" onfocus="(this.type='date')"
                                                   onblur="(this.type='text')"
                                                   value="<?php echo ($end && $end != 'Currently') ? $end : '' ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-end-date_0"></label>
                                        </div>
                                        <div class="col-75">
                                            <input class="checkbox-currently" type="checkbox" id="ei-end-date_0"
                                                   name="education[end-date]" onclick="onCheck(this, this.id);"
                                                   value="Currently"
                                                <?php echo ($end === 'Currently') ? 'checked' : '' ?>>
                                            <div class="checkbox-title">Currently study here</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-25">
                                            <label for="ei-status_0">Status</label>
                                        </div>
                                        <div class="col-75">
                                            <select id="ei-status_0" name="education[status]">
                                                <?php $status = $education->getStatus(); ?>
                                                <option disabled <?php echo (!$status) ? 'selected' : ''; ?>>
                                                    Choose the status
                                                </option>
                                                <option value="Studying"
                                                    <?php echo ($status === 'Studying') ? 'selected' : ''; ?>>
                                                    Studying
                                                </option>
                                                <option value="Completed"
                                                    <?php echo ($status === 'Completed') ? 'selected' : ''; ?>>
                                                    Completed
                                                </option>
                                                <option value="Discontinued"
                                                    <?php echo ($status === 'Discontinued') ? 'selected' : ''; ?>>
                                                    Discontinued
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row" style="margin-top: 10px">
                            <button class="create-button" type="submit">Update</button>
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