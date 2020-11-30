<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Resume Maker</title>
</head>
<body>
<div class="wrapper">
    <h1 class="center">Resume of <?php echo $resume['person']->getName() . ' ' .
            $resume['person']->getSurname(); ?></h1>
    <div class="container">
        <?php require_once __DIR__ . '/../Views/LeftSidebarView.php'; ?>
        <div class="body-container">
            <div class="body">
                <h2 class="center">Personal Information</h2>
                <div class="resume-container">
                    <ul class="resume-review">
                        <li>Name: <?php echo $resume['person']->getName(); ?></li>
                        <li>Surname: <?php echo $resume['person']->getSurname(); ?></li>
                        <li>Gender: <?php echo $resume['person']->getGender(); ?></li>
                        <li>Phone: <?php echo $resume['person']->getPhone(); ?></li>
                        <li>Email: <?php echo $resume['person']->getEmail(); ?></li>
                        <li>Country: <?php echo $resume['person']->getLocation()->getCountry(); ?></li>
                        <li>City: <?php echo $resume['person']->getLocation()->getCity(); ?></li>
                    </ul>
                    <form method="post" action="/resume/person/<?php echo $resume['person']->getId(); ?>/edit">
                        <div class="center">
                            <button class="button1 button2" type="submit">Edit</button>
                        </div>
                    </form>
                </div>

                <hr class="form-line">
                <h2 class="center">Education</h2>

                <?php if($resume['education']): ?>
                    <?php foreach ($resume['education'] as $educationalInstitution): ?>
                        <div class="resume-container">
                            <details>
                                <summary>
                                    <?php echo $educationalInstitution->getName(); ?>
                                    <br>
                                    <small>
                                        <?php echo $educationalInstitution->getStartDate(); ?> -
                                        <?php echo $educationalInstitution->getEndDate(); ?>
                                    </small>
                                </summary>
                                <hr class="details-line">
                                <ul class="resume-review">
                                    <li>Educational Institution: <?php echo $educationalInstitution->getName(); ?></li>
                                    <?php if($educationalInstitution->getLocation()): ?>
                                        <li>
                                            Country: <?php echo $educationalInstitution->getLocation()->getCountry(); ?>
                                        </li>
                                        <li>City: <?php echo $educationalInstitution->getLocation()->getCity(); ?></li>
                                    <?php endif; ?>
                                    <li>Faculty: <?php echo $educationalInstitution->getFaculty(); ?></li>
                                    <li>Field of study: <?php echo $educationalInstitution->getFieldOfStudy(); ?></li>
                                    <li>Awarded degree: <?php echo $educationalInstitution->getAwardedDegree(); ?></li>
                                    <li>
                                        Form of education: <?php echo $educationalInstitution->getFormOfEducation(); ?>
                                    </li>
                                    <li>Start date: <?php echo $educationalInstitution->getStartDate(); ?></li>
                                    <li>End date: <?php echo $educationalInstitution->getEndDate(); ?></li>
                                    <li>Status: <?php echo $educationalInstitution->getStatus(); ?></li>
                                </ul>
                                <div class="center">
                                    <div style="display: inline-block">
                                        <form method="post" action="/resume/<?php echo $resume['person']->getId(); ?>
                                    /education/<?php echo $educationalInstitution->getId(); ?>/edit">
                                            <button class="button1 button2" type="submit">Edit</button>
                                        </form>
                                    </div>
                                    <div style="display: inline-block">
                                        <form method="post" action="/resume/<?php echo $resume['person']->getId(); ?>
                                    /education/<?php echo $educationalInstitution->getId(); ?>">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="button1 button2" type="submit"
                                                    onclick="return confirm('Are you sure ?');">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </details>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="add-remove-button">
                    <form method="post" action="/resume/<?php echo $resume['person']->getId(); ?>/education/new">
                        <button class="button" type="submit">Add new</button>
                    </form>
                </div>
                <hr class="form-line">
                <h2 class="center">Employment History</h2>
                <?php if($resume['workplaces']): ?>
                    <?php foreach ($resume['workplaces'] as $workplace): ?>
                        <div class="resume-container">
                                <details>
                                    <summary>
                                        <?php echo $workplace->getPositionHeld(); ?> at
                                        <?php echo $workplace->getTitle(); ?>
                                        <br>
                                        <small>
                                            <?php echo $workplace->getStartDate(); ?> -
                                            <?php echo $workplace->getEndDate(); ?>
                                        </small>
                                    </summary>
                                    <hr class="details-line">
                                    <div class="resume-wrapper">
                                        <div class="left-resume-info">
                                            <ul class="resume-review">
                                                <li>Job title: <?php echo $workplace->getTitle(); ?></li>
                                                <?php if($workplace->getLocation()): ?>
                                                    <li>
                                                        Country: <?php echo $workplace->getLocation()->getCountry(); ?>
                                                    </li>
                                                    <li>City: <?php echo $workplace->getLocation()->getCity(); ?></li>
                                                <?php endif; ?>
                                                <li>Position held: <?php echo $workplace->getPositionHeld(); ?></li>
                                                <li>Workload: <?php echo $workplace->getWorkload(); ?></li>
                                                <li>Start date: <?php echo $workplace->getStartDate(); ?></li>
                                                <li>End date: <?php echo $workplace->getEndDate(); ?></li>
                                            </ul>
                                        </div>
                                        <div class="right-resume-info">
                                            <?php if($workplace->getSkill()): ?>
                                                <h3 class="center">Main skill used in the workplace</h3>

                                                <ul class="resume-review">
                                                    <li>Skill: <?php echo $workplace->getSkill()->getTitle(); ?></li>
                                                    <li>Type: <?php echo $workplace->getSkill()->getType(); ?></li>
                                                    <li>
                                                        Achievement:
                                                        <?php echo $workplace->getSkill()->getAchievement(); ?>
                                                    </li>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="center">
                                        <div style="display: inline-block">
                                            <form method="post" action="/resume/<?php echo $resume['person']->getId(); ?>
                                            /workplace/<?php echo $workplace->getId(); ?>/edit">
                                                <button class="button1 button2" type="submit">Edit</button>
                                            </form>
                                        </div>
                                        <div style="display: inline-block">
                                            <form method="post" action="/resume/<?php echo $resume['person']->getId(); ?>
                                            /workplace/<?php echo $workplace->getId(); ?>">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <div>
                                                    <button class="button1 button2" type="submit"
                                                            onclick="return confirm('Are you sure ?');">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </details>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="add-remove-button">
                    <form method="post" action="/resume/<?php echo $resume['person']->getId(); ?>/workplace/new">
                        <button class="button" type="submit">Add new</button>
                    </form>
                </div>
                <div style="text-align: right">
                    <form method="post" action="/resume/<?php echo $resume['person']->getId(); ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="remove-resume-button" type="submit" onclick="return confirm('Are you sure ?');">Delete Resume</button>
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