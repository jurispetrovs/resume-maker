<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Resume Maker</title>
</head>
<body>
<div class="wrapper">
    <h1 class="center">Resume of <?php echo $person->getName() . ' ' .
            $person->getSurname(); ?></h1>
    <div class="container">
        <?php require_once __DIR__ . '/../Views/LeftSidebarView.php'; ?>
        <div class="body-container">
            <div class="body">
                <div class="form-container">
                    <form method="post" action="/resume/person/<?php echo $person->getId(); ?>/edit">
                        <input type="hidden" name="_method" value="PUT">
                        <h2 class="center">Personal Information</h2>
                        <div class="row">
                            <div class="col-25">
                                <label for="first-name">Name*</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="first-name" name="person[name]" placeholder="Your name"
                                       value="<?php echo $person->getName(); ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="last-name">Surname*</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="last-name" name="person[surname]" placeholder="Your surname"
                                       value="<?php echo $person->getSurname(); ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="gender">Gender</label>
                            </div>
                            <div class="col-75">
                                <select id="gender" name="person[gender]" required>
                                    <?php $gender = $person->getGender(); ?>
                                    <option disabled <?php echo (!$gender) ? 'selected' : '' ?>>
                                        Choose your gender
                                    </option>
                                    <option value="male" <?php echo ($gender === 'male') ? 'selected' : '' ?>>
                                        Male
                                    </option>
                                    <option value="female" <?php echo ($gender === 'female') ? 'selected' : '' ?>>
                                        Female
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="phone" name="person[phone]" placeholder="Your phone"
                                       value="<?php echo $person->getPhone(); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="email">Email*</label>
                            </div>
                            <div class="col-75">
                                <input type="email" id="email" name="person[email]" placeholder="Your email"
                                       value="<?php echo $person->getEmail(); ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="person-country">Country*</label>
                            </div>
                            <div class="col-75">
                                <select id="person-country" name="person[country]" required>
                                    <?php $countryExist = $person->getLocation()->getCountry(); ?>
                                    <option disabled <?php echo (!$countryExist) ? 'selected' : '' ?>>
                                        Choose your country
                                    </option>
                                    <?php foreach ($countries as $country): ?>
                                        <option value="<?php echo $country ?>"
                                            <?php echo ($countryExist === $country) ? 'selected' : '' ?>>
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
                                <input type="text" id="person-city" name="person[city]" placeholder="Your city"
                                       value="<?php echo $person->getLocation()->getCity(); ?>">
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