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

                    <form method="post" action="/resume/<?php echo $id; ?>/workplace/new"">
                        <input type="hidden" name="_method" value="PUT">
                        <h2 class="center">Employment History</h2>

                        <div id="eh-container">
                            <div class="eh-item">
                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-employer_0">Employer</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="eh-employer_0" name="workplaces[employer]"
                                               placeholder="e.g. Latvijas Pasts">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-country_0">Country</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="eh-country_0" name="workplaces[country]">
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
                                        <input type="text" id="eh-city_0" name="workplaces[city]"
                                               placeholder="Enter city">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-position-held_0">Position Held</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="eh-position-held_0" name="workplaces[position-held]"
                                               placeholder="e.g. Market research">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-workload_0">Workload</label>
                                    </div>
                                    <div class="col-75">
                                        <input type="text" id="eh-workload_0" name="workplaces[workload]"
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
                                               name="workplaces[start-date]" placeholder="Start date"
                                               onfocus="(this.type='date')" onblur="(this.type='text')">
                                        <input class="date" type="text" id="eh-end-date_0"
                                               name="workplaces[end-date]" placeholder="End date"
                                               onfocus="(this.type='date')" onblur="(this.type='text')">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="eh-end-date_0"></label>
                                    </div>
                                    <div class="col-75">
                                        <input class="checkbox-currently" type="checkbox" id="eh-end-date_0"
                                               name="workplaces[end-date]" onclick="onCheck(this, this.id);"
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
                                        <input type="text" id="skill-description_0" name="skills[description]"
                                               placeholder="e.g. Network security">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-25">
                                        <label for="skill-type_0">Type of skill</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="skill-type_0" name="skills[type]">
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
                        <textarea id="skill-achievement_0" name="skills[achievement]"
                                  placeholder="-Re-organized something to make it work better"
                                  style="height:100px"></textarea>
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